<?php
include "partials/_connect.php"; // Using database connection file here

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $thread_id = $_GET["id"];

    // Delete thread from threads table
    $sql = "DELETE FROM threads WHERE thread_id=$thread_id";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success mt-3'>Thread deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
