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


?>