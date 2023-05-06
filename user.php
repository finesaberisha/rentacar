<head>
<body> 
<?php
require 'header.php';
?>
  <?php
    session_start(); // starting the session 
    // if a staff user is logged in send him to the admin dashboard
    if(isset($_SESSION['username']) && $_SESSION['role'] == 'staff') {
        header("Location: ./admin.php");
        die();
    }
    // if user is not logged in and tries to access user panel, it redirects to the login page
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
        <form method="POST" action="">
        <input type="hidden" name="logout">
        <input type="submit" class="btn" value="Logout">
    </form>
    <div class="title-wrapper">
            <h2 class="h2 section-title">User Panel</h2>

          </div>
    <div class="user-main">
    <h2> Your Bookings: </h2>
    <?php 
       include("./processes/bookings.php");
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