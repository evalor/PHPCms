<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * IP禁止
 * Class ipbanned_model
 */
class ipbanned_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'ipbanned';
        parent::__construct();
    }

    /**
     * 把IP进行格式化 统一为IPV4
     * @param string $op 操作类型 min,mix
     * @param string $ip 要处理的IP段 127.0.0.* 或 127.0.0.5
     * @return string
     */
    public function convert_ip($op, $ip)
    {
        $arr_ip = explode(".", $ip);
        $arr_temp = array();
        $i = 0;
        $ip_val = $op == "max" ? "255" : "1";
        foreach ($arr_ip as $key => $val) {
            $i++;
            $val = $val == "*" ? $ip_val : $val;
            $arr_temp[] = $val;
        }
        for ($i = 4 - $i; $i > 0; $i--) {
            $arr_temp[] = $ip_val;
        }
        $comma = "";
        $result = '';
        foreach ($arr_temp as $v) {
            $result .= $comma . $v;
            $comma = ".";
        }
        return $result;
    }

    /**
     * 判断IP是否被限并返回
     * @param string $ip 当前IP
     * @param string $ip_from 开始IP段
     * @param string $ip_to 结束IP段
     * @return int
     */
    public function ipforbidden($ip, $ip_from, $ip_to)
    {
        $from = strcmp($ip, $ip_from);
        $to = strcmp($ip, $ip_to);
        if ($from >= 0 && $to <= 0) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * IP禁止判断接口 供外部调用
     */
    public function check_ip()
    {
        $ip_array = array();
        // 当前IP
        $ip = ip();
        // 加载IP禁止缓存
        $ipbanned_cache = getcache('ipbanned', 'commons');
        if (!empty($ipbanned_cache)) {
            foreach ($ipbanned_cache as $data) {
                $ip_array[$data['ip']] = $data['ip'];
                // 是否是IP段
                if (strpos($data['ip'], '*')) {
                    $ip_min = $this->convert_ip("min", $data['ip']);
                    $ip_max = $this->convert_ip("max", $data['ip']);
                    $result = $this->ipforbidden($ip, $ip_min, $ip_max);
                    if ($result == 0 && $data['expires'] > SYS_TIME) {
                        // 被封
                        showmessage('你在IP禁止段内,所以禁止你访问');
                    }
                } else {
                    // 不是IP段 用绝对匹配
                    if ($ip == $data['ip'] && $data['expires'] > SYS_TIME) {
                        showmessage('IP地址绝对匹配,禁止你访问');
                    }
                }
            }
        }
    }
}
