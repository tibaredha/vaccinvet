<?php include('./SESSION/SESSION.php'); ?>
<?php     
  //la connection a la base de donnes 
    $db_host="localhost";
    $db_name="gpts2012"; 
    $db_user="root";
    $db_pass="";
    //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
    $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    //s�lection de la base de donn�es par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
    $db  = mysql_select_db($db_name,$cnx) ;
    $id  = $_GET["idon"] ;
    //requ�te SQL:
   $sql = "DELETE FROM tdon WHERE idon = ".$id ;
   //ex�cution de la requ�te:
   $requete = mysql_query( $sql, $cnx ) ;
   if($requete)
{
    //echo("La suppression a ete correctement effectuee") ;
	header("Location: LISTDNR.php") ;
}
else
{
    //echo("La modification � echouee") ;
	header("Location: LISTDNR.php") ;
}
  
 ?> 