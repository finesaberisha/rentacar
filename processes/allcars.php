<?php
$link = mysqli_connect("localhost", "root", "", "rentacar");
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = "SELECT * FROM vehicles";
if($result = mysqli_query($link, $sql)) {
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $name = $row['brand'].' '.$row['model'];
            $year = $row['year'];
            $image_url = $row['image_url'];
            $price = $row['price_per_day'];
            $type= $row['type'];
            
            carRender($name, $year, $image_url, $price,$type);
        }
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);





function carRender($car_name, $year, $image_url, $price, $type)
{
    echo '<li>
        <div class="featured-car-card">

          <figure class="card-banner">
            <img src="'.$image_url.'" alt="'.$car_name.'" loading="lazy" width="440" height="300" class="w-100">
          </figure>

          <div class="card-content">

            <div class="card-title-wrapper">
              <h3 class="h3 card-title">
                <a href="#">'.$car_name.'</a>
              </h3>

              <data class="year" value="'.$year.'">'.$year.'</data>
            </div>

            <ul class="card-list">

              <li class="card-list-item">
                <ion-icon name="people-outline"></ion-icon>

                <span class="card-item-text">'.$type.'</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="flash-outline"></ion-icon>

                <span class="card-item-text">Hybrid</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="speedometer-outline"></ion-icon>

                <span class="card-item-text">6.1km / 1-litre</span>
              </li>

              <li class="card-list-item">
                <ion-icon name="hardware-chip-outline"></ion-icon>

                <span class="card-item-text">Automatic</span>
              </li>

            </ul>

            <div class="card-price-wrapper">

              <p class="card-price">
                <strong>'.$price.'</strong> / month
              </p>

              <button class="btn fav-btn" aria-label="Add to favourite list">
                <ion-icon name="heart-outline"></ion-icon>
              </button>

              <button class="btn">Rent now</button>

            </div>

          </div>

        </div>
      </li>';
}
?>