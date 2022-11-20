<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include('connect.php');

$response = [];

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $mysqli->prepare("INSERT INTO users(name, email, username, password) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $name, $email, $username, $password);
    $query->execute();

    $response["success"] = true;
    echo json_encode($response);
    header("Location:../Instagram-Like-Website/frontend/login/login.html");

} else {

    $response["success"] = false;
    echo json_encode($response);

}

?>