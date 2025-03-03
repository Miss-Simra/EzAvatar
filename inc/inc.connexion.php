<?php 

	$db_host = "localhost:3306";
	$db_name = "bdd";
	$db_user = "root";
	$db_pwd  = "";

	try {
		$pdo = new PDO('mysql:host='.$db_host.';charset=utf8;dbname='.$db_name.'',$db_user,$db_pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (Exception $e) {
		error_log($e->getMessage());
		exit('Une erreur est survenue !!');
	}
?>