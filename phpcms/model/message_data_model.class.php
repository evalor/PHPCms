<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 短消息数据表
 * Class message_data_model
 */
class message_data_model extends model
{
    private $_username;
    private $_userid;

    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'message_data';
        $this->_username = param::get_cookie('_username');
        $this->_userid = param::get_cookie('_userid');
        parent::__construct();
    }
}
