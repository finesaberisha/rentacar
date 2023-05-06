<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 600px;
            margin: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form id="formAdd" method="POST" action="" enctype="multipart/form-data">

        <input type="hidden" name="vehicle_id">
        <label for="start_date">Selected Pick-up Date:</label>
        <input type="date" name="start_date" >

        <label for="end_date">Selected Return Date:</label>
        <input type="date" name="end_date" >

        <label for="price">Total Price:</label>
        <input type="decimal" name="price">


        <input type="submit" value="Submit">
    </form>


    <?php
    // if not logged in, redirect to register.php to login or sign up
    if(!isset($_SESSION['username'])) {
        header("Location: ./register.php");
        die();
    }
    // only go further if vehicle_id, start_date and end_date are filled
    if (isset($_POST["vehicle_id"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $vehicle_id = $_POST["vehicle_id"];
        $start_date=$_POST["start_date"];
        $end_date=$_POST["end_date"];
        $price = $_POST["price"];

        // connecting to our database   
        $link = mysqli_connect("localhost", "root", "", "rentacar");
        // Check connection
        if($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $user_id = $_SESSION["user_id"];

        // send the booking to the database for user that is logged in
        $sql = "INSERT INTO bookings(user_id, vehicle_id, start_date, end_date, total_price) VALUES($user_id, $vehicle_id, '$start_date', '$end_date', $price)";

        if(mysqli_query($link, $sql)) {
         //  if query is excecuted successfully send to user panel
            echo "<script>window.location.href = './user.php';</script>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }
    ?>

</body>
</html>