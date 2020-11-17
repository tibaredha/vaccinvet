<?php 
include('./SESSION/SESSION.php');
$conn = mysqli_connect('localhost', 'root', '', 'vaccinvet');
mysql_query("SET NAMES 'UTF8'");
if (!$conn) {die('Connection failed ' . mysqli_error($conn));}

	$categorie = $_POST['categorie'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$qte = $_POST['qte'];
	$qts = $_POST['qts'];
	$cmm = $_POST['cmm'];
	$smin = $_POST['smin'];
	$smax = $_POST['smax'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	
$sql = "INSERT INTO products (categorie,name,description,qte,qts,cmm,smin,smax,price,date) VALUES ('".$categorie."','".$name."','".$description."','".$qte."','".$qts."','".$cmm."','".$smin."','".$smax."','".$price."','".$date."')";
mysqli_query($conn, $sql);
header("Location: index.php?uc=ENTMED") ;
?>