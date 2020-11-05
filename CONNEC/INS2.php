<?php
/*inscription
  si les champs de login et de mot de passe ne sont pas vides
  on insère l'utilisateur.
*/
if($_POST["WILAYA"] != ""  && $_POST["USER"] != "" && $_POST["MDP"] != ""  )
{
  $WILAYA     = $_POST["WILAYA"] ;
  $DAIRA      = $_POST["DAIRA"] ;
  $COMMUNE    = $_POST["COMMUNE"] ;
  $AVN        = $_POST["AVN"] ;
  $USER       = $_POST["USER"] ;
  $MDP        = $_POST["MDP"] ;
  $ADMIN      = 0 ; 
  $DATEINSC   = $_POST["DATEINSC"] ;  
  include('CONNEC.php');
  //création de la requête SQL
  $sql = "INSERT INTO users ( WILAYA,DAIRA,COMMUNE,USER,MDP,ADMIN,DATEINSC,AVN) VALUES ('".$WILAYA."','".$DAIRA."','".$COMMUNE."','".$USER."','".$MDP."','".$ADMIN."','".$DATEINSC."','".$AVN."') ";
  //exécution de la requête SQL
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  //si la requête s'est bien passé, on affiche un message de succès
  if($requete)
  {
    //echo "L'inscription s'est bien déroulée, <a href=\"distribution.php\">se connecter</a>" ;
  header("Location: index.php?uc=CONNECTION") ;
  }
  
  else
  {
  header("Location: index.php?uc=INSCRIPTION") ;
  }//fin else

 } 
 else
 { 
 header("Location: index.php?uc=INSCRIPTION") ;   
 }
?>