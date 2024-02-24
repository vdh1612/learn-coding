<?php 
    session_start();
    include('../database.php');
    if(!isset($_SESSION['user'])){
        header('Location:../login.php');
        exit();
    }
    if(!isset($_GET['blog_id'])){
        header('Location:../blog.php');
        exit();
    }
    $blog_id = $_GET['blog_id']; 
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT id, title, content FROM blogs where id = $blog_id AND user_id = $user_id";
    $result = $conn->query($sql);
    $blog = $result->fetch_assoc();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $new_title = $_POST['new_title'];
        $new_content = $_POST['new_content'];

        $update_sql = "UPDATE blogs SET title = '$new_title', content = '$new_content' WHERE id = $blog_id AND user_id = $user_id";
        if($conn->query($update_sql) === true){
            header('location:../blog.php');
        }else{
            echo"failed update the blog".$conn->error;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit blog</title>
</head>
<body>
    <form action="edit_blog.php?blog_id=<?php echo $blog_id;?>" method="POST">
        <label for="new_title">New Title:</label>
        <input type="text" name="new_title" id="new_title" value="<?php echo $blog['title']; ?>"><br>
        <label for="new_content">New Content:</label><br>
        <textarea name="new_content" id="new_content" cols="30" rows="10"><?php echo $blog['content']; ?></textarea><br>
        <input type="submit" name="submit" value="Update Blog Post">
    </form>
    <p><a href="../blog.php">Back to blog page </a></p>
</body>
</html>