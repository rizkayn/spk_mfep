<?php
    error_reporting(~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
    session_start();
    $config["server"]='localhost';
    $config["username"]='root';
    $config["password"]='iamroot4521';    
    $config["database_name"]='proj_spk_mfep';

    include'includes/ez_sql_core.php';
    include'includes/ez_sql_mysqli.php';
    $db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
    include'includes/general.php';    

    $mod = $_GET['m'];
    $act = $_GET['act'];
?>
