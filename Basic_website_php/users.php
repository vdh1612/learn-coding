<?php 
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin'){
        header('Location:login.php');
        exit();
    }

    include('database.php');
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
        <a href="index.php">Home</a>
        <a href="blog.php">Blog</a>
        <a class="active">Users</a>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search">search</i></button>
            </form>
        </div>
    </div>
    <?php
        $sql = "SELECT id,username,password FROM users";
        $result = $conn->query($sql);
     
        if($result->num_rows > 0){
            echo "<h2> User Accounts</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Edit user</th><th>Delete user</th></tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['password']}</td>";
                echo "<td><a href='users/edit_users.php?user_id={$row['id']}'>Edit</a></td>";
                echo "<td><a href='users/remove_users.php?user_id={$row['id']}'>Delete</a></td>";
                echo "</tr>";
            }
            echo"</table>";
        }else{
            echo'No user found';
        }
        $conn->close();
    ?>
    <div>
        <h2>Add New User</h2>
        <form action="users/add_users.php" method="post">
            <label for="new_username">Username:</label>
            <input type="text" name="new_username" required><br>
            
            <label for="new_password">Password:</label>
            <input type="password" name="new_password" required><br>
            
            <input type="submit" value="Add User">
        </form>
    </div>
</body>
</html>