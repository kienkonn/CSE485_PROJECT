<?php
define('APP_ROOT', dirname(__FILE__, 2));


// Thông tin kết nối cơ sở dữ liệu
define('DB_HOST', 'localhost');
define('DB_NAME', 'tintuc');
define('DB_USER', 'root');
define('DB_PASS', '123456');

// Thông tin kết nối PDO
define('PDO_DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
