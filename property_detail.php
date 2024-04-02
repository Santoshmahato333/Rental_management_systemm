<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view details</title>
    <link rel="stylesheet" href="./css_folder/property_detail.css">
</head>
<body>
    <section class="property details">
        <h2>Property details</h2>

        <?php
        include('connection.php');
        if (isset($_GET['id'])) {
            $pid = $_GET['id'];
            $sql = "SELECT * FROM properties WHERE pid = $pid";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
            <div class="property-list">
                <div class="image">
                <img src="uploads/<?php echo $row['image'] ?>" alt="room" >
                </div>
                <div class="detailinformation">
                <h3>type of house:<?php echo $row['type'] ?></h3>
                <p>Rs.<?php echo $row['original_price'] ?></p>
                <p>Original Price:<?php echo $row['original_price'] ?></p>
                <p> Discount Price:<?php echo $row['discount'] ?></p>
                <p> District:<?php echo $row['district'] ?></p>
                <td> City:<?php echo $row['city'] ?></td>
                <p> Address:<?php echo $row['address'] ?></p>
                <p> Description:<?php echo $row['description'] ?></p>
                <p> Registation date:<?php echo $row['registration_date'] ?></p>
                </div>
            </div>
        <?php
        } else {
            echo "Property ID not provided";
        }
        ?>

    </section>
</body>

</html>