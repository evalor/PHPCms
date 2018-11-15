<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:16
 */

define('DS', DIRECTORY_SEPARATOR);
$current = dirname(__FILE__) . DS;
$dirname = $current . 'phpcms' . DS . 'model';
$files = scandir($dirname);

// fetch
$classMap = '';
foreach ($files as $file) {
    if ($file == '.' || $file == '..') continue;
    $name = str_replace('.class.php', '', $file);
    $classMap .= "'{$name}' => \\{$name}::class,\n";
}


$meta = $current . '.phpstorm.meta.php' . DS . 'load_model.meta.php';
@mkdir($current . '.phpstorm.meta.php', 0755);
$metaContent = <<<META
<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override(\pc_base::load_model(0), map([
        {$classMap}
    ]));

}
META;
file_put_contents($meta, $metaContent);