<?php
require "db_connect.php";
require "functions.php";

session_start();

if(!empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['depart']) && !empty($_POST['return'])){
    
    $_SESSION['user']=[
        "from"=>$_POST['from'],
        "to"=>$_POST['to'],
        "depart"=>$_POST['depart'],
        "return"=>$_POST['return'],
        "passanger"=>$_POST['passanger'],
        "baggage"=>$_POST['baggage'],
        ];
        
        header("Location: buy_ticket.php");
}

?>