<?php
// Database connection settings
$host = "localhost"; // Change this if your database is hosted elsewhere
$dbUsername = "root";
$dbPassword = "";
$dbName = "rentacar";

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Sanitize user input to prevent SQL injection
    
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', 'customer')";
    if ($conn->query($query) === TRUE) {
        echo "User created successfully!";
    } else {
        echo "Error creating user: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>