<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "rentacar");
    // Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Attempt select query execution
    $sql = "SELECT * FROM users where username ='$username'";
    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row["password"];
        $role = $row["role"];
        $user_id = $row["user_id"];

        if (password_verify($password, $hashedPassword)) {
            // Password matches, login successful
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
            if ($role == 'staff') {
                header("Location: ../admin.php");
                die();
            }
            else {
                header("Location: ../user.php");
                die();
            }
            
        } else {
            // Invalid password
            echo "Invalid password!";
        }
    }
}

?>




