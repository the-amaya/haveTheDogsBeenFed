<?php

$servername = "localhost";
$username = "dogs";
$password = "dogs";
$dbname = "dogs";

if (isset($_POST['id'])){
	$id = $_POST['id'];
} else {
	header("Location: index.php");
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO dogs (id) VALUES ('" . $id . "')";
if ($conn->query($sql) === TRUE) {
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>