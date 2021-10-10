<?php

	include "connect.php";

	error_reporting(E_ERROR);

	$stmt = $connect->prepare("SELECT * FROM students");
	$stmt->execute();
	$rows = $stmt->fetchAll();

	// create table students for fetching data
	$students = [];

	if($rows){

		$cpt = 0;

		foreach($rows as $row){

			$students[$cpt]["s_id"] 	  = $row["s_id"];
			$students[$cpt]["first_name"] = $row["first_name"];
			$students[$cpt]["last_name"]  = $row["last_name"];
			$students[$cpt]["email"] 	  = $row["email"];

			$cpt++;
		}

		// fetch the data to json for get it an another side
		echo json_encode($students);

	} else {

		http_response_code(404);

	}

?>