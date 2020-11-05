<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,150,180,'AJOUT COMMUNE ');
$per -> sautligne (17);
$per ->f0('./index.php?uc=AJOUTCOMMUNE1','post','formGCS');
$per ->submit(995,240,' AJOUT COMMUNE');




                                                  $per ->WILAYA1(260,250,'WILAYA','grh','wil'); 
                                                  $per ->DAIRA2(260,280,'DAIRA'); 


$per ->label(100,250,'WILAYA');                   //$per ->WILAYAR(260,250,'WILAYA','grh','wil'); 
$per ->label(100,280,'NOM DAIRA');                //$per ->txt(260,280,'DAIRA',25,'');
$per ->label(100,310,'NOM COMMUNEFR');            $per ->txt(260,310,'COMMUNEFR',25,'');
$per ->label(100,340,'NOM COMMUNEAR');            $per ->txt(260,340,'COMMUNEAR',25,'');









$per ->f1();

?>