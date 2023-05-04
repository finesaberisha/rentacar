<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiona - Rent your favourite car</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<main class="explore-cars-page">
    <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">About us</h2>

          </div>

          <ul class="about-us-2">
            <li>
            <img src="./assets/images/blog-1.jpg" class="pic">
            </li>
            <li>
            <h3>Rent a Kerr Company</h3>
          <p>If you're planning a trip to Kosovo and need a reliable and affordable way to get around, look no further than our rent-a-car company. Based in the heart of Prishtina, we offer a wide range of vehicles to suit every need and budget, from compact cars to spacious SUVs and everything in between. But we don't just serve Prishtina - we also have branches in Gjakova, Peja, Prizren, Ferizaj, and Mitrovica, making it easy to rent a car no matter where you're headed. <button class="btn">Login</button></p>
            </li>
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