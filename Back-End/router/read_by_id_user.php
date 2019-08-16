<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connected to database');
} else {
	$stmt = $conn->prepare("
		SELECT
			*
		from users 
		where users_id = ?
	");

	$stmt->bind_param('i', $_GET["users_id"]);
	$stmt->execute();
	$queryRes = $stmt->get_result();

	$data = array();
		
		foreach($queryRes as $value) {
			$data = $value;
		}

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	http_response_code(200);
	echo json_encode($data);
}