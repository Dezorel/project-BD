<?php
require "db_connect.php";
require "functions.php";

session_start();
$currentDateTicket = getDateFromDb();

if(!empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['depart']) && !empty($_POST['return']) && ($currentDateTicket[0]['df']>0)){
    
    $_SESSION['user']=[
        "from"=>$_POST['from'],
        "to"=>$_POST['to'],
        "depart"=>$_POST['depart'],
        "return"=>$_POST['return'],
        "passanger"=>$_POST['passanger'],
        "baggage"=>$_POST['baggage'],
        ];
        header("Location: buy_ticket.php");
        exit();
}
else{
    echo "<h1>Ошибка, нет новых билетов</h1>";             //тут надо вставить что показывать когда билетов нет...
}

?>