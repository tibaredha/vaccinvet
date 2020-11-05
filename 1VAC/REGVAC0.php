<?php 
include('./SESSION/SESSION.php');
$per->eva("REGISTRE DE VACCINATION",'index.php?uc=VAC',$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"],"AFFICHER REGISTRE DE VACCINATION"); 
?>
