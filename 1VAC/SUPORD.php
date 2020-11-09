<?php
include('./SESSION/SESSION.php'); 

$id=$_GET["id"] ;
$idelev=$_GET["idelev"] ;

$sqlo = "DELETE FROM medvet WHERE IDORD = $id" ;
$requeteo = mysql_query( $sqlo, $cnx ) ;
if($requeteo)
{  
	$sql = "DELETE FROM ordvet WHERE id = $id" ;
	$requete = mysql_query( $sql, $cnx ) ;
	if($requete)
	{   
	header("Location: index.php?uc=NORD&IDP=$idelev") ;
	}
	else
	{
	header("Location: index.php?uc=NORD&IDP=$idelev") ;
	}
	
}

?>