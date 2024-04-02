<?php
include('connection.php');

if (!empty($_POST['submit'])){
    $type = $_POST['type'];
    $original_price = $_POST['original_price'];
    $discount = $_POST['discount'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $registration_date = $_POST['registration_date'];

    // Image handling
    $imagename = '';
    if (isset($_FILES['image'])) {
        $imagename = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = "uploads/";
        move_uploaded_file($tmp, $path.$imagename);
        $image = $path.$imagename;
    }
    // Corrected variable name in the SQL query
    $insert_query = "INSERT INTO properties (type, original_price, discount, district, city, address, image, description, registration_date) VALUES ('$type', $original_price, $discount, '$district', '$city', '$address', '$imagename', '$description', '$registration_date')";
    // echo $insert_query; 
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "Record added successfully";
        header("Location: viewproperty.php");
        exit; 
    } else {
        echo "Property not added, there is some error";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
</head>
<body>
    <h1>Add Properties</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type"><br>
        <label for="original_price">Original Price:</label><br>
        <input type="text" id="original_price" name="original_price"><br>
        <label for="discount">Discount:</label><br>
        <input type="text" id="discount" name="discount"><br>
        <label for="district">District:</label><br>
        <input type="text" id="district" name="district"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        <label for="images">Images:</label> 
        <input type="file" name="image" ><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="registration_date">Registration Date:</label><br>
        <input type="date" id="registration_date" name="registration_date"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
