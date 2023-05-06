<html>
</head>
<?php
  require 'header.php';
  ?>

<body>
<?php
    session_start();

    // if an already logged in user tries to access login page send them to user panel if they are a user, or to admin panel if they are staff
    if(isset($_SESSION['username'])) {
      if($_SESSION['role'] != 'staff') {
        header("Location: ./user.php");
        die();
      }
      else {
        header("Location: ./admin.php");
        die();
      }
        
    }
    ?>
  <div class="register-page">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
          Login Form
        </div>
        <div class="title signup">
          Signup Form
        </div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="./processes/authentication.php" method="POST" class="login">
            <div class="field">
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="field">
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="pass-link">
              <a href="#">Forgot password?</a>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">
              Not a member? <a href="">Signup now</a>
            </div>
          </form>
          <form action="./processes/register.php" method="POST" class="signup" onsubmit="return validateForm()">
            <div class="field">
              <input type="text" name="email" placeholder="Email Address" required>
            </div>
            <div class="field">
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="field">
              <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="field">
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;
    });
  </script>

  <?php
require 'footer.php';
?>

  <script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>