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
	
    $sql = "SELECT id_order, C.id_person as id_person, first_name, last_name, email, tel, date_flight, from_country, to_country, 
	baggage, final_price FROM (((client_order C JOIN person P ON C.id_person = P.id_person) 
	JOIN flight F ON (C.id_flight = F.id_flight)) JOIN direction D ON F.id_direction=D.id_direction)  WHERE id_order = $temp";

	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getIDNP(){
	global $link;
    $sql = "SELECT idnp, id_person FROM `person`";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getRatingDirection(){
	global $link;

    $sql = " SELECT R.id_direction as id_direction, to_country ,`cur_rating` FROM `rating` R JOIN direction D on 
	(R.id_direction = D.id_direction) WHERE `cur_rating` >(SELECT AVG(`cur_rating`) FROM `rating`) 
	ORDER by `cur_rating` DESC LIMIT 3; ";

	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getAVGPrice($direction){
	global $link;
    $sql = " SELECT AVG(price_per_person) as price FROM `flight` WHERE id_direction = $direction ";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
function getCountTicketPerson($id_person){
	global $link;
    $sql = " SELECT count(*) as `count` FROM `client_order` WHERE id_person = $id_person ";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}
?>