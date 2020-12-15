<?php
require "db_connect.php";
require "functions.php";

session_start();

$currentDateTicket = getDateFromDb();
$currentTickets = getFlightTickets();

foreach ($currentTickets as $ct)
{
    if( ($ct['to_country'] == $_POST['to']) && ($currentDateTicket[0]['df']>0 ) )
    {
       
            $dbDate = strtotime($ct['date_flight']);
            $userDate = strtotime($_POST['depart']);
            if($dbDate == $userDate){          // для ближайшего >
                $_SESSION['user']=[
                    "from"=>$_POST['from'],
                    "to"=>$_POST['to'],
                    "depart"=>$ct['date_flight'],
                    "return"=>$ct['return_date'],
                    "passanger"=>$_POST['passanger'],
                    "baggage"=>$_POST['baggage'],
                    "price"=>$ct['price_per_person'],
                    "id_flight"=>$ct['id_flight'],
                    ];
                    header("Location: buy_ticket.php");
                    exit();
            }
            else header("Location: info.php");
    }
}


?>