
	<?php 
		if (isset($_SESSION["id"])) {
	 ?>
	<div class="container">
		
		<?php echo "<br>"; ?>
	<div class="row">
		<?php include('process.php');
			  include_once("konektor.php");
		 
		
		$qkor = 'SELECT * FROM `korisnici`';
		$korisnici=$konektor->query($qkor);
		$fkor = $korisnici->fetchAll(PDO::FETCH_OBJ);

		 ?>
		 
		<div class="col-md-8">
		 	<table class="table table-dark table-striped table-sm">
		 		<thead>
		 			<tr>
		 				<th> Name </th>
		 				<th> Username <span class="fas fa-user"></span></th>
		 				<th> Password <span class="fas fa-unlock"></span></th>
		 				<th>RePassword <span class="fas fa-unlock"></th>
		 				<th colspan="2">Action</th>
		 			</tr>		
		 		</thead>
		 		<?php foreach ($fkor as $k){ ?>
		 			<tr>
		 				<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>"> <?php echo $k->name; ?> </a> </td>
		 				<td> <?php echo $k->username; ?> </td>
		 				<td> <?php echo $k->password; ?> </td>
		 				<td> <?php echo $k->password; ?> </td>
		 				<td><a class="btn btn-success" href="index.php?opcija=index2&edit=<?php  echo $k->id; ?>"> edit <span class="fas fa-user-edit"></span> </a></td>
		 				<td><a class="btn btn-danger"href="index.php?opcija=index2&delete=<?php echo $k->id; ?>"> delete <span class="fas fa-trash"></span> </a></td>
		 			</tr>
		 		<?php } ?>
		 	</table>
		</div>
	 	
		<div class="col-md-4 bg-success" style="height: 220px;">
			<form action="index.php?opcija=index2" method="POST">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>" >
				<br>
				<table>	
					<tr>
						<td><label>Name <span class="fas fa-user"></span></label></td>
						<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
					</tr>
					<tr>
						<td><label>Username <span class="fas fa-user"></span></label></td>
						<td><input type="text" name="username" value="<?php echo $username; ?>"></td>
					</tr>
					<tr>	
						<td><label>Password <span class="fas fa-unlock"></span></label></td>
						<td><input type="password" name="password" value="<?php echo $password; ?>"></td>
					</tr>
					<tr>
						<td><label>RePassword <span class="fas fa-unlock"></span></label></td>
						<td><input type="password" name="repassword" value="<?php echo $password; ?>"></td>
					</tr>
					<tr>	
						<td colspan="2"><button type="submit" name="update" class="btn btn-primary">Update</button> </td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>
	</div>
<?php
	}else{

?> 
	<div class="alert alert-danger col-md-4" style="margin-left: 33%;">
				<p class="close" data-dismiss="alert" data-lable="close"s >&times; </p> 
				<P> <?php echo "Nemate pravo da pristupite stranici ako niste prijavljeni."; ?> </P>
			</div>
<?php
	}
?>
