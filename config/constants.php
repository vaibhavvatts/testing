<?php

define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']); // var/www/testing
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
define('SITE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/testing/'); // www.testing.com

define('LIBARARY_PATH', SITE_ROOT.'libarary/');
define('CONTROLLER_PATH', SITE_ROOT.'controller/');
define('MODAL_PATH', SITE_ROOT.'modal/');
define('VIEW_PATH', SITE_ROOT.'view/');

define('JS_PATH', SITE_PATH.'js/');
define('IMAGES_PATH', SITE_PATH.'images/');
define('CSS_PATH', SITE_PATH.'css/');

