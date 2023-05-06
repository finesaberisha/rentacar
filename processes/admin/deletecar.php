<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <input type="hidden" name="idToDelete" value="">

        <p>Are you sure you want to delete this car?</p>
        <input type="submit" value="Yes">
    </form>

    <?php
    if(isset($_POST["idToDelete"])){
        $id=$_POST["idToDelete"];
        /* Attempt MySQL server connection. Assuming you are running MySQL
        server with default setting (user 'root' with no password) */
        $link = mysqli_connect("localhost", "root", "", "rentacar");
        // Check connection
        if($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        // Attempt insert query execution
        $sql = "DELETE FROM vehicles where vehicle_id=$id";
        if(mysqli_query($link, $sql)) {
            echo "<meta http-equiv='refresh' content='0'>";
    //        echo "$alias deleted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
    }
    
    ?>
</body>
</html>