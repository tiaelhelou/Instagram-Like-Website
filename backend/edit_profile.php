<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include('connect.php');

session_start();

$response = [];

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

    $id = $_SESSION['id'];
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
    header("Location:../Instagram-Like-Website/frontend/homepage/home.html");

} else {

    $response["success"] = false;
    echo json_encode($response);

}

?>