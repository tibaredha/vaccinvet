<?php 
$IDVAC=$_GET["IDVAC"];
include('./SESSION/SESSION.php'); 

$per ->h(2,150,180,'SUPPRESSION ACTE VACCINATION');
$per -> sautligne (17);
$per ->f0('index.php?uc=SUPVAC1','post','formGCS');
$per ->submit(940,200,'SUPPRESSION ACTE VACCINATION');
$per ->hide(100,100,'IDVAC',20,$IDVAC);
$per ->f1();
?>