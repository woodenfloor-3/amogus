<?php
include "partials/_connect.php"; // Using database connection file here

// Check if the user is logged in and is an admin
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: adminloginpage.php");
    exit;
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=mysqli_query($conn,"DELETE FROM users WHERE user_id='$id'");
    header('location:admin.php');
}
?>
