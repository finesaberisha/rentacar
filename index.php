<body>
  <?php
  require 'header.php';
  ?>




  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home">
        <div class="container">
<!-- Hero content, including title and description -->
          <div class="hero-content">
            <h2 class="h1 hero-title">Discover the Freedom of the Open Roads</h2>

            <p class="hero-text">
            Whether you're planning a road trip, need a ride to the airport <br>or simply want to explore your local area, <br>our rent a car company has got you covered.
            </p>
          </div>

          <div class="header-photo"></div>
<!-- Search form for selecting a location, start date, and end date -->
          <form action="./explore.php" method="POST" class="hero-form">
<!-- Location dropdown -->
          <div class="input-wrapper">
          <label for="input-1" class="input-label">Location</label>
          <select name="location" id="input-1" class="input-field-select">
            <option value="">Select a location</option>
            <option value="Peja">Peja</option>
            <option value="Prishtina">Prishtina</option>
            <option value="Prizren">Prizren</option>
            <option value="Ferizaj">Ferizaj</option>
            <option value="Gjakova">Gjakova</option>
            <option value="Mitrovica">Mitrovica</option>
          </select>
          </div>

<!-- Start date input -->
            <div class="input-wrapper">
              <label for="input-2" class="input-label">Pick-up Date</label>

              <input type="date" name="start_date" id="input-2" class="input-field">
            </div>
<!-- End date input -->
            <div class="input-wrapper">
              <label for="input-3" class="input-label">Return Date</label>

              <input type="date" name="end_date" id="input-3" class="input-field">
            </div>
<!-- Search button -->
            <button type="submit" class="btn">Search</button>

          </form>

        </div>
      </section>





      <!-- 
        - #FEATURED CAR;Section showing featured cars
      -->

      <section class="section featured-car" id="featured-car">
        <div class="container">
<!-- Title and link to view more cars -->
          <div class="title-wrapper">
            <h2 class="h2 section-title">Featured cars</h2>

            <a href="./explore.php" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>
<!-- List of featured cars -->
          <ul class="featured-car-list">

            <?php
            include("./processes/featuredcars.php");
            ?>

          </ul>

        </div>
      </section>





      <!-- 
        - #GET START: Section showing steps to get started with renting a car -->

      <section class="section get-start">
        <div class="container">
<!-- Title and list of steps -->
          <h2 class="h2 section-title">Get started with 4 simple steps</h2>

          <ul class="get-start-list">

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-1">
                  <ion-icon name="person-add-outline"></ion-icon>
                </div>

                <h3 class="card-title">Choose your vehicle</h3>

                <p class="card-text">
                Take a look at our inventory and choose the vehicle that best suits your needs and budget. We offer a wide range of options, from compact cars to luxury SUVs and everything in between.
                </p>

                <!-- <a href="#" class="card-link">Get started</a> -->

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-2">
                  <ion-icon name="car-outline"></ion-icon>
                </div>

                <h3 class="card-title">Log in to your account</h3>

                <p class="card-text">
                If you don't already have an account with us, you can easily create one on our website. Once you're logged in, you can select the dates and times you want to rent the car.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-3">
                  <ion-icon name="person-outline"></ion-icon>
                </div>

                <h3 class="card-title">Pick up your car</h3>

                <p class="card-text">
                On the day of your rental, come to our rental location to pick up your car. Be sure to bring your driver's license and credit card, as well as any additional documentation we may require.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-4">
                  <ion-icon name="card-outline"></ion-icon>
                </div>

                <h3 class="card-title">Return your car</h3>

                <p class="card-text">
                After your rental period ends, please return the car to our rental location with a full gas tank and in the same condition you received it. Our staff will inspect the car and close out your agreement.                
              </p>

              </div>
            </li>

          </ul>

        </div>
      </section>


    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <?php
  require 'footer.php';
  ?>

  <script src="./assets/js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>