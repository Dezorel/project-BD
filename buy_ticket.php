<?php
	require "db_connect.php";
  require "functions.php";
  session_start();

   $passanger = $_SESSION['user']['passanger'];
   $baggage = $_SESSION['user']['baggage'];

    $pricePerPerson = $_SESSION['user']['price'];
    $finalPrice = 0;

   switch($passanger){
        case 10:
          $passanger="1";
          $finalPrice = $pricePerPerson;
        break;
        case 20:
          $passanger="2";
          $finalPrice = $pricePerPerson*2;
        break;
        case 30:
          $passanger="3";
          $finalPrice = $pricePerPerson*3;
        break;
        case 11:
          $passanger="1 + младенец";
          $finalPrice = $pricePerPerson +  $pricePerPerson/4;
          break;
        case 12:
          $passanger="1 + ребёнок";
          $finalPrice = $pricePerPerson +  $pricePerPerson/2;
        break;
        case 21:
          $passanger="2 + младенец";
          $finalPrice = $pricePerPerson*2 +  $pricePerPerson/4;
        break;
        case 22:
          $passanger="2 + ребёнок";
          $finalPrice = $pricePerPerson*2 +  $pricePerPerson/2;
        break;
   }
   switch($baggage){
      case 0:
       $baggage="Ручная кладь";
      break;
      case 1:
        $baggage="С багажом (до 20кг)";
        $finalPrice +=20;
       break;
   }
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Покупка билета</title>
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
        

    <!--Форма покупки-->
    <div class="row mt-3 mb-2">
      <div class="col" align="center">
        <h2>Заполните следующие поля для покупки билета</h2>
        <p class="mt-3">Ваш рейс из
          <?php
          $from =$_SESSION['user']['from'];
          $to = $_SESSION['user']['to'];
          $data_depart =$_SESSION['user']['depart'];
          $return_date =  $_SESSION['user']['return'];

          $_SESSION['user2']=['final_price' => $finalPrice];

          echo $from." в ".$to."<br>";
          echo "Дата вылета ".$data_depart."<br>Дата возращения ".$return_date."<br>"; 
          echo "Количество пассажиров: ".$passanger."<br>Багаж: ".$baggage;
          echo "<br>К оплате: ".$finalPrice." euro";
          ?>
        </p>
      </div>
    </div>
    <!--Форма покупки-->
    <form action="createOrder.php" method="post">
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Имя</label>
        <div class="col-10">
          <input class="form-control" type="text" id="example-text-input" name="first_name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Фамилия</label>
        <div class="col-10">
          <input class="form-control" type="text" id="example-text-input" name="last_name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">IDNP</label>
        <div class="col-10">
          <input class="form-control" type="search" maxlength="13" id="example-search-input" name="idnp" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-email-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
          <input class="form-control" type="email" id="example-email-input" name="e-mail" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-tel-input" class="col-2 col-form-label">Телефон</label>
        <div class="col-10">
          <input class="form-control" type="tel" id="example-tel-input" name="tel" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">К оплате(указана стоимость)</label>
        <div class="col-10">
          <input class="form-control" type="text" id="example-text-input" name="pas">
        </div>
      </div>
      <div class="form-row mt-4">
        <div class="col-md" align="center">
			    <button class="col-sm-4 btn btn-primary btn-lg" type="submit">Купить билет</button>
			  </div>
      </div>
    </form>
    <!--Конец формы покупки-->
   


    
    <!--Конец бутстрап контэйнера-->
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!--  
    <a href="#up" style="position:fixed; right:-55px; bottom: 5px;"><img style="width:45%" src="images/fly1.svg"></a>
   -->
  </body>
</html>