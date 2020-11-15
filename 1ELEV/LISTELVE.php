<?php
include('./SESSION/SESSION.php'); 
// $per ->insereleveur ('Nouveau Eleveur / Dr:') ;
$per -> sautligne (16);
$per ->listeleveur ('Liste Des Eleveurs Inscrits','AVN',$_SESSION["AVN"]);
$per -> sautligne (5);
?>
