<?php
define('HOST', "192.168.135.113");
define('DB_NAME', "perout");
define('USER', "User");
define('PASS', "rQUSxP2xUCxnzU45");

try{
    $db = new PDO("mysql:host=" .HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo $e;
}
?>