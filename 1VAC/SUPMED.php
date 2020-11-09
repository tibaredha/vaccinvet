<?php
include('./SESSION/SESSION.php'); 

$id=$_GET["id"] ;
$idord=$_GET["idord"] ;
$idelev=$_GET["idelev"] ;

$sql = "DELETE FROM medvet WHERE id = $id" ;
$requete = mysql_query( $sql, $cnx ) ;
if($requete)
{   
header("Location: index.php?uc=NMED&ID=$idord&idelev=$idelev") ;
}
else
{
header("Location: index.php?uc=NMED&ID=$idord&idelev=$idelev") ;
}
?>