<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 会员模型操作类
 * Class member_model_model
 */
class member_model_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'model';
        parent::__construct();
    }

    /**
     * 删除表
     * @param string $tablename 表名称
     * @return bool
     */
    public function drop_table($tablename)
    {
        $tablename = $this->db_tablepre . $tablename;
        $tablearr = $this->db->list_tables();
        if (in_array($tablename, $tablearr)) {
            return $this->db->query("DROP TABLE $tablename");
        } else {
            return false;
        }
    }

    /**
     * 创建表
     * @param string $tablename 表名称
     * @return bool
     */
    public function create_table($tablename)
    {
        $tablename = $this->db_tablepre . $tablename;
        $tablearr = $this->db->list_tables();
        if (!in_array($tablename, $tablearr)) {
            return $this->db->query("CREATE TABLE $tablename (`userid` int(10) unsigned NOT NULL,  UNIQUE KEY `userid` (`userid`)) DEFAULT CHARSET=" . CHARSET);
        } else {
            return false;
        }
    }

    /**
     * 修改会员表模型
     * @param string $from_modelid
     * @param string $to_modelid
     */
    public function change_member_modelid($from_modelid, $to_modelid)
    {
        $tablename = $this->db_tablepre . 'member';
        $this->db->update(array( 'modelid' => $to_modelid ), $tablename, "modelid='$from_modelid'");
    }
}
