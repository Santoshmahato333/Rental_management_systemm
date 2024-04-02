
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rental Management System</title>
    <link rel="stylesheet" href="css_folder/home.css" />
  </head>
  <body>
    <header>
      <div class="logo">HRMS</div>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <!-- <li><a href="#contact">Contact us</a></li> -->
          <li><a href="#properties">Properties</a></li>
          <li><a href="#notifications">Notifications</a></li>
          <li><a href="#profile">Profile</a></li>
          <li id="login"><a href="login.html">Login</a></li>
          <li id="signup"><a href="signup.html">SignUp</a></li>
        </ul>
      </nav>
    </header>

    <section class="overview">
      <div class="slideshow-container">
        <h1>Find your favorite Properties</h1>
        <div class="mySlides fade">
          <img src="images/bannerhouse.jpg" >
        </div>
        <div class="mySlides fade">
          <img src="images/house.jpg" alt="Image 2" width="500" height="400">
        </div>
        <div class="mySlides fade">
          <img src="images/house1.jpg" alt="Image 2" width="500" height="400">
        </div>
        <!-- Add more slides as needed -->
        <hr>
        <button onclick="nextSlide()"><img src="images/nexticon.png" alt="icon" width="40px" height="40px"></button>
      </div>
    </section>

    <h2 style="position: relative; margin-left: 25px;">Available <br>Houses,Apartment,Room</h2>
    <section class="property-management">
      <?php
      include('connection.php');
      $sql = "SELECT * FROM properties";
      $run_query = mysqli_query($conn, $sql);
      $check_query = mysqli_num_rows($run_query) > 0;
      if ($check_query) {
        while ($row = mysqli_fetch_assoc($run_query)) {
          ?>
          <div class="property-list">
            <img src="uploads/<?php echo $row['image'] ?>" alt="room" width="100%">
            <h3><?php echo $row['type'] ?></h3>
            <p>Rs.<?php echo $row['original_price'] ?></p>
          </div>
          <?php
        }
      } else {
        echo "property not found";
      }
      ?>
    </section>



    <!-- Add more sections for agreements, payments, maintenance, notifications, and profile -->

    <footer>
      <p>&copy; 2024 House Rental Management System</p>
      By Santosh matao
    </footer>

    <script src="js/bannerSlideShow.js"></script>
  </body>
</html>
