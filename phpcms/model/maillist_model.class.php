<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 邮件列表
 * @deprecated 未发现调用处 可能已废弃
 * Class maillist_model
 */
class maillist_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'maillist';
        parent::__construct();
    }
}
