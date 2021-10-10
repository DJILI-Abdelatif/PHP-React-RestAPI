<?php

	require "connect.php";

	$s_id = $_GET["s_id"];

	$stmt = $connect->prepare("DELETE FROM students WHERE s_id = :zs_id LIMIT 1");
	
	$stmt->bindParam(":zs_id", $s_id);
	
	$stmt->execute();
	
	$rowCount = $stmt->rowCount();

	if($rowCount >0){

		http_response_code(204);
	} else {

		http_response_code(422);
	}

?>