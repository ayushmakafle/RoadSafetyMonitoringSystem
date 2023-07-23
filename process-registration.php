<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $formUsername = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Perform validation
    if (empty($formUsername) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "Error: Please fill in all the fields";
        exit;
    }
    
    if (strlen($formUsername) < 6 || strlen($password) < 8) {
        echo "Error: Username must be at least 6 characters long and password must be at least 8 characters long";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format";
        exit;
    }
    
    if (!preg_match("/^[a-zA-Z0-9]+$/", $formUsername)) {
        echo "Error: Username can only contain letters and numbers";
        exit;
    }

    // Check if the passwords match
    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "road safety monitoring system";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (Username, Password, Email) VALUES ('$formUsername', '$hashedPassword' ,'$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
