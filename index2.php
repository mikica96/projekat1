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
<body>
	<?php 
		if (isset($_SESSION["id"])) {
	 ?>
	<div class="container">
		
		<?php echo "<br>"; ?>
	<div class="row">
		<?php include('process.php'); ?>
		
		<?php 
		
		$mysqli = new mysqli ('localhost', 'root', '', 'logreg') or die(mysqli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM `korisnici`') or die ($mysqli->error);

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
		 		<?php while( $row = $result->fetch_assoc()): ?>
		 			<tr>
		 				<td> <?php echo $row['name']; ?> </td>
		 				<td> <?php echo $row['username']; ?> </td>
		 				<td> <?php echo $row['password']; ?> </td>
		 				<td> <?php echo $row['password']; ?> </td>
		 				<td><a class="btn btn-success" href="index.php?opcija=index2&edit=<?php  echo $row['id']; ?>"> edit <span class="fas fa-user-edit"></span> </a></td>
		 				<td><a class="btn btn-danger"href="index.php?opcija=index2&delete=<?php echo $row['id']; ?>"> delete <span class="fas fa-trash"></span> </a></td>
		 			</tr>
		 		<?php endwhile; ?>
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
</body>
</html>