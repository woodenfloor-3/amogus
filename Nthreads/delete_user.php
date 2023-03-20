<?php
include "partials/_connect.php"; // Using database connection file here

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: adminloginpage.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Delete user from users table
    $sql = "DELETE FROM users WHERE srn=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: manage_user.php"); // Redirect to the manage user page after successful deletion
        exit;
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
    }
}

?>
