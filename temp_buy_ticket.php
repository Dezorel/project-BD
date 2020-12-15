<?php
require "db_connect.php";
require "functions.php";

session_start();
$currentDateTicket = getDateFromDb();
$currentTickets = getFlightTickets();
$i=0;
foreach ($currentTickets as $ct)
{
    if( ($ct['to_country'] == $_POST['to']) && ($currentDateTicket[0]['df']>0 ))
    {
        $_SESSION['user']=[
            "from"=>$_POST['from'],
            "to"=>$_POST['to'],
            "depart"=>$ct['date_flight'],
            "return"=>$ct['return_date'],
            "passanger"=>$_POST['passanger'],
            "baggage"=>$_POST['baggage'],
            "price"=>$ct['price_per_person'],
            ];
            header("Location: buy_ticket.php");
            exit();
    }
    else $i++;
}
if($i>0){
    header("Location: info.php");
}

?>