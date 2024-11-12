<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
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
<?php
$names = $_SESSION['user_name'];
$query="SELECT * FROM patientInfo WHERE id = $names;";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$ids = $row["id"];

$queryi="SELECT * FROM insuranceInfo WHERE id = $names;";
$resulti = mysqli_query($conn,$queryi);
$insurancei = mysqli_fetch_assoc($resulti);

$querya="SELECT * FROM allergies WHERE id = $names;";
$resulta = mysqli_query($conn,$querya);
$allergy = mysqli_fetch_assoc($resulta);
$tosplit = $allergy["allergies"];
$arr1 = explode(",", $tosplit);

$queryme="SELECT * FROM medication WHERE id = $names;";
$resultme = mysqli_query($conn,$queryme);
$meds = mysqli_fetch_assoc($resultme);
$tosplitm = $meds["medication"];
$arrm = explode(",", $tosplitm);

$querym="SELECT * FROM medicalHistory WHERE id = $names;";
$resultm = mysqli_query($conn,$querym);
$medical = mysqli_fetch_assoc($resultm);
$str = $medical["medicalHistory"];
$asd = explode(",", $str);

?>

<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Patient Info</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><?php echo "Patient Name: ". $row["name"]; echo "<br>Date of birth: ". $row["dob"]; echo "<br>Address: ". $row["address"]; echo "<br>Gender: ". $row["gender"]; echo "<br>Blood Type: ". $row["bloodType"]; echo "<br>Height: ". $row["height"]; echo "<br>Weight: ". $row["weight"]; echo "<br>Primary Care Physician: ". $row["doctorName"]; echo "<br>Primary Care Address: ". $row["doctorAddress"] . "<br>";?><button type="submit" onclick="window.location.href='editPatientInfo.php'">edit</button></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Insurance Info</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><?php echo "Provider: ". $insurancei["provider"]; echo "<br>Group Number: ". $insurancei["groupNumber"]; echo "<br>Member Number: ". $insurancei["memberNumber"]; echo "<br>Date of Expiration: ". $insurancei["expirationDate"] . "<br>"; ?><button type="submit" onclick="window.location.href='editInsuranceInfo.php'">edit</button></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Medication</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><?php foreach($arrm as $itemm){echo "<li>" . $itemm ;} echo "<br>"?><button type="submit" onclick="window.location.href='editMedication.php'">edit</button></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Allergies</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body"><?php foreach($arr1 as $item){echo "<li>" . $item ;} echo "<br>"?><button type="submit" onclick="window.location.href='editAllergies.php'">edit</button></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Medical History</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><?php foreach($asd as $item){echo "<li>" . $item ;} echo "<br>";?><button type="submit" onclick="window.location.href='editMedicalHistory.php'">edit</button></div>
      </div>
    </div>  
    </div>
  </div> 
</div>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>


</body>
</html>