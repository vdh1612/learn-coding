<?php 
    session_start();
    $login_failed = false;
    include('database.php');
    if (isset($_POST['username']) && isset($_POST['password'])){
        $post_username = $_POST['username'];
        $post_password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$post_username' AND password = '$post_password'";
        $query = $conn->query($sql);
        $user = $query->fetch_assoc();
        if ($user === NULL){
            $login_failed = true;
        }
        $username = $user['username'];
        $password = $user['password'];
        $user_id = $user['id'];
        // ramdom_username' UNION SELECT '1', 'admin', '123' FROM users WHERE username = 'admin'# payload created by thinh 
        if ($password === $post_password){
            $_SESSION['user'] = $username;
            $_SESSION['user_id'] = $user_id;
            header('Location:index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <h2>Login</h2>
    <?php 
    if ($login_failed) {
        echo "Login failed. Try again." . '<br>';
        echo '<a href="login.php">Try again !</a>';
    }
    ?>
    <?php if (!$login_failed) : ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Login">
        
    </form>
    <p>Don't have an account?
        <a href="register.php">sign up</a>
    </p>
    <?php endif; ?>
</body>
</html>
