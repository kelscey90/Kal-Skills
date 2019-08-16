<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connected to Database');
} else {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$gender = $_POST["gender"];
	$birthdate = $_POST["birthdate"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$contact_number = $_POST["contact_number"];
	$phone_number = $_POST["phone_number"];
	$address = $_POST["address"];
	$position_id = $_POST["position_id"];

		$stmt = $conn->prepare("
			INSERT INTO users
			(
				f_name,
				l_name,
				gender,
				birthdate,
				email,
				username,
				password,
				contact_number,
				phone_number,
				address,
				position_id
			)
			values
			(
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?
			);
		");

		$stmt->bind_param('ssssssssssi', $f_name, $l_name, $gender, $birthdate, $email, $username, $password, $contact_number, $phone_number, $address, $position_id);
		$stmt->execute();
		//$insertId = $stmt->insert_id;

		$conn->close();
		//$record = readByID($insertId);

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		http_response_code(200);
		echo json_encode(array());
	
}