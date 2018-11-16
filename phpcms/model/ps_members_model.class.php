<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * PHPSSO 单点登陆会员表
 * Class ps_members_model
 */
class ps_members_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'phpsso';
        $this->table_name = 'members';
        parent::__construct();
    }
}
