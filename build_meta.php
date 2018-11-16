<?php
/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:16
 */

define('DS', DIRECTORY_SEPARATOR);
$current = dirname(__FILE__) . DS;

/**
 * 生产META信息
 * @param string $classStaticName
 * @param string $classMap
 * @param string $saveFileName
 */
$buildMetaContent = function ($classStaticName, $classMap, $saveFileName) {
    $dirName = dirname($saveFileName);
    if (!is_dir($dirName)) @mkdir($dirName, 0755);
    $metaContent = <<<META
<?php

/**
 * Created by PhpStorm.
 * User: eValor
 * Date: 2018/11/14
 * Time: 上午9:09
 */

namespace PHPSTORM_META {

    override({$classStaticName}, map([
    
        {$classMap}
    ]));

}
META;
    file_put_contents($saveFileName, $metaContent);
};

/**
 * 生产CLASS_MAP
 * @param string $dirName
 * @return string
 */
$buildClassMap = function ($dirName) {
    $files = scandir($dirName);
    $classMap = '';
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        $name = str_replace('.class.php', '', $file);
        $classMap .= "'{$name}' => \\{$name}::class,\n";
    }
    return $classMap;
};

// 构建基础Class
$modelClassMap = $buildClassMap($current . 'phpcms' . DS . 'model');
$sysClassMap = $buildClassMap($current . 'phpcms' . DS . 'libs' . DS . 'classes');
$buildMetaContent('\pc_base::load_model(0)', $modelClassMap, $current . '.phpstorm.meta.php' . DS . 'load_model.meta.php');
$buildMetaContent('\pc_base::load_sys_class(0)', $sysClassMap, $current . '.phpstorm.meta.php' . DS . 'load_sys_class.meta.php');

// 构建APPClass
$appDir = $current . 'phpcms' . DS . 'modules' . DS;
$appDirFiles = scandir($appDir);
foreach ($appDirFiles as $appDirFile) {
    if ($appDirFile === '.' || $appDirFile === '...') continue;
    $realPath = $appDir . $appDirFile;
    if (is_dir($appDir . $appDirFile)) {
        $classesPath = $realPath . DS . 'classes' . DS;
        if (is_dir($classesPath)) {
            $classesMap = $buildClassMap($classesPath);
            $buildMetaContent("\pc_base::load_app_class(0, '{$appDirFile}')", $classesMap, $current . '.phpstorm.meta.php' . DS . "load_app_class_{$appDirFile}.meta.php");
        }
    }
}