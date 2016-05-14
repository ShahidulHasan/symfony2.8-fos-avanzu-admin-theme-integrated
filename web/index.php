<?php
ini_set('date.timezone', 'Asia/Dhaka');
defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'prod'));

define('WEB_PATH', __DIR__);

if (APPLICATION_ENV == 'dev') {
    require 'app_dev.php';
} else {
    require 'app.php';
}
