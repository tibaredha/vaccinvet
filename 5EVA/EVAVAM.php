<?php 
include('./SESSION/SESSION.php');
$per->eva("BILAN VACCINATION MENSUEL Dr :",'./5EVA/EVAVACM.PHP',$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"],"imprimer bilan vaccination"); 
?>

