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
?>

