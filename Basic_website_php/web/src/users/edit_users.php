<?php
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
        header('location:../login.php');
    }
    include('../database.php');
    $user_id = $_GET['user_id'];
    $sql = "SELECT id, username, password FROM users where id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found";
        header('location:../users.php');
    }
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
</head>
<body>
    <form action="edit_users.php?user_id=<?php echo $user_id; ?>" method="POST">
        <label for="edited_username">Username:</label>
        <input type="text" name="edited_username" value="<?php echo $user['username']; ?>" required><br>

        <label for="edited_password">Password:</label>
        <input type="text" name="edited_password" value="<?php echo $user['password']; ?>" required><br>

        <input type="submit" value="Update User">
    </form>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $edited_username = $_POST['edited_username'];
            $edited_password = $_POST['edited_password'];
            $update_sql = "UPDATE users SET username = '$edited_username', password = '$edited_password' WHERE id = $user_id";
            if ($conn->query($update_sql) === true) {
                echo "User updated successfully";
                echo "<a href='../users.php'> Go back</a>";
            } else {
                echo "Error updating user: " . $conn->error;
            }
        }
        $conn->close();
    ?>
</body>
</html>
