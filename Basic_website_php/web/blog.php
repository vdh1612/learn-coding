<?php 
    session_start();
    include('database.php');
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Blog management</title>
</head>
<body>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a class="active">Blog</a>
        <?php if($_SESSION['user'] === 'admin'){
            echo "<a href='users.php'>Users</a>"; 
        } 
        ?>
        <div class="search-container">
            <form action="blogs/search_blog.php" method="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search">search</i></button>
            </form>
        </div>
    </div>
    <div>
        <h2>Your blogs</h2>
        <?php
            
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT id,title,content,created_at FROM blogs where user_id = $user_id";
            $query = $conn->query($sql);
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    echo"<h3>Title:".$row['title']."</h3>";
                    echo "<p>Content:".$row['content']."</p>";
                    echo "<a href='blogs/edit_blog.php?blog_id={$row['id']}'>Edit</a>";
                    echo "||";
                    echo "<a href='blogs/delete_blog.php?blog_id={$row['id']}'>Delete</a>";
                    echo"<hr>";
                }
            }else {
                echo"You haven't had any blogs yet.";
            }

        ?>
    </div>
    <div>
        <a href="blogs/add_blog.php">Add new blog here</a>
    </div>

</body>
</html>