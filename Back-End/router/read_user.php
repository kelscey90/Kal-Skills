<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connected to database');
} else {
	$stmt = $conn->query("
		SELECT
			u.users_id,
			CONCAT_WS(' ', u.f_name, u.l_name) as fullname,
			u.gender,
			u.email,
			p.title
		from users as u 
		inner join position as p 
			on p.position_id = u.position_id ORDER BY u.updated_at DESC
	");

	$userList = array();

	while($row = $stmt->fetch_assoc()) {
		$userList[] = $row;
	}

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	http_response_code(200);
	echo json_encode($userList);
}