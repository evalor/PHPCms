<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'video'), map([

        'ku6api' => \ku6api::class,
        'v'      => \v::class,
        'xxtea'  => \xxtea::class,

    ]));

}