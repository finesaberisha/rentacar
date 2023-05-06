<html>
<body>
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
    // if user is not logged in and tries to access admin panel, it redirects to the login page
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
            <h2 class="h2 section-title">Admin Panel</h2>

          </div>
        <div class="admin-main">
         

          <div>
            <ul class="flexed">
              <li class="manage"><i class="fa fa-tasks"></i><a href="./managecars.php">Manage Cars</a></li>
              <li class="manage"><i class="fa fa-calendar"></i><a href="./managebookings.php">Manage Bookings</a></li>
              <li class="manage"><i class="fa fa-user"></i><a href="./manageusers.php">Manage Users</a></li>
            </ul>
          </div>

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