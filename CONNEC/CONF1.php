<?php 
include('./SESSION/SESSION.php'); 

$IDP             = $_POST["IDP"] ;
$AVN             = $_POST["AVN"] ;
$Veterinaire     = $_POST["Veterinaire"] ;
$MDP             = $_POST["MDP"] ;
$ADRESSE             = $_POST["ADRESSE"] ;

	$sql = "UPDATE users SET
	AVN             = '$AVN',
	USER            = '$Veterinaire',
	MDP             = '$MDP',
	ADRESSE         = '$ADRESSE'
	WHERE IDP       = '$IDP'" ;
 //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
//affichage des résultats, pour savoir si la modification a marchée:
 
if($requete)
{
    //echo("La modification a ete correctement effectuee") ;
	header("Location: index.php?uc=CONF") ;
}
else
{
    //echo("La modification à echouee") ;
	header("Location: index.php?uc=CONF") ;
}
?>