<?php 
include('./SESSION/SESSION.php');
$per->eva("BILAN VACCINATION FINAL Dr :",'./5EVA/EVAVACF.PHP',$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"],"imprimer bilan vaccination"); 
?>
