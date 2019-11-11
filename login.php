<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >


<div class="container-fluid" style=" margin-left: 32%;">
<?php 
	// fajl za login formu
	
	require_once("konektor.php");



	$err = "";



	if(isset($_POST["submit"])){

		if (!empty($_POST["username"])) {

			$qusername = "SELECT * FROM `korisnici`
						WHERE `username` = :username";
			$korisnici = $konektor->prepare($qusername);
			$korisnici->execute(array(
						':username' => $_POST["username"]
			));

			if ($korisnici->rowCount() == 1) {
				
			}elseif ($korisnici->rowCount() >= 2) {
				$err .= "doslo je do greske kontaktirajte admina sajta <br>";
			}else{
				$err .= "morate se registrovati <br>";
			}

		}else{
			$err .= "morate popuniti polje username. <br>";
		}

		if (!empty($_POST["pass"])) {
			if (isset($_POST['username'])) {
				
				$qa= "SELECT * FROM `korisnici`
					  WHERE `username` = :username
					  AND `password` = :pass
					  ";
				$korisnici = $konektor->prepare($qa);
				$korisnici->execute(array(
						':username' => $_POST['username'],
						':pass' => $_POST['pass']

				));
				
				if ($korisnici->rowCount() == 1) {
				
			}elseif ($korisnici->rowCount() >= 2) {
				$err .= "doslo je do greske kontaktirajte admina sajta <br>";
			}else{
				$err .= "lozinka je netacna <br>";
			}


			}
			
		}else{
			$err .= "morate popuniti polje password. <br>";
		}

		if ($err == "") {

			echo "uspesno ste prijavljeni na sajt";
			$qlog= $korisnici->fetchAll(PDO::FETCH_OBJ);

			foreach ($qlog as $acount) {
				$nalog = $acount->id;
			}
			$_SESSION['id']= $nalog;
			header("Location:index.php");
		}else{

		?>
			<div class="alert alert-danger col-md-4" >
				<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
				<P> <?php echo $err; ?> </P>
			</div>
	<?php

		}

	}
 ?>
 <div class="form-group">	
 <form method="POST" action="index.php?opcija=login">
 	<?php echo "<br>";?>
	 	<div class="bg-dark text-white col-md-4 " >
		<table>
			<tr>
				<td>
					username <span class="fas fa-user"></span>
				</td>
				<td>
					<input type="text" name="username" placeholder="unesite vas username.">
				</td>
			</tr>
			<tr>
				<td>
					password <span class="fas fa-unlock"></span>
				</td>
				<td>
					<input type="password" name="pass" placeholder="unesite vas password.">
				</td>
			</tr>
			<tr>
				
				<td colspan="2">
					<input type="submit" name="submit" value="Log in" class="btn btn-primary">
				</td>
			</tr>
		</table>
	</div>
</div>
 </form>
 </body>
</html>