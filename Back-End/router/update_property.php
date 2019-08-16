<?php

$conn = new mysqli('localhost', 'root', '', 'propertyconsultancy_db');

if ($conn->connect_error) {
	die('Not Connect to database');
} else {

	parse_str(file_get_contents("php://input"), $data);

	$property_name = $data["property_name"];
	$unit_name = $data["unit_name"];
	$type = $data["type"];
	$floor_area = $data["floor_area"];
	$availability = $data["availability"];
	$price = $data["price"];
	$arrangement = $data["arrangement"];
	$address = $data["address"];
	$b_room = $data["b_room"];
	$c_room = $data["c_room"];
	$p_space = $data["p_space"];
	$image_src = $data["image_src"];
	$id = $data["id"];

		$stmt = $conn->prepare('
			UPDATE property set
				property_name = ?,
				unit_name = ?,
				type = ?,
				floor_area = ?,
				availability = ?,
				price = ?,
				arrangement = ?,
				address = ?,
				b_room = ?,
				c_room = ?,
				p_space = ?,
				image_src = ?
			WHERE property_id = ?
		');

		$stmt->bind_param('ssssssssssssi', $property_name, $unit_name, $type, $floor_area, $availability, $price, $arrangement, $address, $b_room, $c_room, $p_space, $image_src, $id);
		$stmt->execute();
		$conn->close();

		$rows = $stmt->affected_rows;

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		http_response_code(200);
		echo json_encode($rows);
	
}