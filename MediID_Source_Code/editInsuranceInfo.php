<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

$names = $_SESSION['user_name'];
$query="SELECT * FROM insuranceInfo WHERE id = $names;";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$ids = $row["id"];

if(isset($_POST['submit']))
{
    $provider  = $_POST['provider'];
    $groupNumber  = $_POST['gNumber'];
    $memberNumber  = $_POST['mNumber'];
    $expirationDate  = $_POST['eDate'];
    
    $updateinfo = "UPDATE insuranceInfo SET id='$ids',provider='$provider',groupNumber='$groupNumber',memberNumber='$memberNumber',expirationDate='$expirationDate' WHERE id='$ids' ";
    $sql = mysqli_query($conn, $updateinfo);
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
        <form class="form" id="login" action="editInsuranceInfo.php" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">Edit Insurace Info</h1>

            <div>
                <input type="text" name="provider" value="<?php echo htmlentities($row["provider"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="gNumber" value="<?php echo htmlentities($row["groupNumber"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="mNumber" value="<?php echo htmlentities($row["memberNumber"]);?>"/>
            </div>
            
            <div>
                 <input type="text" name="eDate" value="<?php echo htmlentities($row["expirationDate"]);?>"/>
            </div>
            
            <input type="submit" name="submit" value="Edit">
        </form>
    </div>

</body>
</html>