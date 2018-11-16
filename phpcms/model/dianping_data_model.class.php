<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 点评数据表
 * @deprecated 没有该模型和数据表已废弃
 * Class dianping_data_model
 */
class dianping_data_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'dianping_data';
        parent::__construct();
    }

    /**
     * 取得投票信息  返回数组
     * @param integer|string $subjectid 投票ID
     * @return array|bool
     */
    function get_subject($subjectid)
    {
        if (!$subjectid) return false;
        return $this->get_one(array( 'subjectid' => $subjectid ));
    }
}
