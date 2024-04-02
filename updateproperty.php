<?php
include('connection.php');

if (!empty($_POST['submit'])){
    $pid=$_POST['pid'];
    $type = $_POST['type'];
    $original_price = $_POST['original_price'];
    $discount = $_POST['discount'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $registration_date = $_POST['registration_date'];
    $imgName = '';
    // Image handling

    // to get old img
    $image_sql="SELECT * from properties WHERE pid=$pid ";
    $image_result=mysqli_query($conn,$image_sql);
    $image_fetch=mysqli_fetch_assoc($image_result);
    $oldImg =  $image_fetch['image'];

    if (isset($_FILES['image']) && $_FILES['image']['name']!='') {
        //to get new img
        $newImg = $_FILES['image']['name'];
        $imgName = $newImg;
        $tmp = $_FILES['image']['tmp_name'];
        $path = "uploads/";
        move_uploaded_file($tmp, $path.$newImg);
        unlink("uploads/".$oldImg);
    }else{
        $imgName=$oldImg;
    }

    $update_query = "UPDATE properties SET 
                    type = '$type', 
                    original_price = $original_price, 
                    discount = $discount, 
                    district = '$district', 
                    city = '$city', 
                    address = '$address', 
                    image='$imgName',
                    description = '$description', 
                    registration_date = '$registration_date'
                    WHERE pid = $pid";

    $result = mysqli_query($conn, $update_query);
    if ($result) {
        echo "Record updated successfully";
        header("Location: viewproperty.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$pid = $_GET['pid']; 
$property_query = "SELECT * FROM properties WHERE pid = $pid";
$property_result = mysqli_query($conn, $property_query);
if($property_result) {
    $property = mysqli_fetch_assoc($property_result);
} else {
    echo "Error fetching property details: " . mysqli_error($conn);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Property</title>
</head>
<body>
    <h1>Update Property</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?php echo $pid ; ?>">
        <label for="type">Type:</label><br>
        <input type="text" id="type" name="type" value="<?php echo $property['type']; ?>"><br>
        <label for="original_price">Original Price:</label><br>
        <input type="text" id="original_price" name="original_price" value="<?php echo $property['original_price']; ?>"><br>
        <label for="discount">Discount:</label><br>
        <input type="text" id="discount" name="discount" value="<?php echo $property['discount']; ?>"><br>
        <label for="district">District:</label><br>
        <input type="text" id="district" name="district" value="<?php echo $property['district']; ?>"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" value="<?php echo $property['city']; ?>"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $property['address']; ?>"><br>
        <label for="images">Images:</label><br>
        <input type="file" name="image" ><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $property['description']; ?></textarea><br>
        <label for="registration_date">Registration Date:</label><br>
        <input type="date" id="registration_date" name="registration_date" value="<?php echo $property['registration_date']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
