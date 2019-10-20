<?php 

    require_once "environment.php";
    header("Content-type: text/html; charset=utf-8");

    $config = [];

    if(ENVIRONMENT == 'dev') {
        $config['db_host'] = "localhost";
        $config['db_user'] = "root";
        $config['db_pass'] = "";
        $config['db_name'] = "db_nasa";

    } else {
        $config['db_host'] = "mysql.digitalsmartbr.com.br";
        $config['db_user'] = "allancdev";
        $config['db_pass'] = "Selftech@";
        $config['db_name'] = "db_nasa";
    }


    global $db;

    try {
        $db = new PDO("mysql:dbname=" . $config['db_name'] . ";host=" . $config['db_host'], $config['db_user'],  $config['db_pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e ) {
        echo "ERRO: " . $e -> getMessage();
        exit;
    }


?>