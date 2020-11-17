<?php
include('./SESSION/SESSION.php');
//ajouter coresspondance de la supression dans table ordonnace et medicament ? 
$id=$_GET["id"] ;
$sql = "DELETE FROM categorie WHERE id = $id" ;
$requete = mysql_query( $sql, $cnx ) ;
if($requete)
{   
header("Location: index.php?uc=CATMED") ;
}
else
{
header("Location: index.php?uc=CATMED") ;
}
?>