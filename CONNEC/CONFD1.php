<?php 
include('./SESSION/SESSION.php'); 
$IDP             = $_POST["IDP"] ;
$OK=1;

	
	$sql = "UPDATE users SET
	OK           = '$OK'
	WHERE IDP    = '$IDP'" ;
 //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
//affichage des résultats, pour savoir si la modification a marchée:
 
if($requete)
{
    //echo("La modification a ete correctement effectuee") ;
	header("Location: index.php?uc=MBRINS") ;
}
else
{
    //echo("La modification à echouee") ;
	header("Location: index.php?uc=MBRINS") ;
}
?>