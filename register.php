

<?php 
	// fajl za registraciju
	require_once("konektor.php");

	$err = "";

	if(isset($_POST["submit"])){

		if (!empty($_POST["name"])) {
			$name = $_POST["name"];
		}else{
			$err .= "morate popuniti polje name. <br>";
		}
		
		if (!empty($_POST["username"])) {

			$qusername = "SELECT * FROM `korisnici` WHERE `username` = :username";
			$korisnici = $konektor->prepare($qusername);
			$korisnici->execute(array(
				':username' => $_POST['username']
			));
			if($korisnici->rowCount()){
				$err .= "username postoji vec u bazi, molimo odaberite drugi <br>";
			}
			else {
				$username = $_POST['username'];
			}

		}else{
			$err .= "morate popuniti polje username. <br>";
		}

		if (!empty($_POST["pass"])) {
			
		}else{
			$err .= "morate popuniti polje password. <br>";
		}

		if (!empty($_POST["repass"])) {
			
		}else{
			$err .= "morate popuniti polje repassword. <br>";
		}

		if (!empty($_POST["pass"]) && !empty($_POST["repass"])){
			if($_POST["pass"] == $_POST["repass"]){
				$password = $_POST["pass"];
			}else{
				$err .= "lozinke se ne poklapaju <br>";
			}
		     
		}

		

		if ($err <> "") {
			?>
			<div class="alert alert-danger col-md-4" style="margin-left: 33%;">
				<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
				<P> <?php echo $err; ?> </P>
			</div>
			<?php

		}else{
		$qk = "INSERT INTO `korisnici` 
			SET `name` = :name,
				`username` = :username,
				`password` = :password
			";
		$k = $konektor->prepare($qk);
		$k->execute(array(
			':name' => $name,
			':username' => $username,
			':password' => $password,
		));

			
		?>
			<div class="alert alert-success col-md-4" style="margin-left: 33%;">
				<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
				<P> Uspesno ste se registrovali. <span class="fas fa-thumbs-up"></span></P>
			</div>
<?php

		}
			
	}
 ?>
 <div class="form-group">
 <form method="POST" action="index.php?opcija=register">
<?php echo "<br>";?>
	<div class="bg-dark text-white col-md-4 " style="margin-left: 33%;">
		<table>
			<tr>
				<td>
					name <span class="fas fa-user"></span>
				</td>
				<td>
					<input type="text" name="name" placeholder="unesite vas name.">
				</td>
			</tr>
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
				<td>
					repassword <span class="fas fa-unlock"></span>
				</td>
				<td>
					<input type="password" name="repass" placeholder="ponovite vas password.">
				</td>
			</tr>
			
			<tr>
				
				<td colspan="2">
					<input type="submit" name="submit" value="registruj se" class="btn btn-primary">
				</td>
			</tr>
		</table>
	</div>
</div>
 </form>