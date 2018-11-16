<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'member'), map([

        'OauthSDK'         => \OauthSDK::class,
        'client'           => \client::class,
        'foreground'       => \foreground::class,
        'member_cache'     => \member_cache::class,
        'member_interface' => \member_interface::class,
        'member_tag'       => \member_tag::class,
        'qqapi'            => \qqapi::class,
        'qqoauth'          => \qqoauth::class,
        'saetv2.ex'        => \saetv2 . ex::class,
        'weibooauth'       => \weibooauth::class,

    ]));

}