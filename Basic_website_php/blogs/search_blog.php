<?php
session_start();
include('../database.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM blogs WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            echo "<h3>Title: " . $row['title'] . "</h3>";
            echo "<p>Content: " . $row['content'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Please enter a search keyword.";
}
?>
