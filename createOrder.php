<?php
    require "db_connect.php";
    require "functions.php";

    
    session_start();

$idnpFromDB = getIDNP();

$firts_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$idnp = $_POST['idnp'];
$email = $_POST['e-mail'];
$tel = $_POST['tel'];
$pas = $_POST['pas'];
$idFlight = $_SESSION['user']['id_flight'];
$baggage = $_SESSION['user']['baggage'];
$final_price = $_SESSION['user2']['final_price'];

global $link;

if($pas == "septefrati")        //покупка
{
    $firts_name = htmlspecialchars($firts_name);
    $last_name = htmlspecialchars($last_name);
    $idnp = htmlspecialchars($idnp);
    $email = htmlspecialchars($email);
    $tel = htmlspecialchars($tel);
    $password = htmlspecialchars($password);

    foreach($idnpFromDB as $iDB){
        if($idnp == $iDB['idnp']){
            $isIDNP = true;
            $lastIDPerson = $iDB['id_person'];
            break;
        }
        else $isIDNP = false;
    }
   
    if($isIDNP === false){
        $stmt = $link->prepare("INSERT INTO `person` (`first_name`, `last_name`, `idnp`, `email`, `tel`) 
        VALUES (:name_person, :last_name_person, :idnp, :email, :telephone)");          //создаю person в БД
        $stmt->bindParam(':name_person', $firts_name);
        $stmt->bindParam(':last_name_person', $last_name);
        $stmt->bindParam(':idnp', $idnp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $tel);
        $stmt->execute();
        $lastIDPerson = $link->lastInsertId();
    }
   


    //создаю заказ на этого человека
 
    $sql = " INSERT INTO `client_order` ( `id_person`, `id_flight`, `baggage`, `final_price`) 
    VALUES ( $lastIDPerson, $idFlight , $baggage, $final_price)";
	$query= $link->query($sql);
	$query->execute();
	$data = $query->fetchAll();         //получаю id заказа 
	
        
}
else echo 2;        //недостаточно средств

?>