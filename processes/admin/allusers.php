<?php

// connecting to our database
$link = mysqli_connect("localhost", "root", "", "rentacar");
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = "SELECT * from users";
if($result = mysqli_query($link, $sql)) {
// if the number of rows is bigger than 0 it means there is data se we continue with what we want to do with that data
    if(mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>User_id</th><th>Username</th><th>Email</th><th>Role</th><th style='text-align: center;'>#</th></tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><button style='color: red;' onclick='showDeleteDialogForUsers(\"" . $row['user_id'] . "\")'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>