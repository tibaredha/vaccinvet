<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'CERTIFICAT DE VACCINATION Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (10);
$per ->f0('./1VAC/FVACC.php','post','formGCS');
$per ->submit(1110,250,'IMPRIMER CERTIFICAT');
$per ->label(80,250,'* BILAN N°:');                $per ->txt(200,250,'bilan',10,'0');
$per ->label(300,250,'* N°:');                     $per ->txt(338,250,'N',6,'0');
$per ->label(450,250,'* Date/Heure: y-m-j');              $per ->datetime (580,250,'a1');$per ->txt(740,250,'a2',2,date("H:i"));
$per ->label(80,280,'* Nom Propriétaire');         $per ->txt(200,280,'a3',29,'x');
$per ->label(450,280,'* Prenom Propriétaire');     $per ->txt(580,280,'a4',29,'x');
$per ->label(1000,280,'* Fils De');                $per ->txt(1065,280,'a5',29,'x');
$per ->label(80,310,'* N°CIN/PC');                 $per ->txt(200,310,'a6',29,'0');
$per ->label(450,310,'* Delivre Le');              $per ->datetime(580,310,'a7');
$per ->label(800,310,'* Daira De');                $per ->txt(880,310,'a8',15,'x');
$per ->label(1020,310,'CFN');                      $per ->txt(1065,310,'a9',29,'x');
$per ->label(80,340,'* Wilaya ');                  $per ->WILAYA1(200,340,'WILAYAR','vaccinvet','wil'); 
$per ->label(450,340,'* Daira ');                  $per ->DAIRA2(580,340,'DAIRA'); 
$per ->label(800,340,'* Commune ');                $per ->COMMUNE3(880,340,'COMMUNER');                 
$per ->label(1000,340,'* Adresse ');               $per ->txt(1065,340,'ADRESSE',29,'x');           
$per ->hide(10,10,'WIL',20,$_SESSION["WILAYA"]);
$per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
$per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
$per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
$per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
$per ->label(80,370,'* Nombre ');               $per ->txt(200,370,'NBR',29,'0'); 
echo"<BR>";
echo"<BR>";
echo "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" align=\"center\">";
$per ->ENTETEVACCINCC ("VACCIN /ANIMAL","CHIEN M","CHIEN F","CHAT M","CHAT F","Agneaux","Agnelles","Caprins","Total","Doses Perdues") ; 
$per ->LIGNEVACCINCC  ("ANTI-RABIQUE","b1","b2","b3","b4","b5","b6","b7","b8","DPb","ANTIRABIQUECC") ;
echo "</table>";
echo"<BR>";
$per ->f1();
$per ->label(80,590,'(*)champ obligatoire'); 

?>