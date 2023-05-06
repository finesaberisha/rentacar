<html>
  <body >
<?php
  require 'header.php';
  ?>
<main class="explore-cars-page">
    <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Featured cars</h2>

          </div>

          <ul class="featured-car-list">

          <?php 
          // Check if search criteria are set
          session_start();
          if (isset($_POST["location"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])) {
            $location = $_POST["location"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $username = '';
            if (isset($_SESSION["username"])) {
              $username = $_SESSION["username"];
            }
            $result = array($location, $start_date, $end_date, $username);
            $jsonResult = json_encode($result); //converting the array to json format
            echo "<script>var bookData = " . $jsonResult . ";</script>"; //storing that array in json format in a javascript variable
          }
          include("./processes/explore.php");// Includes the PHP code to generate the list of cars
          ?>

          </ul>

        </div>
      </section>
</main>

<dialog id="addToBookingsDialog">
    <?php 
       include("./processes/book.php"); //Includes the PHP code to add a booking to the database
    ?>
</dialog>
 
<?php
  require 'footer.php';
  ?>
    
    <script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>