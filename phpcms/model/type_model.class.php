<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 类别表
 * Class type_model
 */
class type_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'type';
        parent::__construct();
    }

    /**
     * 查询对应模块下的分类
     * @param string $siteid 站点ID
     * @return array|bool
     */
    function get_types($siteid)
    {
        if (!ROUTE_M) return false;
        return $this->select(array( 'module' => ROUTE_M, 'siteid' => $siteid ), '*', '', $order = 'typeid ASC');
    }
}
