<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $id = htmlspecialchars($_GET["id"]);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
        $selects = " SELECT * FROM user_form WHERE id = '$id' ";

        $results = mysqli_query($conn, $selects);
        $rows = mysqli_fetch_array($results);
         $_SESSION['admin_name'] = $id;
         header('location:admin_page.php');

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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1> Medi ID</h1>
<div class="form-container">
   <form action="" method="post">
      <h3>EMT login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="prompt.php">register now</a></p>
   </form>

</div>

</body>
</html>