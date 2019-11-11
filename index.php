<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body style="background-image: url('kisa.jpg');">

<div class="container-fluid">		
	<?php 
		session_start();

		if (isset($_SESSION["id"])){
		
	?>
	<div class="row bg-dark" >
		<ul class="nav nav-tabs" style="margin-left: 33%;">
			<li class="nav-item"><a href="index.php" class="btn btn-primary btn-lg"> POČETNA <span class="fas fa-home"></span> </a> </li>
			<li class="nav-item"><a href="index.php?opcija=index2" class="btn btn-primary btn-lg"> KORISNICI <span class="fas fa-users"></span></a></li>
		 	<li class="nav-item"><a href="index.php?opcija=logout" class="btn btn-danger btn-lg"> ODJAVA <span class="fas fa-power-off"></span></a></li>

		</ul>
	</div>
	 <?php 
	 		if (isset($_GET['opcija'])) {
	 			$fajl = $_GET['opcija'] . ".php";
	 			if (file_exists($fajl)) {
	 				include_once($fajl);
	 			}else{
	 				echo "trazena stranica ne postoji vratite se na <a href='index.php'> pocetna stranica </a>";
	 			}
	 		}else{
	 				echo "<br>";
	 				?>
	 				<div class="jumbotron col-md-8" style="margin-left: 16%;"> <h1>Čestitamo, uspešno ste se ulogovali na sajt. </h1>
	 					
	 				</div>
	 			
	 			<?php
	 		}
	  


		}else{
		
	 ?>
	 <div class="row bg-dark" >
		<ul class="nav nav-tabs fixed-left" style="margin-left:33%;"> 
			 <li class="nav-item">  <a href="index.php" class="btn btn-primary btn-lg"> POČETNA <span class="fas fa-home"></span> </a> </li>
			 <li class="nav-item">	<a href="index.php?opcija=register" class="btn btn-primary btn-lg"> REGISTRACIJA </a> </li>
			 <li class="nav-item">	<a href="index.php?opcija=login" class="btn btn-primary btn-lg"> PRIJAVA <span class="fas fa-sign-in-alt"></span> </a> </li>
		 </ul>
	</div>
	 <?php 
	 		if (isset($_GET['opcija'])) {
	 			$fajl = $_GET['opcija'] . ".php";
	 			if (file_exists($fajl)) {
	 				include_once($fajl);
	 			}else{
	 				echo "trazena stranica ne postoji vratite se na <a href='index.php'> pocetna stranica </a>";
	 			}
	 		}else{
	 			echo "<br>"; ?> 
	 			<div class="col-md-4 bg-dark text-white text-center jumbotron" style="margin-left: 33%;"><h1> <?php  echo "POČETNA STRANICA";?> </h1></div>
	 			<?php
	 			//include_once("login.php");
	 			//include_once("register.php");
	 		}
	 	}
	  ?>
</div>	  
</body>