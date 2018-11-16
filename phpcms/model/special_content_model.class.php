<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 专题内容表
 * Class special_content_model
 */
class special_content_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'special_content';
        parent::__construct();
    }
}
