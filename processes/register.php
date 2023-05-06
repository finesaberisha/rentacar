<?php
// Database connection configs
$host = "localhost"; 
$dbUsername = "root";
$dbPassword = "";
$dbName = "rentacar";

// Creating a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Checking if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['username']) && isset($_POST['password'])) {

    // using real_escape_string to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    // Hashing the password with the PHP built-in function
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserting the user into our database
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', 'customer')";

    // if the query is excecuted successfully redirect to login
    if ($conn->query($query) === TRUE) {
        header("Location: ../register.php");
        die();
    } 
    // if not then print the message
    else {
        echo "Error creating user: " . $conn->error;
    }

    // closing the connection 
    $conn->close();
}
?>