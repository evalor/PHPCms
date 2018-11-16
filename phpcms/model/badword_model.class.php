<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 敏感词表
 * Class badword_model
 */
class badword_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'badword';
        parent::__construct();
    }

    /**
     * 敏感词处理接口
     * 对传递的数据进行处理,并返回
     * @param string $str
     * @return mixed
     */
    function replace_badword($str)
    {
        // 从缓存中读取敏感词 如果更新了敏感词则需要更新缓存
        $badword_cache = getcache('badword', 'commons');
        $replace = $replaceword = array();
        foreach ($badword_cache as $data) {
            if ($data['replaceword'] == '') {
                $replaceword_new = '*';
            } else {
                $replaceword_new = $data['replaceword'];
            }
            $replaceword[] = ($data['level'] == '1') ? $replaceword_new : '';
            $replace[] = $data['badword'];
        }
        $str = str_replace($replace, $replaceword, $str);
        return $str;
    }
}
