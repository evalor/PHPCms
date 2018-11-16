<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'admin'), map([

        'admin'      => \admin::class,
        'admin_op'   => \admin_op::class,
        'cache_api'  => \cache_api::class,
        'card'       => \card::class,
        'module_api' => \module_api::class,
        'plugin_op'  => \plugin_op::class,
        'push_api'   => \push_api::class,
        'role_cat'   => \role_cat::class,
        'role_op'    => \role_op::class,
        'sites'      => \sites::class,

    ]));

}