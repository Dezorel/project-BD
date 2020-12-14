<?php
$my_host = 'localhost';
$username = 'root';
$password = '';
$database = 'avia';

try{                                                                                           
    $link = new PDO('mysql:host='.$my_host.';dbname='.$database, $username, $password);
    $link->exec("SEET NAMES UTF8");
}catch(Exception $e){
    die("Не удалось подключиться". $e->getMessage());
}


?>