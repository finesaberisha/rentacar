<?php
// connecting to our database
$link = mysqli_connect("localhost", "root", "", "rentacar");
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// storing our user_id for further use
$user_id = $_SESSION['user_id'];

// Attempt select query execution
$sql = "SELECT users.username, vehicles.brand, vehicles.model, bookings.start_date, bookings.end_date, bookings.total_price FROM bookings INNER JOIN users on bookings.user_id=users.user_id INNER JOIN vehicles on bookings.vehicle_id=vehicles.vehicle_id where bookings.user_id=$user_id";
if($result = mysqli_query($link, $sql)) {
    // if the number of rows is bigger than 0 it means there is data se we continue with what we want to do with that data
    if(mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>User</th><th>Car</th><th>Start Date</th><th>End Date</th><th>Total Price</th></tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['brand'] . ' ' . $row['model'] . "</td>";
            echo "<td>" . $row['start_date'] . "</td>";
            echo "<td>" . $row['end_date'] . "</td>";
            echo "<td>" . $row['total_price'] . "</td>";
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