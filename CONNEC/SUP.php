<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_GET["IDP"];
$per ->h(2,150,180,'SUPPRESSION VETERINAIRE');
$per -> sautligne (17);
$per ->f0('index.php?uc=SUP1','post','formGCS');
$per ->submit(940,200,'SUPPRESSION VETERINAIRE');
$per ->hide(100,100,'IDP',20,$IDP);
$per ->f1();
?>