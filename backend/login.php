<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include("connect.php");
session_start();

$response = [];

if(isset($_POST['username']) && isset($_POST["password"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $mysqli -> prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $query -> bind_param ("ss", $username, $password); 
    $query -> execute();

    $result = $query -> get_result();
    $id = $result->fetch_assoc();
    
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['id'] = $id;

        $response[] = $id;
        echo json_encode($response);
        header("Location:../Instagram-Like-Website/frontend/homepage/home.html");
    }
    else
    {
        $response["success"] = false;
        echo json_encode($response);

    }
}
else
{
    $response["success"] = false;
    echo json_encode($response);

}

?>