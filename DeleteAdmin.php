<?php
require "db_connect.php";
session_start();
$id = $_SESSION['cur_user']['id'];

global $link;
    $sql = "DELETE FROM `client_order` WHERE `client_order`.`id_person` = $id"; 
	$query= $link->query($sql);
    
    
header("Location: index.php");
exit();
?>