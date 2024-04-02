<?php

include 'connection.php';
session_start();

if(!isset($_SESSION['admin_name'])){
   header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="login.php" class="btn">login</a>
      <a href="signup.php" class="btn">signup</a>
      <a href="logout.php" class="btn">logout</a>
   </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Rental Management Dashboard</title>
    <link rel="stylesheet" href="css_folder/dashboard.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">Rental Management Service</div>
        <div class="user-profile">
            <!-- Dropdown for user profile -->
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Properties</a></li>
            <li><a href="#">Tenants</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <main>
        <!-- Dashboard Overview -->
        <section id="dashboard">
            <!-- Summary of Properties, Monthly Revenue Overview, Quick Links -->
        </section>

        <!-- Properties Section -->
        <section id="properties">
            <!-- List of Properties, Filter and Search Options, Quick Actions -->
        </section>

        <!-- Tenants Section -->
        <section id="tenants">
            <!-- List of Tenants, Filter and Search Options, Quick Actions -->
        </section>

        <!-- Payments Section -->
        <section id="payments">
            <!-- Recent Payments Overview, Filter Options, Quick Actions -->
        </section>

        <!-- Reports Section -->
        <section id="reports">
            <!-- Monthly Revenue Report, Occupancy Rate Report, Income vs. Expenses Analysis, Custom Report Generator -->
        </section>

        <!-- Settings Section -->
        <section id="settings">
            <!-- Account Settings, Notification Preferences, Customize Dashboard, Help & Support -->
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <!-- Copyright, Contact Information, Links -->
    </footer>

    <script src="scripts.js"></script>
</body>
</html>

