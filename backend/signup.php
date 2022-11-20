<?php

include('connect.php');


$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = $mysqli->prepare("INSERT INTO users(name, email, username, password) VALUES (?, ?, ?)");
$query->bind_param("ssss", $name, $email, $username, $password);
$query->execute();

$response = [];
$response["success"] = true;
echo json_encode($response);


?>