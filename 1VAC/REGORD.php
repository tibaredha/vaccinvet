﻿<?php 
include('./SESSION/SESSION.php');
$per->evaord("REGISTRE DES ORDONNANCES",'1VAC/RORD.php',$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"],"AFFICHER REGISTRE DES ORDONNANCES"); 
?>