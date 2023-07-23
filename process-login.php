<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform validation
    if (empty($username) || empty($password)) {
        echo "Error: Please enter both username and password";
        exit;
    }

    // Connect to the database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "road safety monitoring system";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE Username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["Password"];

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "<script> alert('Login successful!');</script>";
            // Redirect the user to the index page
            header("Location: index.html");
            exit;
        }  else {
            echo "<script> alert('Error: Incorrect password'); </script>";
        }
        
    } else {
        echo "Error: User not found";
    }

    $conn->close();
}
?>
