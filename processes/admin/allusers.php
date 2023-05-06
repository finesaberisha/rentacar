<?php

// session_start();
// $username = $_SESSION["username"];

$link = mysqli_connect("localhost", "root", "", "rentacar");
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = "SELECT * from users";
if($result = mysqli_query($link, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        $resultArray = array(); //an additional array where we store all rows so we can pass it to the javascript
        echo "<table>";
        echo "<tr><th>User_id</th><th>Username</th><th>Email</th><th>Role</th><th style='text-align: center;'>#</th></tr>";
        while($row = mysqli_fetch_array($result)) {
            $resultArray[] = $row;
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><button onclick='showDeleteDialogForUsers(\"" . $row['booking_id'] . "\")'>delete</button></td>";
            echo "</tr>";
        }
        $jsonResult = json_encode($resultArray); //converting the array to json format
        echo "<script>var manageUsersResult = " . $jsonResult . ";</script>"; //storing that array in json format in a javascript variable
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