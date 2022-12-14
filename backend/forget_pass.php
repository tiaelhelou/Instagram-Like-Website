<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include("connect.php");

if (isset($_POST['username']) && isset($_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = $mysqli->prepare("SELECT id FROM users WHERE username = ? ");
    $query->bind_param("s", $username);
    $query->execute();

    $result = $query->get_result();
    $id = $result->fetch_assoc();

    $query = $mysqli->prepare("UPDATE users SET password = ? WHERE id = ?;");
    $query->bind_param("si", $password, $id);
    $query->execute();

    $response["success"] = true;
    echo json_encode($response);
    header("Location:../Instagram-Like-Website/frontend/login/login.html");

}
else
{
    $response["success"] = false;
    echo json_encode($response);

}

?>