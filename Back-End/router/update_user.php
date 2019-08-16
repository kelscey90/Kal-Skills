<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connect to database');
} else {

	parse_str(file_get_contents("php://input"), $data);

	$f_name = $data["f_name"];
	$l_name = $data["l_name"];
	$gender = $data["gender"];
	$email = $data["email"];
	$username = $data["username"];
	$password = $data["password"];
	$birthdate = $data["birthdate"];
	$contact_number = $data["contact_number"];
	$phone_number = $data["phone_number"];
	$address = $data["address"];
	$position_id = $data["position_id"];
	$id = $data["id"];

		$stmt = $conn->prepare('
			UPDATE users set
				f_name = ?,
				l_name = ?,
				gender = ?,
				email = ?,
				username = ?,
				password = ?,
				birthdate = ?,
				contact_number = ?,
				phone_number = ?,
				address = ?,
				position_id = ?
			WHERE users_id = ?
		');

		$stmt->bind_param('ssssssssssii', $f_name, $l_name, $gender, $email, $username, $password, $birthdate, $contact_number, $phone_number, $address, $position_id, $id);
		$stmt->execute();
		$conn->close();

		$rows = $stmt->affected_rows;

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		http_response_code(200);
		echo json_encode($rows);
	
}