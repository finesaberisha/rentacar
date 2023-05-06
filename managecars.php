<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiona - Rent your favourite car</title>
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">


</head>

<body>
    <!-- header -->
  <?php
  require 'header.php';
  ?>
    
    <?php
    session_start(); //starting the session 
    // if the role of the user logged in is not staff redirect to the user panel
    if(isset($_SESSION['username']) && $_SESSION['role'] != 'staff') {
        header("Location: ./user.php");
        die();
    }
    // if user is not logged in and tries to access manage cars page, it redirects to the login page
    if(!isset($_SESSION['username'])) {
        header("Location: ./register.php");
        die();
    }
    // if button logout is clicked, session is destroyed and it redirects to the login page
    if(isset($_POST['logout'])) {
        session_destroy();
        header("Location: ./register.php");
        die();
    }
    ?>

    


<main class="explore-cars-page">
    <section class="section featured-car" id="featured-car">
        <div class="container">



    <a href="./admin.php">← Go back</a>
    <div class="admin-main">
    <button onClick="showDialogForInsert()" style="float: right; font-weight: bold; color: green;">+ Add new</button>
    <h2> Vehicles: </h2>

     <!-- a dialog that is shown when Add new is clicked -->
    <dialog id="newCar">
    <?php 
       include("./processes/admin/addcar.php");
    ?>
    </dialog>

     <!-- a dialog that is shown when delete is clicked -->
    <dialog id="deleteCar">
    <?php 
       include("./processes/admin/deletecar.php");
    ?>
    </dialog>

    <!-- the table that displays all cars  -->
    <?php 
        include("./processes/admin/allcars.php");
    ?>
    </div>

    </div>
      </section>
  </main>
  <!-- footer -->
  <?php
  require 'footer.php';
  ?>
  
    <!-- our JS script -->
  <script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>