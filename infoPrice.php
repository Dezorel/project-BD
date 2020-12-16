<?php
	require "db_connect.php";
	require "functions.php";
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
            Информация
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Наши самы популярные направления и их средняя цена билета:</p>
                <?php
                $rating = getRatingDirection();

                  foreach($rating as $r){
                    $cur_id = getAVGPrice($r['id_direction']); 
                    echo $r['to_country'].", средняя цена билета = ".$cur_id[0]['price']."euro <br>";
                  }
                ?>
            
              
              
              <!--<footer class="blockquote-footer"></footer>-->
            </blockquote>
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