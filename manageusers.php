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
  <?php
  require 'header.php';
  ?>
    
    <?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['role'] != 'staff') {
        header("Location: ./user.php");
        die();
    }
    if(!isset($_SESSION['username'])) {
        header("Location: ./register.php");
        die();
    }
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
    <h2> Users: </h2>

    <dialog id="deleteUser">
    <?php 
       include("./processes/admin/deleteuser.php");
    ?>
    </dialog>

    <?php 
        include("./processes/admin/allusers.php");
    ?>
    </div>

    </div>
      </section>
  </main>
  
  <?php
  require 'footer.php';
  ?>
  
  <script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>