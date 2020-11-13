<?php
include('./SESSION/SESSION.php'); 
$id=$_GET["id"] ;
$sql = "DELETE FROM products WHERE id = $id" ;
$requete = mysql_query( $sql, $cnx ) ;
if($requete)
{   
header("Location: index.php?uc=ENTMED") ;
}
else
{
header("Location: index.php?uc=ENTMED") ;
}
?>