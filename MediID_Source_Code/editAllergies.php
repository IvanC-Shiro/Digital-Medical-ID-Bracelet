<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

$names = $_SESSION['user_name'];
$query="SELECT * FROM allergies WHERE id = $names;";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$ids = $row["id"];

if(isset($_POST['submit']))
{
    $all  = $_POST['allergy'];
    
    $updateall = "UPDATE allergies SET id='$ids',allergies='$all' WHERE id='$ids' ";
    $sql = mysqli_query($conn, $updateall);
    if($sql)
    {
        header('location:user_page.php');
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <form class="form" id="login" action="editAllergies.php" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">Edit Allergies</h1>
            <h3 class="form__title">NOTE: enter allergies in the format of comma seperated</h3>

            <div>
                <input type="text" name="allergy" value="<?php echo htmlentities($row["allergies"]);?>"/>
            </div>
            
            <input type="submit" name="submit" value="Edit">
        </form>
    </div>

</body>
</html>