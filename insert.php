<?php

	include "connect.php";

	error_reporting(E_ERROR);

	$postdata = file_get_contents("php://input");

	if(isset($postdata) && !empty($postdata)){

		$request = json_decode($postdata);

		// get data from file
		$firstname = $request->firstName;
		$lastname  = $request->lastName;
		$email 	   = $request->email;

		// insert data to database 
		$stmt = $connect->prepare("INSERT INTO 
											students(first_name, last_name, email) 
										VALUES(
											:zfirst_name,
											:zlast_name,
											:zemail)");
		$stmt->execute(array(
			"zfirst_name" => $firstname,
			"zlast_name"  => $lastname,
			"zemail" 	  => $email
		));

		$rowCount = $stmt->rowCount();

		if($rowCount > 0){

			http_response_code(201);

		} else {
		
			http_response_code(427);

		}
		
	}


?>