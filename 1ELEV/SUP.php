<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_GET["IDP"];
$per ->h(2,150,180,' Confirmation Suppression Eleveur');
$per -> sautligne (17);
$per ->f0('index.php?uc=SUPELEV1','post','formGCS');
$per ->submit(940,200,'Suppression Eleveur');
$per ->hide(100,100,'IDP',20,$IDP);
$per ->f1();
?>