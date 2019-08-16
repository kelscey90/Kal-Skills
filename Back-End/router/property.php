<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connected to Database');
} else {

	$property_name = $_POST["property_name"];
	$unit_name = $_POST["unit_name"];
	$type = $_POST["type"];
	$floor_area = $_POST["floor_area"];
	$availability = $_POST["availability"];
	$price = $_POST["price"];
	$arrangement = $_POST["arrangement"];
	$address = $_POST["address"];
	$b_room = $_POST["b_room"];
	$c_room = $_POST["c_room"];
	$p_space = $_POST["p_space"];
	$image_src = $_POST["image_src"];

		$stmt = $conn->prepare("
			INSERT INTO property
			(
				property_name,
				unit_name,
				type,
				floor_area,
				availability,
				price,
				arrangement,
				address,
				b_room,
				c_room,
				p_space,
				image_src
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
				?,
				?
			);
		");

		$stmt->bind_param('ssssssssssss', $property_name, $unit_name, $type, $floor_area, $availability, $price, $arrangement, $address, $b_room, $c_room, $p_space, $image_src);
		$stmt->execute();
		//$insertId = $stmt->insert_id;

		$conn->close();
		//$record = readByID($insertId);

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		http_response_code(200);
		echo json_encode(array());
	
}