<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin'){
        header('Location:login.php');
        exit();
    }

    include('../database.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];
        $sql = "SELECT username FROM users WHERE username = '$new_username'";
        $query = $conn->query($sql);
        if($query->num_rows > 0){
            echo 'This username is already registered<br>';
            echo '<a href="../users.php">Try again !</a>';
            exit();
        }else {
            $sql = "INSERT INTO users (username, password) VALUES ('$new_username', '$new_password')";
            
            if ($conn->query($sql) === TRUE) {
                echo 'User added successfully!';
            } else {
                echo 'Error adding user: ' . $conn->error;
            }
        }
    }
    $conn->close();
?>
