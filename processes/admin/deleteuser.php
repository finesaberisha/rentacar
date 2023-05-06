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
    <form id="formDeleteUser" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="UseridToDelete" value="">

        <p>This will also delete this User's bookings. Are you sure you want to delete this user?</p>
        <input type="submit" value="Yes">
        <small>`Esc` to exit</small>
    </form>

    <?php
    // only going through if UseridToDelete is submitted
    if(isset($_POST["UseridToDelete"])){
        $id=$_POST["UseridToDelete"];

        // connecting to our database
        $link = mysqli_connect("localhost", "root", "", "rentacar");

        // Check connection
        if($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Delete bookings associated with the user, because this user_id is a foreign key in bookings table, 
        // so we delete bookings associated with this user to not cause potential problems
        $sql = "DELETE FROM bookings WHERE user_id=$id";
        mysqli_query($link, $sql);

        // Delete the user record
        $sql = "DELETE FROM users where user_id=$id";

        if(mysqli_query($link, $sql)) {
            // if executed successfully refresh
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }
    
    ?>
</body>
</html>