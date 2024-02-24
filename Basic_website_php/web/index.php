<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="topnav">
        <a class="active">Home</a>
        <a href="blog.php">Blog</a>
        <?php if($_SESSION['user'] === 'admin'){
                echo "<a href='users.php'>Users</a>"; 
            } 
        ?>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search">search</i></button>
            </form>
        </div>
    </div>
    <h2>Welcome back, <?= $_SESSION['user'];?></h2>

    <p>
        <a href="logout.php">Log out</a>
    </p>
</body>
</html>