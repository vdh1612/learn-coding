<?php
    $register_failed = false;
    include('database.php');
    if (isset($_SESSION['user'])){
        header('Location: login.php');
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT username FROM users WHERE username = '$username'";
        $query = $conn->query($sql);
        if ($query->num_rows > 0){
            $register_failed = true;
        }else {
            $sql = "INSERT into users(username,password) VALUES('$username','$password')";
            if ($conn->query($sql) === TRUE){
                echo 'User registered successfully !'.'<br>';
                header('Location: login.php');
            }else{
                echo 'Error: ' . $conn->error;
                $register_failed = true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_register.css">
    <title>Login</title>
</head>
<body>
    
    <?php
     if ($register_failed === true) {
        echo 'This username is already registered<br>';
        echo '<a href="register.php">Try again !</a>';
        exit();
    }
    if(isset($_SESSION['user'])) {
        echo "<p>You are already logged in as {$_SESSION['user']}.</p>";
        echo "<p><a href='logout.php'>Logout</a></p>";
    } 
    ?>
    <form action="register.php" method="post">
        <input type="text" id="username" name="username" placeholder="username" required><br>
        
        <input type="password" id="password" name="password" placeholder="password" required><br>
        
        <input type="submit" value="Sign up">
        <p> already have an account <a href="login.php">Login</a></p>
    </form>

</body>
</html>
