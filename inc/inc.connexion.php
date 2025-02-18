<?php 

	$db_host = "localhost";
	$db_name = "";
	$db_user = "";
	$db_pwd  = "";


	try {
		$pdo = new PDO('mysql:host='.$db_host.';charset=utf8;dbname='.$db_name.'',$db_user,$db_pwd);
	} 
	catch (Exception $e) {
		error_log($e->getMessage());
		exit($e->getMessage());
	}