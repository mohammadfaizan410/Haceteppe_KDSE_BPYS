<?php
$db_user = "root";
$db_pass = "";
$db_name = "kdse_db";
$db_host = "localhost";
$db_options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
];
$db = new PDO('mysql:host=' . $db_host .';dbname=' . $db_name, $db_user, $db_pass, $db_options);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);