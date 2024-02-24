<?php 
    session_start();
    include("../database.php");
    if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
        header('location:../login.php');
    }
    if (isset($_GET['user_id'])){
        $user_id = $_GET['user_id']; 
        $validate_sql = "SELECT id from users where id = $user_id";
        $validate_query = $conn->query($validate_sql);

        if($validate_query->num_rows > 0){
            $delete_sql = "DELETE FROM users WHERE id = $user_id";
            if ($conn->query($delete_sql) == TRUE){
                header('location:../users.php');
                exit();
            }
        }else{
            echo"Invalid user id ! The id does not exist";
        }
    }
    $conn->close();

?>