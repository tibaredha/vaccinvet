<?php
include('./SESSION/SESSION.php'); 
$IDP = $_POST["IDP"] ;
$sql = "DELETE FROM elev WHERE idelev = ".$IDP ;

//necessite la supression ordonnance + medicaments 
//necessite la supression vaccination  


$requete = mysql_query( $sql, $cnx ) ;
if($requete)
{   
header("Location: index.php?uc=NELEV") ;
}
else
{
header("Location: index.php?uc=NELEV") ;
}
?>