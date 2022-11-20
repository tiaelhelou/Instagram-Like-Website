<?php
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

}
else
{
    $response["success"] = false;
    echo json_encode($response);

}

?>