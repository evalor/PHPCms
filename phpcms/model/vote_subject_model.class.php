<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 投票主题模型
 * Class vote_subject_model
 */
class vote_subject_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'vote_subject';
        parent::__construct();
    }

    /**
     * 取得投票信息 返回数组
     * @param int $subjectid 投票ID
     * @return array|bool
     */
    function get_subject($subjectid)
    {
        if (!$subjectid) return false;
        return $this->get_one(array( 'subjectid' => $subjectid ));
    }
}
