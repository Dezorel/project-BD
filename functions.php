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
function getPrice(){
	global $link;
    $sql = "SELECT price_per_person FROM `flight`";
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

?>