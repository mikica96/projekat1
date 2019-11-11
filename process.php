<?php 
	
if (isset($_SESSION["id"])) {
	

	$mysqli = new mysqli ('localhost', 'root', '', 'logreg') or die(mysqli_error($mysqli));
		
		$id=0;
		$name='';
		$username='';
		$password='';
		$repassword='';
        $result='';
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM korisnici WHERE id=$id ") or die($mysqli->error());
		}
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
	 	$result=$mysqli->query("SELECT * FROM korisnici WHERE id=$id ") or die($mysqli->error());
	 	$broj=mysqli_num_rows($result);
		if($broj == 1 ){
			$row=$result->fetch_array();
			$name= $row['name'];
			$username= $row['username'];
			$password= $row['password'];
			$repassword= $row['password'];
			
		}
	}

	if (isset($_POST['update'])) {
		$id= $_POST['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

	if ($_POST['password']==$_POST['repassword']) {
		$mysqli->query("UPDATE korisnici SET name='$name', username='$username', password='$password' WHERE id=$id") or 
		die($mysqli->error());
		
		}else{
			
 	}
 		header('location: index.php?opcija=index2');
	}
}else{
	echo "nemate pravo da pristupite stranici";
}
 ?>

