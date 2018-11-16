<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 投票选项模型
 * Class vote_option_model
 */
class vote_option_model extends model
{
    function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        //$this->db_tablepre = $this->db_config[$this->db_setting]['tablepre'];
        $this->table_name = 'vote_option';
        parent::__construct();
    }

    /**
     * 添加投票选项操作
     * @param array $data 选项数组
     * @param int $subjectid 投票标题ID
     * @param int $siteid 站点ID
     * @return bool
     */
    function add_options($data, $subjectid, $siteid)
    {
        // 判断传递的数据类型是否正确
        if (!is_array($data)) return false;
        if (!$subjectid) return false;
        foreach ($data as $key => $val) {
            if (trim($val) == '') continue;
            $newoption = array(
                'subjectid' => $subjectid,
                'siteid'    => $siteid,
                'option'    => $val,
                'image'     => '',
                'listorder' => 0
            );
            $this->insert($newoption);

        }
        return true;
    }

    /**
     * 更新选项
     * @param array $data Array ( [44] => 443 [43(optionid)] => 334(option 值) )
     * @return bool
     */
    function update_options($data)
    {
        //判断传递的数据类型是否正确
        if (!is_array($data)) return false;
        foreach ($data as $key => $val) {
            if (trim($val) == '') continue;
            $newoption = array(
                'option' => $val,
            );
            $this->update($newoption, array( 'optionid' => $key ));

        }
        return true;
    }

    /**
     * 设置选项排序
     * @param string $data 选项数组
     * @return bool|int
     */
    function set_listorder($data)
    {
        if (!is_array($data)) return false;
        foreach ($data as $key => $val) {
            $val = intval($val);
            $key = intval($key);
            $this->db->query("update {$this->table_name} set listorder='$val' where `option`='$key'");
        }
        return $this->db->affected_rows();
    }

    /**
     * 删除指定选项
     * @param integer $subjectid 投票ID对应的选项
     * @return bool
     */
    function del_options($subjectid)
    {
        if (!$subjectid) return false;
        $this->delete(array( 'subjectid' => $subjectid ));
        return true;

    }

    /**
     * 查询 该投票的 选项
     * @param string $subjectid
     * @return array|bool
     */
    function get_options($subjectid)
    {
        if (!$subjectid) return false;
        return $this->select(array( 'subjectid' => $subjectid ), '*', '', $order = 'optionid ASC');

    }

    /**
     * 删除单条对应ID的选项记录
     * @param integer $optionid 投票选项ID
     * @return bool
     */
    function del_option($optionid)
    {
        if (!$optionid) return false;
        return $this->delete(array( 'optionid' => $optionid ));
    }
}
