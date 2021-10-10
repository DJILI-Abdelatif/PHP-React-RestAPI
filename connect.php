<?php

    // You shoud create the right syntax to detect database => [hhhhhhhhhhhhhhhhhh]
	$dsn = "mysql:host=localhost; dbname=reactproject";
	$user = "root";
	$pass = "";
	$options = array(

		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	);

	try{

		$connect = new PDO($dsn, $user, $pass, $options);

		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// echo "you are connected";
	}
	catch(PDOException $e){

		echo "Faild To Connect: " . $e->getMessage();
	}

?>