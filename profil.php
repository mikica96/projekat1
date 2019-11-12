<div style="margin-left: 25%;">
<?php 
	echo "<br>";
	include_once("konektor.php");

		if (isset($_GET["pid"])) {

			$qkor= " SELECT * FROM `korisnici`
					WHERE `id` = :korisnik";
			$profil= $konektor->prepare($qkor);
			$profil -> execute(array(':korisnik'=> $_GET['pid']));
			
		}else{
			$qkor= " SELECT * FROM `korisnici`
					WHERE `id` = :korisnik";
			$profil= $konektor->prepare($qkor);
			$profil -> execute(array(':korisnik'=> $_SESSION['id']));

		}

	if (isset($_SESSION["id"])) {
		if($profil -> rowCount()){
			$fetchprofil= $profil->fetchAll(PDO::FETCH_OBJ);
			foreach ($fetchprofil as $p) { ?>
				<div class="col-md-6">
					<table class="table table-dark table-striped text-center">
						<tr><td colspan="3">

							<?php if ($_SESSION['id'] == $p->id) { ?>
								<h3><?php echo "Podatci o vašem profilu."; ?> <h3></td></tr>

							<?php }else{ ?>
								<h3><?php echo "Podatci o korisniku sa id: ". $p->id . "."; ?> <h3></td></tr>
							<?php } ?>

						<tr><th> <h3>name</h3></th> <td><h3><p class="fas fa-arrow-right"></p></h3></td>
							<td> <?php echo "<h3>" . $p->name . "</h3>"; ?> </td> </tr>

						<tr><th> <h3>username</h3></th> <td><h3><p class="fas fa-arrow-right"></p></h3>
							<td> <?php echo "<h3>" . $p->username . "</h3>"; ?> </td> </tr>

						<tr><th> <h3>password</h3></th>  <td><h3><p class="fas fa-arrow-right"></p></h3>
							<td> <?php echo "<h3>" . $p->password . "</h3>"; ?> </td> </tr>
					</table>
				</div>
		<?php
			}
		}else{
			?> 
				<div class="alert alert-danger col-md-4" >
					<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
					<P> <?php echo "trazeni korisnik ne postoji."; ?> </P>
				</div>
			<?php

		}
	}else{
		?> 
			<div class="alert alert-danger col-md-4" >
				<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
				<P> <?php echo "Nemate pravo da pristupite stranici ako niste prijavljeni."; ?> </P>
			</div>
		<?php
		}
 ?>
</div>