<?php

	require "connect.php";

	$s_id = $_GET["s_id"];

	$stmt = $connect->prepare("SELECT * FROM students WHERE s_id = ? LIMIT 1");

	$stmt->execute(array($s_id));

	$row = $stmt->fetch();

	echo json_encode($row);

	exit;
?>