
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!defined('BASE_URL')) define('BASE_URL', 'https://brunov244.greensyst.com.br/');
if(!defined('BASE_APP')) define('BASE_APP', str_replace('\\','/',__DIR__).'/' );
if(!defined('DB_SERVER')) define('DB_SERVER', '127.0.0.1:3306');
if(!defined('DB_USERNAME')) define('DB_USERNAME', 'sql_brunov244_co');
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', '6a22dded05121');
if(!defined('DB_NAME')) define('DB_NAME', 'sql_brunov244_co');
?>