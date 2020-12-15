<?php

function getLondon(){
    global $link;
    $sql = "SELECT * FROM `direction` WHERE id_direction=1";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getParis(){
    global $link;
    $sql = "SELECT * FROM `direction` WHERE id_direction=2";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getRim(){
    global $link;
    $sql = "SELECT * FROM `direction` WHERE id_direction=3";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getAllFlight(){
    global $link;
    $sql = "SELECT * FROM `direction`";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getBoeing(){
    global $link;
    $sql = "SELECT * FROM `plane` WHERE id_plane=1";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getAirBus(){
    global $link;
    $sql = "SELECT * FROM `plane` WHERE id_plane=2";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getAllPlane(){
    global $link;
    $sql = "SELECT * FROM `plane`";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getDateFromDb(){
	global $link;
    $sql = "SELECT COUNT(date_flight) as df FROM `flight` WHERE date_flight>= now()";		//запрос на получение полётов от сегодняшнего дня
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getFlightTickets(){
	global $link;

    $sql = "SELECT id_flight, date_flight, depart_time, price_per_person, 
	D.id_direction, to_country, from_country, return_date, return_time FROM `flight` F JOIN `direction` D 
	ON (F.id_direction = D.id_direction) WHERE date_flight>= now()";

	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getInfoTicket($temp) {
	global $link;
	
    $sql = "SELECT id_order,first_name, last_name, email, tel, date_flight, from_country, to_country, 
	baggage, final_price FROM (((client_order C JOIN person P ON C.id_person = P.id_person) 
	JOIN flight F ON (C.id_flight = F.id_flight)) JOIN direction D ON F.id_direction=D.id_direction)  WHERE id_order = $temp";

	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
?>