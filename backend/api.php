<?php
/**
 *	API script
 *	Test for DK
 *  @author Eigin <sergei@eigin.net>
 *	@version 1.0
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$class = $_POST['class'];
$action = $_POST['action'];
$param = $_POST['param'] ?? [];

spl_autoload_register ( function ($className) {
    $path = __DIR__.'/'.str_replace('\\', '/', $className).'.php';
    require $path;
});

$app_path = file_exists(__DIR__ .'/control/'.$class.'.php') ? 'control\\' : 'model\\';
$class = $app_path.$class;

$res = (new $class)->$action($param);

echo json_encode($res);
