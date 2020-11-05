<?php 
include('./SESSION/SESSION.php');
$per->eva("BILAN VACCINATION PARTIEL Dr :",'./5EVA/EVAVAC.PHP',$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"],"imprimer bilan vaccination"); 
?>