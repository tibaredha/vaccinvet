<?php 
$conn = mysqli_connect('localhost', 'root', '', 'vaccinvet');
if (!$conn) {die('Connection failed ' . mysqli_error($conn));}
// echo "tiba";
if (isset($_POST['save'])) {
   
	$MD = $_POST['MD'];
	$PS = $_POST['PS'];
	$VA = $_POST['VA'];
	$RA = $_POST['RA'];
	$DA = $_POST['DA'];
	$IDELEV = $_POST['IDELEV'];
	$sql = "INSERT INTO medvet (MD, PS, VA, RA, DA, IDELEV ) VALUES ('".$MD."', '".$PS."', '".$VA."', '".$RA."', '".$DA."', '".$IDELEV."')";
  	mysqli_query($conn, $sql);
  } 
?>