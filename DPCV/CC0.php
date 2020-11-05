<?php
$NOM=$_GET["NOM"];
$PRENOM=$_GET["PRENOM"];
$AVN=$_GET["AVN"];
$DATE=$_GET["DATE"];
$WIL=$_GET["WIL"];
$DAI=$_GET["DAI"];
$COM=$_GET["COM"];

$ADRESSE=$_GET["ADRESSE"];
$ANNEE=$_GET["ANNEE"];

include('./SESSION/SESSION.php'); 
$per ->h(2,150,180,'accord de participation aux campagnes de vaccination AU Dr:'.$NOM."  AVN: ".$PRENOM.$AVN);
$per -> sautligne (17);
$per ->f0('./DPCV/cc.php','post','formGCS');
$per ->submit(995,500,' IMPRIMER MANDAT/CAHIER DE CHARGE');
$per ->label(100,250,'* AVN : '.$AVN);                           
$per ->label(1000,250,'* Pour Annee:'.$ANNEE);                                   
$per ->label(500,250,'* Date : '.$DATE);                    
$per ->label(100,280,'* Nom Vétérinaire : '.$NOM);                
$per ->label(500,280,'* Prenom Vétérinaire : '.$PRENOM);          
$per ->label(100,310,'* Wilaya : '.$per->nbrtowil1('vaccinvet','wil',$WIL));                       
$per ->label(500,310,'* Daira : '.$per->nbrtodai('vaccinvet','dai',$DAI));                       
$per ->label(700,310,'* Commune : '.$per->nbrtocom3('vaccinvet','comm',$COM));                                     
$per ->label(1000,310,'*Adresse :'.$ADRESSE);                                      

$per ->label(100,340,'* Cahier Des Charges N°');                 $per ->txt(350,340,'ncc',10,'');
$per ->label(500,340,'* Date : ');                               $per ->datetime (600,340,'datecc'); 

$per ->label(100,370,'* Bovins :');                              $per ->txt(350,370,'bovins',10,'');
$per ->label(500,370,'* Ovins : ');                              $per ->txt(600,370,'ovins',10,''); 
$per ->label(1000,370,'* caprins : ');                              $per ->txt(1100,370,'caprins',10,''); 

$per ->label(100,400,'* Decision Mandat Sanitaire  N° :');       $per ->txt(350,400,'nms',10,'');     
$per ->label(500,400,'* Date : ');                               $per ->datetime (600,400,'datems');     



//hide valeur
$per ->hide(10,10,'NOM',20,$_GET["NOM"]);
$per ->hide(10,10,'PRENOM',20,$_GET["PRENOM"]);
$per ->hide(10,10,'AVN',20,$_GET["AVN"]);
$per ->hide(10,10,'WIL',20,$_GET["WIL"]);
$per ->hide(10,10,'DAI',20,$_GET["DAI"]);
$per ->hide(10,10,'COM',20,$_GET["COM"]);  
$per ->hide(10,10,'USER',20,$_SESSION["USER"]);
$per ->hide(10,10,'ANNEE',20,$_GET["ANNEE"]);  
?>
