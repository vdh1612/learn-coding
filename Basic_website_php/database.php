<?php 
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "password";
    $db_name = "users_db";
    $conn = "";

    try {
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "Error connecting: " . $e->getMessage();
        exit;
    }
?>
