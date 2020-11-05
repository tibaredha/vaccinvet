<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,150,180,'WILAYA DAIRA COMMUNE ADRESSE ');
$per -> sautligne (17);
$per ->f0('./index.php?uc=WDCA1','post','formGCS');
$per ->submit(995,240,' OK');
$per ->label(100,370,'* Wilaya de residence');     $per ->WILAYA1(260,370,'WILAYA','vaccinvet','wil'); 
$per ->label(500,370,'* Daira de residence');      $per ->DAIRA2(670,370,'DAIRA'); 
$per ->label(900,370,'* Commune de residence');    $per ->COMMUNE3(1070,370,'COMMUNE'); 
$per ->f1();

?>