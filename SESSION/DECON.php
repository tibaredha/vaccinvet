<?php
/* code  dune page type de deconnection   
*/
  session_start() ;
  //destruction de toutes les variable de sessions
  session_unset() ;
  //destruction de la session
  session_destroy() ;
 
  header("location: index.php?uc=accueil") ;
?>