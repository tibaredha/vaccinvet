<?php 
// include('./SESSION/SESSION.php'); 
$per ->h(2,80,170,'Demande de participation aux campagnes de vaccination : V.A.C , V.A.A , V.A.R , V.A.B ');
$per -> sautligne (17);
$per ->f0('./DPCV/FVAC.php','post','formGCS');
$per ->submit(1110,450,'Imprimer Demande');

$Jour=array(date('Y'),date('Y')+1,date('Y')+2,date('Y')+3,date('Y')+4);
$per ->label(80,250,'* ANNEE');                    $per ->combov(200,250,'ANNEE',$Jour)  ;
$per ->label(450,250,'* Date/Heure');              $per ->datetime (580,250,'a1');$per ->txt(740,250,'a2',2,date("H:i"));



$per ->label(80,290,'* Nom Veterinaire');          $per ->txt(200,290,'a3',29,'');
$per ->label(450,290,'* Prenom Veterinaire');      $per ->txt(580,290,'a4',29,'');
$per ->label(1000,290,'* AVN');                    $per ->txt(1065,290,'a5',29,'');



$per ->h(2,80,320,'Praticien privé installé à la : ');
$per ->label(80,390,'* Wilaya ');                  $per ->WILAYA1(200,390,'WILAYAR','vaccinvet','wil'); 
$per ->label(450,390,'* Daira ');                  $per ->DAIRA2(580,390,'DAIRA'); 
$per ->label(800,390,'* Commune ');                $per ->COMMUNE3(880,390,'COMMUNER');                 
$per ->label(1000,390,'* Adresse ');               $per ->txt(1065,390,'ADRESSE',29,'');           
$per ->f1();
$per ->label(80,525,'(*)champ obligatoire'); 

?>