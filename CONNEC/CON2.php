<?php
/* verification de linscription apres connection pour savoir si visiteur fait parti des menbres
si oui il ya connection et ouverture de la session 
si non il ya passage ver l inscription 
 */  
if($_POST["AVN"] != "" && $_POST["USER"] != "" && $_POST["MDP"] != ""  )
{
  
  $AVN        = $_POST["AVN"] ;
  $USER       = $_POST["USER"] ;
  $MDP        = $_POST["MDP"] ;  
  $sql = "SELECT * FROM USERS WHERE USER ='".$USER."' and MDP ='".$MDP."' and  AVN ='".$AVN."'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;
  $result = mysql_fetch_object($requete) ;
  $IDP=$result->IDP ;
  $WILAYA=$result->WILAYA ;
  $DAIRA=$result->DAIRA ;
  $COMMUNE=$result->COMMUNE ;
  $ADMIN=$result->ADMIN ;
  $OK=$result->OK ;
  $AVND =$result->AVND;
  $AVNW =$result->AVNW;
   // print_r ($result->ok) ;
  //utiliser cette command pour supprimer les fichier mysql bin a chaque connection 
  $sql1 = "RESET MASTER";
  $requete1 = @mysql_query($sql1, $cnx) or die($sql."<br>".mysql_error()) ;
  
  
  
  if(is_object($result))
  {
    //début de la sessions
    session_start() ;
    //enregistrement d'une variable de session, ici le login de l'utilisateur
    $_SESSION["USER"]     =$USER ;
	$_SESSION["AVN"]      =$AVN ;
	$_SESSION["OK"]       =$OK;
	$_SESSION["ADMIN"]    =$ADMIN;
	$_SESSION["IDP"]      =$IDP;
	//VARIABLE SESSION  POUR REGISTRE VACCINATION
	$_SESSION["WILAYA"]    =$WILAYA;
	$_SESSION["DAIRA"]     =$DAIRA;
	$_SESSION["COMMUNE"]   =$COMMUNE;
	$_SESSION["AVND"]      =$AVND;
	$_SESSION["AVNW"]      =$AVNW;
    echo("<pre>") ;
    print_r($_SESSION) ;
    echo("</pre>") ;
	//si tou va bien redirection vers demande de distribution
  header("Location: index.php?uc=accueil") ;
  }//fin if
  //sinon on retourne à la page d'inscription
  else
  {
  header("Location: index.php?uc=accueil") ;      //REDIRECTION  POUR EVITER LES INSCRIPTION 
  //header("Location: index.php?uc=INSCRIPTION") ;//REDIRECTION  POUR INSCRIPTION  
  }//fin else
}//fin if

/*
  sinon on retourne à la page connection
*/
else
{
  header("Location: index.php?uc=CONNECTION") ;
}//fin else
?>