<?php
include('connection.php');
session_start();
if(isset($_POST['signup'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $imagename = ''; 
    $role=$_POST['role'];// Get image file name
  
    
    
    // Check if username or email already exists
    $check_query = "SELECT * FROM users WHERE name='$name' OR email='$email'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        echo "Username or email already exists. Please choose a different one.";
    } else {
        // Move uploaded image to server directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
        // Insert new user into the database
       $insert_query=" INSERT INTO users(name, email, password, age, gender, phone, image,role) VALUES ('$name', '$email', '$password', '$age', '$gender', '$phone', '$imagename','$role')";
        if(mysqli_query($conn, $insert_query)) {
            echo "Registration successful. <a href='login.php'>Login here</a>.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css_folder/signup.css">
</head>
<body>
    <h1>SignUp</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="text" name="name" required placeholder="Enter your Username"><br>
        <input type="email" name="email" required placeholder="Enter your Email"><br>
        <input type="password" name="password" required placeholder="Enter your Password"> <br>
        <input type="text" name="age" required placeholder="Enter your Age"><br>
        <label>Gender:</label>
        <label> <input type="radio" name="gender" value="male">Male</label>
        <label><input type="radio" name="gender" value="female">Female</label><br><br>
        <input type="text" name="phone" required placeholder="Enter your PhoneNumber"><br>
    
        <input type="file" name="image" ><br> 
        <select name="role">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
        <input type="submit" name="signup" value="Signup">
    </form>
    <h2><p>Already have an account? <a href="login.php">Login here</a></p></h2>
</body>
</html>
