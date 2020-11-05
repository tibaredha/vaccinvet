<?php
include('./SESSION/SESSION.php'); 
$IDP = $_GET["IDP"] ; 
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "SELECT * FROM elev WHERE idelev = ".$IDP ;
$requete = mysql_query( $sql ) ; 
if( $result = mysql_fetch_object( $requete ) )
{
$per ->h(2,80,180,'ORDONNANCE  Dr: '.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (10);
//$per ->f0('./1VAC/FVACELEV.php','post','formGCS');
$per ->f0('./1VAC/xxx.php','post','formGCS');
$per ->submit(1150,250,'IMPRIMER ORDONNANCE');
$per ->label(80,250,'* BILAN N°:');                                                     $per ->txt(200,250,'bilan',10,'0');
$per ->label(300,250,'* N°:');                                                          $per ->txt(338,250,'N',6,'0');
$per ->label(450,250,'* Date/Heure');                                                   $per ->txt(580,250,'a1',20,date('Y-m-d')); $per ->txt(740,250,'a2',2,date("H:i"));
$per ->label(80,280,'Nom Eleveur :<strong> '.$result->nomelev.'</strong>');             $per ->hide(200,280,'a3',29,$result->nomelev);
$per ->label(450,280,'Prenom Eleveur : <strong> '.$result->prenomelev.'</strong>');     $per ->hide(580,280,'a4',29,$result->prenomelev);
$per ->label(1000,280,'Fils De : <strong> '.$result->filsde.'</strong>' );              $per ->hide(1065,280,'a5',29,$result->filsde);
$per ->label(80,310,'N°CIN/PC : <strong> '.$result->nicnpc .'</strong>');               $per ->hide(200,310,'a6',29,$result->nicnpc);
$per ->label(450,310,'Delivre Le : <strong> '.$per->dateUS2FR($result->delivre).'</strong>');                   $per ->hide(580,310,'a7',20,$result->delivre);
$per ->label(800,310,'Daira De : <strong> '.$result->dairade.'</strong>');                                      $per ->hide(880,310,'a8',15,$result->dairade);
$per ->label(1000,310,'CFN: <strong> '.$result->CFN.'</strong>');                                               $per ->hide(1065,310,'a9',29,$result->CFN);
$per ->label(80,340,'Wilaya : <strong> '.$per->nbrtowil1('vaccinvet','wil',$result->WILAYAR).'</strong>');      $per ->hide(200,340,'WILAYAR',10,$result->WILAYAR);
$per ->label(450,340,'Daira : <strong> '.$per->nbrtodai('vaccinvet','dai',$result->DAIRA).'</strong>');         $per ->hide(580,340,'DAIRA',10,$result->DAIRA);
$per ->label(800,340,'Commune : <strong> '.$per->nbrtocom3('vaccinvet','comm',$result->COMMUNER).'</strong>');  $per ->hide(880,340,'COMMUNER',10,$result->COMMUNER);                
$per ->label(1000,340,'Adresse : <strong> '.$result->ADRESSE);                                                  $per ->hide(1065,340,'ADRESSE',29,$result->ADRESSE);           
$per ->hide(10,10,'WIL',20,$_SESSION["WILAYA"]);
$per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
$per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
$per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
$per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
echo"<BR>";
echo "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" align=\"center\">";
// $per ->ENTETEVACCIN ("TYPE VACCIN","Brebis","Béliers","Antenais","Antenaisses","Agneaux","Agnelles","Caprins","Total","Doses Perdues") ; 
// $per ->LIGNEVACCIN ("ANTI-CLAVELEUSE","b1","b2","b3","b4","b5","b6","b7","b8","DPb","CLAVELEUSE") ;
// $per ->LIGNEVACCIN ("ANTI-BRUCELLIQUE","c1","c2","c3","c4","c5","c6","c7","c8","DPc","BRUCELLIQUE") ;
// $per ->LIGNEVACCIN ("PPR","x1","x2","x3","x4","x5","x6","x7","x8","DPx","PESTE") ;


echo "</table>";
echo"<BR>";
echo "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" align=\"center\">";
// $per ->ENTETEVACCIN1 ("TYPE VACCIN","Vaches Laitières","Génisses","Taureaux","Taurillons","Veaux","Velles","Total","Doses Perdues") ; 
// $per ->LIGNEVACCIN1 ("ANTI-APHTEUSE","d1","d2","d3","d4","d5","d6","d7","DPd","APHTEUSE") ;
// $per ->LIGNEVACCIN1 ("ANTI-RABIQUE","e1","e2","e3","e4","e5","e6","e7","DPe","RABIQUE") ;
echo "</table>";
$per ->f1();
$per ->label(80,590,'(*)champ obligatoire'); 
}
?>