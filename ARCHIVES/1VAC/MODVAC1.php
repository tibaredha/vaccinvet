<?php 
include('./SESSION/SESSION.php'); 

$wilaya          = $_POST["wilaya"] ;
$daira           = $_POST["daira"] ;
$commune         = $_POST["commune"] ;
$AVN             = $_POST["AVN"] ;
$Veterinaire     = $_POST["Veterinaire"] ;
$MDP             = $_POST["MDP"] ;
$ADMIN           = $_POST["ADMIN"] ;
$DATEINSC        = $_POST["DATEINSC"] ;
$OK              = $_POST["OK"] ;
$IDP             = $_POST["IDP"] ;
$AVND            = $_POST["AVND"] ;
$AVNW            = $_POST["AVNW"] ;
	// $sql = "UPDATE users SET
	
	// WILAYA          = '$wilaya',
	// DAIRA           = '$daira',
	// COMMUNE         = '$commune',
	// AVN             = '$AVN',
	// AVND             = '$AVND',
	// AVNW             = '$AVNW',
	// USER            = '$Veterinaire',
	// MDP             = '$MDP',
	// ADMIN           = '$ADMIN',
	// DATEINSC        = '$DATEINSC',
	// OK              = '$OK'
	// WHERE IDP    = '$IDP'" ;
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