<?php
include('./SESSION/SESSION.php');
$IDELEV=$_POST["IDELEV"]; 
$IDORD=$_POST["IDORD"];  
$conn = mysqli_connect('localhost', 'root', '', 'vaccinvet');
mysql_query("SET NAMES 'UTF8'");
if (!$conn) {die('Connection failed ' . mysqli_error($conn));}

	$MD = $_POST['MD'];
	$PS = $_POST['PS'];
	$VA = $_POST['VA'];
	$RA = $_POST['RA'];
	$IDELEV = $_POST['IDELEV'];
	
	$sql = "INSERT INTO medvet (MD, PS, VA, RA,IDELEV,IDORD ) VALUES ('".$MD."', '".$PS."', '".$VA."', '".$RA."', '".$IDELEV."','".$IDORD."')";
  	mysqli_query($conn, $sql);

header("Location: index.php?uc=NMED&ID=$IDORD&idelev=$IDELEV") ;
?>