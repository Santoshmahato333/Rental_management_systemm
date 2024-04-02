<?php

@include 'connection.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = md5($_POST['password']);
  
   $user_type = $_POST['role'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:dashboard.php');

      }elseif($row['role'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:home.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="css_folder/login.css"> 
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email"><br>
      <input type="password" name="password" required placeholder="Enter your password"><br> <br>
      <input type="submit" name="submit" value="Login Now">
      <p>Don't have an account? <a href="signup.php">Register Now</a></p>
   </form>
</div>

</body>
</html>
