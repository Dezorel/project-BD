<?php

    require 'db_connect.php';
     session_start();
    if(!empty($_POST['newEmail'])){
        $newEmail = $_POST['newEmail'];
        $newEmail = htmlspecialchars($newEmail);
        $id = $_SESSION['cur_user']['id'];
        echo $id;
        global $link;

      
        $query= $link->prepare("UPDATE `person` SET `email` = :email WHERE `person`.`id_person` = $id ");
        $params = ["email"=> $newEmail];
        $query->execute($params);
       

        header("Location: index.php");
        exit();
    }
    else {
        echo "<h2 align ='center'>Вы не ввели почту!</h2>";
    }
?>