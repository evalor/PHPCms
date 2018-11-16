<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'content'), map([

        'comment_api' => \comment_api::class,
        'content_tag' => \content_tag::class,
        'contentpage' => \contentpage::class,
        'html'        => \html::class,
        'push_api'    => \push_api::class,
        'rssbuilder'  => \rssbuilder::class,
        'search_api'  => \search_api::class,
        'url'         => \url::class,

    ]));

}