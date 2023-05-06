<?php

// session_start();
// $username = $_SESSION["username"];

$link = mysqli_connect("localhost", "root", "", "rentacar");
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$user_id = $_SESSION['user_id'];
$sql = "SELECT users.username, vehicles.brand, vehicles.model, bookings.booking_id, bookings.start_date, bookings.end_date, bookings.total_price FROM bookings INNER JOIN users on bookings.user_id=users.user_id INNER JOIN vehicles on bookings.vehicle_id=vehicles.vehicle_id";
if($result = mysqli_query($link, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        $resultArray = array(); //an additional array where we store all rows so we can pass it to the javascript
        echo "<table>";
        echo "<tr><th>User</th><th>Car</th><th>Start Date</th><th>End Date</th><th>Total Price</th><th style='text-align: center;'>#</th></tr>";
        while($row = mysqli_fetch_array($result)) {
            $resultArray[] = $row;
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['brand'] . ' ' . $row['model'] . "</td>";
            echo "<td>" . $row['start_date'] . "</td>";
            echo "<td>" . $row['end_date'] . "</td>";
            echo "<td>" . $row['total_price'] . "</td>";
            echo "<td><button onclick='showEditDialogForBookings(\"" . $row['booking_id'] . "\")'>Edit</button><button onclick='showDeleteDialogForBookings(\"" . $row['booking_id'] . "\")'>delete</button></td>";
            echo "</tr>";
        }
        $jsonResult = json_encode($resultArray); //converting the array to json format
        echo "<script>var manageBookingData = " . $jsonResult . ";</script>"; //storing that array in json format in a javascript variable
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