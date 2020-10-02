<?php

$servername = "localhost";
$username = "dogs";
$password = "dogs";
$dbname = "dogs";

$rooms = ['1', '2', '3'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$jsonarray = [];
foreach ($rooms as $room) {
	$sql = "SELECT id,time FROM dogs WHERE `id`='" . $room . "' ORDER BY `key` DESC LIMIT 1;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$time = $row["time"];
	$id = $row["id"];
	$sarray = [$id, $time];
	array_push($jsonarray, $sarray);
	}


//print_r($jsonarray);
print json_encode($jsonarray);

?>