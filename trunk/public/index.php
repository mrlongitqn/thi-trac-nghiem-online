<?php
// Define path to application directory
defined('WEB_ROOT')
    || define('WEB_ROOT', realpath(dirname(__FILE__).'/../'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(WEB_ROOT .'/library'),
    get_include_path(),
))); 

/* Application */
require_once 'Application.php';
$app = new Application(WEB_ROOT .'/config.ini');
$app->run();
require_once WEB_ROOT. '/DTO/Answer_Dto.php';
$x = new Answer_Dto();
var_dump($x);
?>

