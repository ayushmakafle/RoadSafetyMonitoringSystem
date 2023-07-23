<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, perform logout
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    // Redirect the user to the login page or any other desired page
    header("Location: admin_login.php");
    exit;
} else {
    // If the user is not logged in, you can redirect them to the login page directly
    header("Location: admin_login.php");
    exit ;
}
?>
