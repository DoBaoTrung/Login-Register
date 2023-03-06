<?php
    include "../../config.php";
    try {
        if (class_exists('PDO')) {
            $dsn = _DRIVER . ':dbname=' . _DB . ';host=' . _HOST;
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            $conn = new PDO($dsn, _USER, _PASS, $options);
            // echo "Kết nối database thành công";
        }
    } catch (Exception $e) {
        die();
    }
?>