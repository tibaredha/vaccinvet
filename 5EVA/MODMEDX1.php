<?php
include('./SESSION/SESSION.php'); 
$idmed= $_POST['idmed'];
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
       
$sql = "UPDATE products SET	
categorie   = '$categorie',
name        = '$name',
description = '$description',
qte         = '$qte',
qts         = '$qts',
cmm         = '$cmm',
smin        = '$smin',
smax        = '$smax',
price       = '$price',
date        = '$date'
WHERE id    = '$idmed'" ;
$requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
if($requete)
{
	header("Location: index.php?uc=ENTMED") ;
}
else
{
	header("Location: index.php?uc=ENTMED") ;
}
?>