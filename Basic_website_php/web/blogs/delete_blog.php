<?php
    session_start();
    include('../database.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }

    if (isset($_GET['blog_id'])) {
        $blog_id = $_GET['blog_id'];
        $user_id = $_SESSION['user_id'];
        $validate_sql = "SELECT id FROM blogs WHERE id = $blog_id AND user_id = $user_id";
        $validate_query = $conn->query($validate_sql);

        if ($validate_query->num_rows > 0) {
            $delete_sql = "DELETE FROM blogs WHERE id = $blog_id AND user_id = $user_id";

            if ($conn->query($delete_sql) === TRUE) {
                header('Location: ../blog.php');
                exit();
            }
        } else {
            echo "Invalid blog ID or you don't have permission to delete this blog.";
        }
    } else {
        echo "Invalid blog ID.";
    }
    $conn->close();
?>
