<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connect to database');
} else {

	parse_str(file_get_contents("php://input"), $data);

	$id = $data["id"];
	$ids = implode(", ",$id);

		$stmt = $conn->prepare("
			DELETE from property where property_id IN (".$ids.")
		");
		$stmt->execute();
		$conn->close();

		$rows = $stmt->affected_rows;

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		http_response_code(200);
		echo json_encode($rows);
	
}