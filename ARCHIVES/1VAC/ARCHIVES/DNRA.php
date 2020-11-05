<?php 
include('./SESSION/SESSION.php'); 
include('./STAT/site.php');
include('./class/class.php');
$per ->h(2,500,180,'NOUVEAU DONNEUR');
$per -> sautligne (2);
$per -> photos(1000,250);
$per ->f0('./1dnr/FDNR.php','post');
$per ->submit(100,490,'Enregistrer Donneur');
$per ->label(100,250,'Structure');              $per ->combov(260,250,'STR',array("FIXE", "MOBILE")); 
$per ->label(500,250,'Date/heure');             $per ->datetime (670,250,'DATE');$per ->txt(820,250,'HDP',4,date("H:i"));
$per ->label(100,280,'Nom');                    $per ->txt(260,280,'NOMDNR',29,'');
$per ->label(500,280,'Prénom');                 $per ->txt(670,280,'PRENOMDNR',29,'');
$per ->label(100,310,'Sexe');                   $per ->combov(260,310,'SEXE',array("M", "F")); 
$per ->label(500,310,'Né(e) Le');               $per ->datetime (670,310,'DATENAISSANCE');
//combo dynamique avec ajax qui marche bien necessitan 3 fichies js.js ajax.php classe.php  
$per ->label(100,340,'Wilaya de naissance');    $per ->WILAYAN(260,340,'WILAYAN','grh','wil');  //$per ->combodyn(260,340,'WILAYA','gpts2012','wil'); //$per ->combo(260,340,'WILAYA','gpts2012','wil');
$per ->label(500,340,'Commune de naissance');   $per ->COMMUNEN(670,340,'COMMUNEN');            //$per ->combodyn1(670,340);                          //$per ->combo(670,340,'COMMUNE','gpts2012','com');

$per ->label(100,370,'Wilaya de residence');     $per ->WILAYAR(260,370,'WILAYAR','grh','wil'); //$per ->combodyn2(260,370,'WILAYAR','gpts2012','wil');//$per ->combo(260,370,'WILAYAR','gpts2012','wil');
$per ->label(500,370,'Commune de residence');    $per ->COMMUNER(670,370,'COMMUNER');           //$per ->combodyn12(670,370);                          //$per ->combo(670,370,'COMMUNER','gpts2012','com');

$per ->label(100,400,'Adresse de residence');   $per ->txt(260,400,'ADRESSE',29,'');
$per ->label(500,400,'Telephone');              $per ->txt(670,400,'TELEPHONE',29,'');
$per ->label(100,430,'Type donneur');           $per ->combov(260,430,'TDNR',array("OCCASIONNEL", "REGULIER")); 
$per ->label(500,430,'Type don');               $per ->combov(670,430,'TDON',array("NORMAL", "APHERESE")); 
$per ->label(100,460,'Poids en kg');            $per ->nbr(260,460,'POIDS','10');
$per ->label(500,460,'TA  en mmHG');            $per ->txt(670,460,'TA',29,'');
$per ->f1();
$per -> sautligne (14);
?>




 
