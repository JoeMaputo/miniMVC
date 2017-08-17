<?php
/* Настройки и константы */

session_start();
date_default_timezone_set('Europe/Moscow');

define('SITE', 'http://' . $_SERVER['SERVER_NAME'] . '/');
define('SITE_SSL', 'https://' . $_SERVER['SERVER_NAME'] . '/');
define('PUB_DIR', __DIR__ . '/');
define('ENG_FILES', '../files/');

if(isset($_SERVER['HTTPS'])){
	define('SITE_NOW', 'https://' . $_SERVER['SERVER_NAME'] . '/');
} else {
	define('SITE_NOW', 'http://' . $_SERVER['SERVER_NAME'] . '/');
}

/* Функция автоматической загрузки файлов классов */

spl_autoload_register(function ($some_class) {
	$some_path = preg_replace('{^\/}', '', strtolower(str_replace('\\', '/', $some_class)));
	require_once(ENG_FILES . 'engin/' . $some_path . '.class.php');
});
