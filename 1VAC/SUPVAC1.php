<?php
$IDVAC             = $_POST["IDVAC"] ;
include('./SESSION/SESSION.php'); 

   $sql = "DELETE FROM regvac WHERE idregvac = ".$IDVAC ;
   $requete = mysql_query( $sql, $cnx ) ;
   if($requete)
{   
	header("Location: index.php?uc=REGVAC0") ;
}
else
{
	header("Location: index.php?uc=REGVAC0") ;
}
?>