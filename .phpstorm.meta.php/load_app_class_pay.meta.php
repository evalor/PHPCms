<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_app_class(0, 'pay'), map([

        'Alipay'       => \Alipay::class,
        'Bank'         => \Bank::class,
        'Chinabank'    => \Chinabank::class,
        'Sndapay'      => \Sndapay::class,
        'pay_abstract' => \pay_abstract::class,
        'pay_deposit'  => \pay_deposit::class,
        'pay_factory'  => \pay_factory::class,
        'pay_method'   => \pay_method::class,
        'receipts'     => \receipts::class,
        'spend'        => \spend::class,

    ]));

}