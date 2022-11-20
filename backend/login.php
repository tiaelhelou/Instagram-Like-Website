<?php

include("connect.php");

if(isset($_POST['username']) && isset($_POST["password"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $mysqli -> prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $query -> bind_param ("ss", $username, $password); 
    $query -> execute();

    $response = [];

    $result = $query -> get_result();
    $id = $result->fetch_assoc();
    $response[] = $id;
    
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['username'] = $username;

        echo json_encode($response);
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