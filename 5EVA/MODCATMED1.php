<?php
include('./SESSION/SESSION.php'); 
$id= $_POST['idcategorie'];
$categorie = $_POST['categorie'];       
$sql = "UPDATE categorie SET	
categorie   = '$categorie'
WHERE id    = '$id'" ;
$requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
if($requete)
{
	header("Location: index.php?uc=CATMED") ;
}
else
{
	header("Location: index.php?uc=CATMED") ;
}
?>