<?php 
include('./SESSION/SESSION.php'); 
$per ->insereleveur ('Nouveau Eleveur / Dr:') ;
$per ->listeleveur ('Liste Des Eleveurs Inscrits','AVN',$_SESSION["AVN"]);
?>