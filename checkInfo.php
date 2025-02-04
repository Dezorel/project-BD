<?php
	require "db_connect.php";
  require "functions.php";
  session_start();
  $check = getInfoTicket($_POST['check']);
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Информация</title>
  </head>
  <body>
    <div class="container" id="up">
        <!--Навигационная панель-->
		<nav class="navbar navbar-expand-lg navbar-light " style="background-color:white">
			<a class="navbar-brand" style="margin-right: 50px; " href="#">7Avia</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item">
				  <a class="nav-link" href="index.php">Вернуться на главную</a>
				</li>
			  </ul>
			  <span class="navbar-text">
				telephone: <a class="mr-5" href="tel:078113237"> 077-77-77-77</a>
				email:<a href="mailto:7avia_ticket@mail.ru">7avia_ticket@mail.ru</a>
			  </span>
			</div>
		</nav>
        <!--Конец навигационной панели-->

        <div class="card mt-5">
          <div class="card-header">
            Информация о билете <?php 
             if(!empty($check)){
            echo "номер ".$check[0]['id_order'];
             }
             else {
               echo " не найдена. Проверьте правильность вводимых данных";
             }
            ?>
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
                <?php
                
                if(!empty($check)){
                  $baggage = $check[0]['baggage'];
                  if($baggage==0) {$baggage = "Ручная кладь";}
                  else {$baggage = "С багажом (до 20кг)";}
                }
                else{
                  ?>
                  <div align="center">
                  <img src="images/error.png"  style="width:50%">
                  </div>
                  
                  <?php
                }
                
                if(!empty($check)){
                  echo "Билет номер: ".$check[0]['id_order']."<br>";
                  echo "Имя: ".$check[0]['first_name']."<br>";
                  echo "Фамилия: ".$check[0]['last_name']."<br>";
                  echo "Почта: ".$check[0]['email']."<br>";
                  echo "Телефон: ".$check[0]['tel']."<br>";
                  echo "Дата вылета: ".$check[0]['date_flight']."<br>";
                  echo "Откуда: ".$check[0]['from_country']."<br>";
                  echo "Куда: ".$check[0]['to_country']."<br>";
                  echo "Багаж: ".$baggage."<br>";
                  echo "Финальная цена: ".$check[0]['final_price']."<br>";
                  $count = getCountTicketPerson($check[0]['id_person']);
                  $_SESSION['cur_user']=["id"=>$check[0]['id_person']];
                  echo "Вы летали нашими авиалиниями: ".$count[0]['count']." раз!";
                }
              
               ?>
                
                
            
              
              
              <!--<footer class="blockquote-footer"></footer>-->
            </blockquote>
          </div>
        </div>
                <div class="row mt-5" >
                  <div class="col">
                    <h4>Функции для администратора:</h4>
                  </div>
                  </div>
      <div class="row mt">
        <div class="col-6">
          
          <form class="needs-validation mt-4 ml-3 mr-3" novalidate action="UpdateAdmin.php" method="POST">
          <div class="form-group row">
        <label for="example-email-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
          <input class="form-control" type="email" id="example-email-input" name="newEmail" required>
        </div>
      </div>
              <button class="btn btn-info mt-2" type="submit">Изменить почту</button>
			</form>
        </div>
      </div>

<div class="row mt-3 ml-1 mb-5">
<div class="col-6">

<a class="btn btn-info" href="DeleteAdmin.php" role="button">Удалить полёты этого человека</a>
</div>
</div>




    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <a href="#up" style="position:fixed; right:-55px; bottom: 5px;"><img style="width:45%" src="images/fly1.svg"></a>
  </body>
</html>