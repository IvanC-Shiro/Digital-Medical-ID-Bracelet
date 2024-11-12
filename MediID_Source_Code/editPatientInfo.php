<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

$names = $_SESSION['user_name'];
$query="SELECT * FROM patientInfo WHERE id = $names;";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$ids = $row["id"];

if(isset($_POST['submit']))
{
    $uname  = $_POST['user_name'];
    $udob  = $_POST['user_dob'];
    $uadd  = $_POST['user_address'];
    $ugender  = $_POST['user_gender'];
    $ublood  = $_POST['user_blood'];
    $uheight  = $_POST['user_height'];
    $uweight  = $_POST['user_weight'];
    $udoc  = $_POST['user_doc'];
    $udocadd  = $_POST['user_doc_add'];
    
    $updateinfo = "UPDATE patientInfo SET id='$ids',name='$uname',dob='$udob',address='$uadd',gender='$ugender',bloodType='$ublood',height='$uheight',weight='$uweight',doctorName='$udoc',doctorAddress='$udocadd' WHERE id='$ids' ";
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
        <form class="form" id="login" action="editPatientInfo.php" method="POST" enctype="multipart/form-data">
            <h1 class="form__title">Edit User Info</h1>

            <div>
                <input type="text" name="user_name" value="<?php echo htmlentities($row["name"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="user_dob" value="<?php echo htmlentities($row["dob"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="user_address" value="<?php echo htmlentities($row["address"]);?>"/>
            </div>
            
            <div>
                 <input type="text" name="user_gender" value="<?php echo htmlentities($row["gender"]);?>"/>
            </div>
            
            <div>
                 <input type="text" name="user_blood" value="<?php echo htmlentities($row["bloodType"]);?>"/>
            </div>
            
            <div>
                 <input type="text" name="user_height" value="<?php echo htmlentities($row["height"]);?>"/>
            </div>
            
            <div>
                 <input type="text" name="user_weight" value="<?php echo htmlentities($row["weight"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="user_doc" value="<?php echo htmlentities($row["doctorName"]);?>"/>
            </div>
            
            <div>
                <input type="text" name="user_doc_add" value="<?php echo htmlentities($row["doctorAddress"]);?>"/>
            </div>
            <input type="submit" name="submit" value="Edit">
        </form>
    </div>

</body>
</html>