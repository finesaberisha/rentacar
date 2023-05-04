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
          include("./processes/allcars.php");
          ?>

          </ul>

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