<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_GET["IDP"];
$per ->h(2,60,180,'ACTIVATION DU COORDINATEUR VETERINAIRE : Dr '.$_GET["Nom"]);
$per -> sautligne (17);
$per ->f0('index.php?uc=ACTCOO1','post','formGCS');
$per ->submit(940,200,' ACTIVER LE COORDINATEUR VETERINAIRE');
$per ->hide(100,100,'IDP',20,$IDP);
$per ->f1();
?>