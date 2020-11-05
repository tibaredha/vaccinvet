<?php 
include('./SESSION/SESSION.php'); 

$per ->h(2,400,180,'NOUVEAU VACCIN');
$per -> sautligne (2);

$per ->f0('index.php?uc=AJPRO1','post','formGCS');
$per ->submit(100,490,'Enregistrer Produit');
$per ->label(100,250,'Date/heure');                $per ->datetime (260,250,'DATE');$per ->txt(410,250,'HDP',4,date("H:i"));
$per ->label(100,280,'Nom Du Produit');            $per ->txt(260,280,'produit',29,'');
$per ->label(100,340,'Fournisseur Produit');       $per ->txt(260,340,'NFOUR',29,'');
$per ->label(100,370,'Wilaya de residence');       $per ->WILAYAR(260,370,'WILAYAR','grh','wil'); //$per ->combodyn2(260,370,'WILAYAR','gpts2012','wil');//$per ->combo(260,370,'WILAYAR','gpts2012','wil');
$per ->label(500,370,'Commune de residence');      $per ->COMMUNER(670,370,'COMMUNER');           //$per ->combodyn12(670,370);                          //$per ->combo(670,370,'COMMUNER','gpts2012','com');
$per ->label(100,400,'Adresse de residence');      $per ->txt(260,400,'ADRESSE',29,'');
$per ->label(500,400,'Telephone');                 $per ->txt(670,400,'TELEPHONE',29,'');
$per ->label(100,460,'prix base');                 $per ->txt(260,460,'prix',29,'');  
$per ->label(500,460,'quantite seuil');            $per ->txt(670,460,'qts',29,''); 
$per ->f1();
$per -> sautligne (14);
?>
