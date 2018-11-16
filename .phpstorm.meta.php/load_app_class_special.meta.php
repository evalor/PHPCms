<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'special'), map([

        'comment_api' => \comment_api::class,
        'html'        => \html::class,
        'push_api'    => \push_api::class,
        'search_api'  => \search_api::class,
        'special_api' => \special_api::class,
        'special_tag' => \special_tag::class,

    ]));

}