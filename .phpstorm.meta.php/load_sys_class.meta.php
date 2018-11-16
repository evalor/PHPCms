<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_sys_class(0), map([

        'access'         => \access::class,
        'application'    => \application::class,
        'attachment'     => \attachment::class,
        'cache_factory'  => \cache_factory::class,
        'cache_file'     => \cache_file::class,
        'cache_memcache' => \cache_memcache::class,
        'checkcode'      => \checkcode::class,
        'db_access'      => \db_access::class,
        'db_factory'     => \db_factory::class,
        'db_mysqli'      => \db_mysqli::class,
        'form'           => \form::class,
        'format'         => \format::class,
        'ftps'           => \ftps::class,
        'hook'           => \hook::class,
        'http'           => \http::class,
        'image'          => \image::class,
        'import_test'    => \import_test::class,
        'ip_area'        => \ip_area::class,
        'model'          => \model::class,
        'mysql'          => \mysql::class,
        'mysqlidb'       => \mysqlidb::class,
        'param'          => \param::class,
        'push_factory'   => \push_factory::class,
        'segment'        => \segment::class,
        'session_files'  => \session_files::class,
        'session_mysql'  => \session_mysql::class,
        'template_cache' => \template_cache::class,
        'tree'           => \tree::class,
        'update'         => \update::class,
        'xml'            => \xml::class,

    ]));

}