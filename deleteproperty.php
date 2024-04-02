<?php
include('connection.php');

$id=$_GET['pid'];

$image_sql="SELECT * from properties WHERE pid=$id ";
$image_result=mysqli_query($conn,$image_sql);
$image_fetch=mysqli_fetch_assoc($image_result);
$image =  $image_fetch['image'];
$sql= "DELETE  FROM properties WHERE pid='$id'";
$result =mysqli_query($conn,$sql);
if($result){
    unlink("uploads/".$image);
    echo "deleted data successfully";
    header("Location:viewproperty.php");
} else {
    echo die(mysqli_error($conn));
}
?>





