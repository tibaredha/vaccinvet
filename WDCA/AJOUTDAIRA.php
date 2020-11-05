<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,150,180,'AJOUT DAIRA ');
$per -> sautligne (17);
$per ->f0('./index.php?uc=AJOUTDAIRA1','post','formGCS');
$per ->submit(995,240,' AJOUT DAIRA');
$per ->label(100,250,'WILAYA');                 $per ->WILAYAR(260,250,'WILAYA','grh','wil'); 
$per ->label(100,280,'NOM DAIRAFR');            $per ->txt(260,280,'DAIRA',25,'');
$per ->label(100,310,'NOM DAIRAAR');            $per ->txt(260,310,'DAIRAAR',25,'');
$per ->f1();

?>