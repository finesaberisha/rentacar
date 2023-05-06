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
    
        <input type="hidden" name="booking_id" value="0" required>

        <label for="start_date">Pick-up Date:</label>
        <input type="date" name="start_date" required>

        <label for="end_date">Return Date:</label>
        <input type="date" name="end_date" required>

        <label for="price">Total Price:</label>
        <input type="number" step="any" name="price" required>

        <input type="submit" value="Submit">
    </form>


    <?php
    if (isset($_POST["start_date"]) && isset($_POST["end_date"]) && isset($_POST["price"])) {
        $id=$_POST["booking_id"];
        $start_date=$_POST["start_date"];
        $end_date=$_POST["end_date"];
        $price = $_POST["price"];

        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "", "rentacar");
        // Check connection
        if($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        if (move_uploaded_file($image['tmp_name'], $targetDir . $filename)) {
            // Image uploaded successfully, save the URL in the database
            $imageUrl = $targetDir . $filename;
        }


        $sql = "Update bookings set start_date='$start_date', end_date='$end_date', total_price=$price where booking_id=$id";

        
        if(mysqli_query($link, $sql)) {
            echo "<meta http-equiv='refresh' content='0'>";
         //   echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }
    ?>

</body>
</html>