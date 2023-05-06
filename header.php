<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rent a Kerr</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
</head>
<body>
<header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="index.php" class="logo"><!-- Creates a link to the homepage and a logo container -->
        <img class="header-logo" src="./assets/images/RIT_Kosovo_PNG.png" alt="RITK logo"> <!-- Displays the logo image and provides an alternate text description -->
      </a>

      <nav class="navbar" data-navbar><!-- Creates a navigation menu with custom data attribute -->
        <ul class="navbar-list">

          <li>
            <a href="index.php" class="navbar-link" data-nav-link>Home</a><!-- Creates a link to the homepage with custom data attribute -->
          </li>

          <li>
            <a href="about.php" class="navbar-link" data-nav-link>About us</a><!-- Creates a link to the about page with custom data attribute -->
          </li>
          </li>

          <li>
            <a href="services.php" class="navbar-link" data-nav-link>Services</a><!-- Creates a link to the services page with custom data attribute -->
          </li>

        </ul>
      </nav>

      <div class="header-actions">

        <a href="explore.php" class="btn" aria-labelledby="aria-label-txt"><!-- Creates a button to explore cars with an ARIA label -->
          <i class="fa fa-car"></i>

          <span id="aria-label-txt">Explore cars</span>
        </a>

        <a href="register.php" class="btn user-btn" aria-label="Profile"><!-- Creates a button to access the user profile with an ARIA label -->
          <i class="fa fa-user"></i>
        </a>

        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>

      </div>

    </div>
  </header>
    
</body>
</html>