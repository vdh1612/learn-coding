<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_blog.php" method='POST'>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"><br>
        <label for="content">Content:</label><br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        session_start();
        include('../database.php');
        $add_failed = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT title FROM blogs WHERE title = '$title'";
            $query = $conn->query($sql);
            if($query->num_rows > 0){
                $add_failed = true;
            }else{
                $sql = "INSERT INTO blogs (user_id, title, content) VALUES ('$user_id', '$title', '$content')";   
                if ($conn->query($sql) === TRUE){
                    header('Location:../blog.php');
                }else{
                    echo 'Error: ' . $conn->error;
                    $register_failed = true;
                }
            }
        }
        $conn->close();
    ?>
    <?php 
        if ($add_failed === TRUE){
            echo 'this blog already exists'; 
        }
    ?>
</body>
</html>
