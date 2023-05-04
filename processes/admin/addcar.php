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
    
        <input type="hidden" name="id" value="0" required>

        <label for="type">Type:</label>
        <input type="text" name="type" required>

        <label for="brand">Brand:</label>
        <input type="text" name="brand" required>

        <label for="model">Model:</label>
        <input type="text" name="model" required>

        <label for="year">Year:</label>
        <input type="number" name="year" required>

        <label for="price">Price per day:</label>
        <input type="number" step="any" name="price" required>

        <label for="image">Image:</label>
        <input type="file" name="image">

        <input type="submit" value="Submit">
    </form>


    <?php
    if (isset($_POST["type"]) && isset($_POST["brand"]) && isset($_POST["model"]) && isset($_POST["year"]) && isset($_POST["price"]) && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $id=$_POST["id"];
        $type=$_POST["type"];
        $brand=$_POST["brand"];
        $model=$_POST["model"];
        $year=$_POST["year"];
        $price=$_POST["price"];
        $image = $_FILES['image'];

        $filename = $image['name'];
        $targetDir = 'uploads/';
        $imageUrl = '';
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

        //if id is greater than 0 it means we are updating an existing row
        if ($id > 0) {
            if ($imageUrl == '') {
                $sql = "Update vehicles set type='$type', brand='$brand', model='$model', year=$year, price_per_day=$price where vehicle_id=$id";
            }
            else {

                $sql = "Update vehicles set type='$type', brand='$brand', model='$model', year=$year, price_per_day=$price, image_url='$imageUrl' where vehicle_id=$id";
            }
        }
        //otherwise we insert a new row
        else {
            $sql = "INSERT INTO vehicles(type, brand,model, year, price_per_day, image_url) VALUES ('$type', '$brand', '$model', $year, $price, '$imageUrl')";
           // echo "<script>alert('passed')</script>";
        }
        
        if(mysqli_query($link, $sql)) {
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