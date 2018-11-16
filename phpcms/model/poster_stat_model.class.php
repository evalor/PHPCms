<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 广告位统计
 * Class poster_stat_model
 */
class poster_stat_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'poster_' . date('Ym');
        parent::__construct();
        if (!$this->db->table_exists($this->table_name)) {
            $this->create_table();
        }
    }

    /**
     * 按月份创建数据表
     * @return bool|resource
     */
    private function create_table()
    {
        $data_info = pc_base::load_config('database', $this->db_setting);
        $charset = $data_info['charset'];
        $sql = <<<QUERY
CREATE TABLE IF NOT EXISTS `{$this->table_name}` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`pid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
	`siteid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
	`spaceid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
	`username` char(20) NOT NULL,
	`area` char(40) NOT NULL,
	`ip` char(15) NOT NULL,
	`referer` char(120) NOT NULL,
	`clicktime` int(10) UNSIGNED NOT NULL DEFAULT '0',
	`type` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET={$charset};
QUERY;
        return $this->db->query($sql);
    }

    /**
     * 根据查询的日期 改变查询的表
     * @param string $tablename 表名
     */
    private function change_table($tablename = '')
    {
        if ($tablename) $this->table_name = $this->db_tablepre . 'poster_' . $tablename;
    }

    /**
     * 获取所有广告统计表 并形成下拉框
     * @param string $year 查询的年月
     * @return string
     */
    public function get_list($year = '')
    {
        $year = isset($year) ? $year : '';
        if ($year) {
            $this->change_table($year);
        }
        $this->change_table($year);
        $diff1 = date('Y', SYS_TIME);        // 当前年份
        $diff2 = date('m', SYS_TIME);        // 当前月份
        $diff = ($diff1 - 2010) * 12 + $diff2;
        $selectstr = '';
        for ($y = $diff; $y > 0; $y--) {
            $value = date('Ym', mktime(0, 0, 0, $y, 1, 2010));
            if ($value < '201006' || !$this->db->table_exists($this->db_tablepre . 'poster_' . $value)) break;
            $selected = $year == $value ? 'selected' : '';
            $selectstr .= "<option value='$value' $selected>" . date("Y-m", mktime(0, 0, 0, $y, 1, 2010));
        }
        return $selectstr;
    }
}
