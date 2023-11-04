<?php
$DB_HOST = "m7az7525jg6ygibs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$DB_USER = "fgh9sc82wezg1d1y";
$DB_PASS = "rsb5bdcbut01gt64";
$DB_NAME = "xtm5hual7b3uhuky";
try {
    $dbh = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
