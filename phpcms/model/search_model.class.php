<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 全站搜索模型
 * Class search_model
 */
class search_model extends model
{
    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'search';
        parent::__construct();
    }

    /**
     * 添加到全站搜索 修改已有内容
     * @param int $typeid 类型标识
     * @param int $id
     * @param string $data
     * @param string $text 不分词的文本
     * @param int $adddate 添加时间
     * @param int $iscreateindex 是否是后台更新全文索引
     * @return bool
     */
    public function update_search($typeid, $id = 0, $data = '', $text = '', $adddate = 0, $iscreateindex = 0)
    {
        $segment = pc_base::load_sys_class('segment');

        // 分词结果
        $fulltext_data = $segment->get_keyword($segment->split_result($data));
        $fulltext_data = $text . ' ' . $fulltext_data;
        $r = array();
        if (!$iscreateindex) {
            $r = $this->get_one(array( 'typeid' => $typeid, 'id' => $id ), 'searchid');
        }

        if ($r) {
            $searchid = $r['searchid'];
            $this->update(array( 'data' => $fulltext_data, 'adddate' => $adddate ), array( 'typeid' => $typeid, 'id' => $id ));
        } else {
            $siteid = param::get_cookie('siteid');
            $searchid = $this->insert(array( 'typeid' => $typeid, 'id' => $id, 'adddate' => $adddate, 'data' => $fulltext_data, 'siteid' => $siteid ), true);
        }
        return $searchid;
    }

    /**
     * 删除全站搜索内容
     * @param int $typeid
     * @param int $id
     * @return bool
     */
    public function delete_search($typeid, $id)
    {
        return $this->delete(array( 'typeid' => $typeid, 'id' => $id ));
    }
}
