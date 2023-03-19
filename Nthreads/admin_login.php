<?php

include "partials/_connect.php"; // Using database connection file here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the user's input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to see if the user's credentials are valid
    $query = "SELECT * FROM users WHERE user_email='$username' AND user_password='$password' AND is_admin=1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // If the user's credentials are valid, set a session variable to indicate that the user is logged in
        session_start();
        $_SESSION['is_logged_in'] = true;

        // Set another session variable to indicate that the user is an admin
        $_SESSION['is_admin'] = true;
        $_SESSION['username'] = $username;

        header("Location: admin.php");
        exit;
    } else {
        // If the user's credentials are not valid, display an error message
        echo "Invalid username or password.";
    }

}

?>
