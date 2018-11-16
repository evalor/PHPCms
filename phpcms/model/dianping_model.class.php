<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 点评模型
 * @deprecated 没有该模型和数据表已废弃
 * Class dianping_model
 */
class dianping_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'dianping';
        parent::__construct();
    }
}
