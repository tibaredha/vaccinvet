<?php
include('./SESSION/SESSION.php');
$IDELEV=$_POST["IDELEV"]; 

$conn = mysqli_connect('localhost', 'root', '', 'vaccinvet');
if (!$conn) {die('Connection failed ' . mysqli_error($conn));}
// echo "tiba";

   
	$bilan = $_POST['bilan'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$ESPECE = $_POST['ESPECE'];
	$NBR = $_POST['NBR'];
	$TNBR = $_POST['TNBR'];
	
	
	$AGE= $_POST['AGE'];
	$TAGE = $_POST['TAGE'];
	$SEXE = $_POST['SEXE'];
	// $ = $_POST[''];
	// $ = $_POST[''];
	
	
	
	
	//$sql = "INSERT INTO ordvet (MD, PS, VA, RA, DA, IDELEV ) VALUES ('".$MD."', '".$PS."', '".$VA."', '".$RA."', '".$DA."', '".$IDELEV."')";
	$sql = "INSERT INTO ordvet (IDELEV,bilan,a1,a2,ESPECE,NBR,TNBR,AGE,TAGE,SEXE ) VALUES ('".$IDELEV."','".$bilan."','".$a1."','".$a2."','".$ESPECE."','".$NBR."','".$TNBR."','".$AGE."','".$TAGE."','".$SEXE."')";
  	mysqli_query($conn, $sql);
// if (isset($_POST['save'])) {  } 

header("Location: index.php?uc=NORD&IDP=$IDELEV") ;
?>