<?php include('./SESSION/SESSION.php'); ?>
<?php
  //connection au serveur
    $db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    $datedon   = $_POST["datedon"] ;
    $idon      = $_POST["idon"] ;
    $nomdnr    = $_POST["nomdnr"] ;
    $prenomdnr = $_POST["prenomdnr"] ;
    $sexe      = $_POST["sexe"] ;
	$DATENAISSANCE = $_POST["DATENAISSANCE"] ;
    $iddnr     = $_POST["iddnr"] ;
	$IDP       = $_POST["IDP"] ;
	$VP        = $_POST["VP"] ;
	$TEDP       = $_POST["TEDP"] ;
	$IND       = $_POST["IND"] ;
	$id        = $_POST["idon"] ;
	//création de la requête SQL:UPDATE
	$sql = "UPDATE tdon SET
	idon      = '$idon     ',
	NOMDNR    = '$nomdnr   ',
    PRENOMDNR = '$prenomdnr', 
	SEXE      = '$sexe     ',
	DATENAISSANCE = '$DATENAISSANCE ',
	datedon   = '$datedon  ',
	IDDNR     = '$iddnr    ',
	idp       = '$IDP      ',
	VP        = '$VP       ',
	TEDP      = '$TEDP     ',
	IND       = '$IND'
	WHERE idon= '$id       ' " ;
//exécution de la requête SQL:
$requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
//affichage des résultats, pour savoir si la modification a marchée: 
if($requete)
{
    //echo("La modification a ete correctement effectuee") ;
	header("Location: index.php?uc=CONFDNR") ;
}
else
{
    //echo("La modification à echouee") ;
	header("Location: index.php?uc=CONFDNR2") ;
}
?>