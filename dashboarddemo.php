<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - House Rental Management System</title>
    <link rel="stylesheet" href="css_folder/dashboardstyle.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Properties</a></li>
                    <li><a href="#">Bookings</a></li>
                    <li><a href="#">Profile</a></li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <section class="property-listings">
            <h2>Available Properties</h2>
            <div class="properties-grid">
                <!-- PHP code to fetch and display property listings -->
                <?php
                // Example PHP code to fetch property listings from a database
                $properties = array(
                    array('id' => 1, 'name' => 'Cozy Apartment', 'price' => '$100/night', 'image' => 'apartment.jpg'),
                    array('id' => 2, 'name' => 'Luxury Villa', 'price' => '$500/night', 'image' => 'villa.jpg'),
                    // Add more properties
                );

                foreach ($properties as $property) {
                    echo '<div class="property">';
                    echo '<img src="uploads/WIN_20230522_07_47_51_Pro.jpg' . $property['image'] . '" alt="' . $property['name'] . '">';
                    echo '<h3>' . $property['name'] . '</h3>';
                    echo '<p><strong>Price:</strong> ' . $property['price'] . '</p>';
                    // Add more details like description, location, etc.
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <aside class="booking-form">
            <h2>Book a Property</h2>
            <form action="book_property.php" method="POST">
                <label for="property_id">Select Property:</label>
                <select name="property_id" id="property_id">
                    <!-- PHP code to dynamically populate property options -->
                    <?php
                    foreach ($properties as $property) {
                        echo '<option value="' . $property['id'] . '">' . $property['name'] . '</option>';
                    }
                    ?>
                </select>
                <label for="check_in">Check-in Date:</label>
                <input type="date" name="check_in" id="check_in">
                <label for="check_out">Check-out Date:</label>
                <input type="date" name="check_out" id="check_out">
                <button type="submit">Book Now</button>
            </form>
        </aside>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> House Rental Management System</p>
        </div>
    </footer>
</body>
</html>
