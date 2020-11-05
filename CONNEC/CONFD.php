<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_GET["IDP"];
$per ->h(2,110,180,'ACTIVATION DU COMPTE VETERINAIRE : Dr '.$_GET["Nom"]);
$per -> sautligne (17);
$per ->f0('index.php?uc=CONFD1','post','formGCS');
$per ->submit(940,200,' ACTIVER LE COMPTE VETERINAIRE');
$per ->hide(100,100,'IDP',20,$IDP);
$per ->f1();
?>