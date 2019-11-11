<?php 
	//fajl za povezivanje sa mysql
	
	try{
		$konektor = new PDO ('mysql: host=127.0.0.1; dbname=logreg', 'root', '');
		$konektor -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		$e -> getMessage;
		die();
	}
?>