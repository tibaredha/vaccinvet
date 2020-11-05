<?php
include('./SESSION/SESSION.php'); 
$IDP             = $_POST["IDP"] ;
$sql = "DELETE FROM users WHERE IDP = ".$IDP ;
$requete = mysql_query( $sql, $cnx ) ;
if($requete)
{   
header("Location: index.php?uc=MBRINS") ;
}
else
{
header("Location: index.php?uc=MBRINS") ;
}
?>