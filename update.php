<?php

	require "connect.php";

	$request = file_get_contents("php://input");

	if(isset($request) && !empty($request)){

		$row = json_decode($request);

		$s_id = $_GET["s_id"];
		$firstname = $row->first_name;
		$lastname = $row->last_name;
		$email = $row->email;
	
		$stmt = $connect->prepare("UPDATE 
										students
									set 
										first_name = ?,
										last_name = ?,
										email = ?
									WHERE 
										s_id = ?");
		$stmt->execute(array($firstname, $lastname, $email, $s_id));

		$rowCount = $stmt->rowcount();

		if($rowCount > 0){
			return http_response_code(204);
		} else {
			return http_response_code(422);
		}

	}

?>