<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);

/**
 * 谷歌站点地图子项目
 * Class googlesitemap_item_model
 */
class googlesitemap_item_model extends model
{
    public $loc;
    public $lastmod;
    public $changefreq;
    public $priority;
    private $items;

    public function __construct()
    {
        $this->items = array();
        parent::__construct();
    }

    /**
     * @param string $loc 位置
     * @param string $lastmod 日期格式 YYYY-MM-DD
     * @param string $changefreq 更新频率的单位 (always, hourly, daily, weekly, monthly, yearly, never)
     * @param string $priority 更新频率 0-1
     */
    function google_sitemap_item($loc, $lastmod = '', $changefreq = '', $priority = '')
    {
        $this->loc = $loc;
        $this->lastmod = $lastmod;
        $this->changefreq = $changefreq;
        $this->priority = $priority;
    }
}
