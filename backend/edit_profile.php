<?php

include('connect.php');

$response = [];

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$bio = $_POST['bio'];


$query = $mysqli->prepare("UPDATE users SET name = ?, email = ?, username = ?, password = ?, bio = ? WHERE id = ?;");
$query->bind_param("sssssi", $name, $email, $username, $password, $bio, $id);
$query->execute();

$response["success"] = true;
echo json_encode($response);

?>