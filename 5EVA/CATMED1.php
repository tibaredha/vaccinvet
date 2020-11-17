<?php 
include('./SESSION/SESSION.php');
$conn = mysqli_connect('localhost', 'root', '', 'vaccinvet');
mysql_query("SET NAMES 'UTF8'");
if (!$conn) {die('Connection failed ' . mysqli_error($conn));}
$categorie = $_POST['categorie'];	
$sql = "INSERT INTO categorie (categorie) VALUES ('".$categorie."')";
mysqli_query($conn, $sql);
header("Location: index.php?uc=CATMED") ;
?>