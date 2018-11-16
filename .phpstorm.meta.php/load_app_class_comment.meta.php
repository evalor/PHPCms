<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'comment'), map([

        'comment'     => \comment::class,
        'comment_tag' => \comment_tag::class,

    ]));

}