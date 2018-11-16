<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 单网页数据表
 * Class page_model
 */
class page_model extends model
{
    private $html;

    public function __construct()
    {
        $this->db_config = pc_base::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'page';
        parent::__construct();
    }

    /**
     * 生成静态
     * @param string|integer $catid
     */
    public function create_html($catid)
    {
        $this->html = pc_base::load_app_class('html', 'content');
        $this->html->category($catid, 1);
    }
}
