<?php
require('../PDF/invoice.php');
require('../PDF/EVA.php');
//VERIFICATION DES ENTREES remaque (PETIT Y=annee 2 en chifres grand y annee en 4 chifre) 
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
//AFFECTATION de la date de selection dans lancien exemple sans condition 
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
//condition si date1 ET SUP A DATE2  pose probleme
if ($datejour1>$datejour2)
{
header("Location:../index.php?uc=EVAPTS1") ;
}
//*******************************************************************************************************// 
$datejour =date("d-m-Y ");
//******************************************************************************************************//
$pdf = new EVA( 'P', 'mm', 'A4' );
$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
$pdf->Image('../IMAGES/logoao.gif',5,5,15,15,0);
$pdf->Text(20,13,"Wilaya de : Djelfa ");$pdf->Text(100,13,"Structure :PTS EPH AIN OUSSERA");
$pdf->Text(20,18,"TEL:027/82/32/88");
$pdf->Text(20,23,"DU");$pdf->Text(27,23,$datejour11);$pdf->Text(47,23,"AU");$pdf->Text(55,23,$datejour22);

$pdf->Text(100,18,"FAX:027/82/21/37");
$pdf->Text(150,18,"Adresse:EPH AIN OUSSERA");
$pdf->SetXY(5,19);
$pdf->Cell(198,8,'________________________________________FICHE D EVALUATION________________________________________',0,1,'C');
//UNITE COLLECTE
$pdf->SetXY(5,28);
$pdf->Cell(198,8,'__________________________________________UNITE COLLECTE__________________________________________',0,1,'C');
$pdf->Rect(5, 38, 198, 42 ,"d");
$pdf->SetXY(10,43);
$pdf->Cell(55,8,'Nombre de dons de sang total',1,1,'L');
$pdf->SetXY(10,51);
$pdf->Cell(55,8,'Dons réguliers',1,1,'L');
$pdf->SetXY(10,59);
$pdf->Cell(55,8,'Dons occasionnels et familiaux',1,1,'L');
$pdf->SetXY(10,67);
$pdf->Cell(55,8,'Total dons',1,1,'L');
$pdf->SetXY(65,43);
$pdf->Cell(15,8,'Fixe',1,1,'C');
$pdf->SetXY(80,43);
$pdf->Cell(15,8,'Mobile',1,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(65,51);
$pdf->Cell(15,8,$pdf->collecte('regulier','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(80,51);
$pdf->Cell(15,8,$pdf->collecte('regulier','mobile',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(65,59);
$pdf->Cell(15,8,$pdf->collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(80,59);
$pdf->Cell(15,8,$pdf->collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(65,67);
$pdf->Cell(15,8,$pdf->collecte('regulier','fixe',$datejour1,$datejour2)+$pdf->collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(80,67);
$pdf->Cell(15,8,$pdf->collecte('regulier','mobile',$datejour1,$datejour2)+$pdf->collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
//*******//
$pdf->SetXY(100,43);
$pdf->Cell(55,8,'Donneur Aphérèse prélevé',1,1,'L');
$pdf->SetXY(155,43);
$pdf->Cell(45,8,'00',1,1,'C');
$pdf->SetXY(100,51);
$pdf->Cell(100,8,'Nombre De Donneurs Contre Indiqués (CI)',1,1,'C');
$pdf->SetXY(100,59);
$pdf->Cell(55,5.3,'C.I.Temporaires',1,1,'L');
$pdf->SetXY(155,59);
$pdf->Cell(45,5.3,$pdf->indication('CIDT',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,64.3);
$pdf->Cell(55,5.5,'C.I.Definitives',1,1,'L');
$pdf->SetXY(155,64.3);
$pdf->Cell(45,5.3,$pdf->indication('CIDD',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,69.8);
$pdf->Cell(55,5.2,'Total',1,1,'L');
$pdf->SetXY(155,69.8);
$pdf->Cell(45,5.2,$pdf->indication('CIDT',$datejour1,$datejour2)+$pdf->indication('CIDD',$datejour1,$datejour2),1,1,'C');

//UNITE PREPARATION
$pdf->SetXY(5,80);
$pdf->Cell(198,8,'________________________________________UNITE PREPARATION________________________________________',0,1,'C');
$pdf->Rect(5, 90, 198, 83 ,"d");
//***********************************************************
$pdf->dnc(10,95,'Nombre de dons non conformes');
$pdf->lignednc(10,103,'ST Quantité non suffisante',$pdf->PREPARATION('VI',$datejour1,$datejour2));
$pdf->lignednc(10,111,'Poches non conformes','0');
$pdf->lignednc(10,119,'Fuite defaut de soudure',$pdf->PREPARATION('FDS',$datejour1,$datejour2));
$pdf->lignednc(10,127,'Aspect coagulé',$pdf->PREPARATION('AC',$datejour1,$datejour2));
$pdf->lignednc(10,135,'CPA quantite insuffisante','0');
$pdf->lignednc(10,143,'Fuite defaut de soudure','0');
$pdf->lignednc(10,151,'Autres','0');
$pdf->lignednc(10,159,'Total dons st validés','0');
//***********************************************************
$pdf->entetepslprecon(85,95,'Nombre de PSL');
$pdf->entetepslprecon(85,103,'preparés conformes');
$pdf->lignepslprecon(85,111,'ST',$pdf->PREPARATION('null',$datejour1,$datejour2));
$pdf->lignepslprecon(85,119,'CGR',$pdf->PREPARATION('CGR',$datejour1,$datejour2));
$pdf->lignepslprecon(85,127,'PFC',$pdf->PREPARATION('PFC',$datejour1,$datejour2));
$pdf->lignepslprecon(85,135,'CPS',$pdf->PREPARATION('CPS',$datejour1,$datejour2));
$pdf->lignepslprecon(85,143,'CUP',$pdf->PREPARATION('null',$datejour1,$datejour2));
$pdf->lignepslprecon(85,151,'CRYO',$pdf->PREPARATION('null',$datejour1,$datejour2));
$pdf->lignepslprecon(85,159,'Total PSL',$pdf->PREPARATION('CGR',$datejour1,$datejour2)+$pdf->PREPARATION('PFC',$datejour1,$datejour2)+$pdf->PREPARATION('CPS',$datejour1,$datejour2));
//***********************************************************
$pdf->entetepslprencon(127,95);
$pdf->pslprencon(127,95,'CGR','0','Aspect coagulé','0','*','0');
$pdf->pslprencon(127,113.5,'PFC','0','PFC non comforme','0','*','0');
$pdf->pslprencon(127,132,'CPS','0','Contaminés par GR','0','*','0');

// $pdf->SetXY(100,112);
// $pdf->Cell(65,8,'Nombre Psl Non Etiquetes',1,1,'L');
// $pdf->SetXY(165,112);
// $pdf->Cell(30,8,PREPARATION('VI',$datejour1,$datejour2)+PREPARATION('FDS',$datejour1,$datejour2)+PREPARATION('AC',$datejour1,$datejour2)+PREPARATION('PCC',$datejour1,$datejour2)+PREPARATION('PL',$datejour1,$datejour2)  ,1,1,'C');
// $pdf->SetXY(100,120);
// $pdf->Cell(65,8,'Volume insufisant',1,1,'L');
// $pdf->SetXY(165,120);
// $pdf->Cell(30,8,PREPARATION('VI',$datejour1,$datejour2) ,1,1,'C');
// $pdf->SetXY(100,128);
// $pdf->Cell(65,8,'Fuite Défaut Soudure',1,1,'L');
// $pdf->SetXY(165,128);
// $pdf->Cell(30,8,PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');
// $pdf->SetXY(100,136);
// $pdf->Cell(65,8,'Aspect Coagule',1,1,'L');
// $pdf->SetXY(165,136);
// $pdf->Cell(30,8,PREPARATION('AC',$datejour1,$datejour2) ,1,1,'C');
// $pdf->SetXY(100,144);
// $pdf->Cell(65,8,'PFC/CP Contamine',1,1,'L');
// $pdf->SetXY(165,144);
// $pdf->Cell(30,8,PREPARATION('PCC',$datejour1,$datejour2) ,1,1,'C');
// $pdf->SetXY(100,152);
// $pdf->Cell(65,8,'PFC Lipemique ',1,1,'L');
// $pdf->SetXY(165,152);
// $pdf->Cell(30,8,PREPARATION('PL',$datejour1,$datejour2),1,1,'C');
// $pdf->SetXY(100,160);
// $pdf->Cell(65,8,'Sérologies Positives',1,1,'L');
// $pdf->SetXY(165,160);
// $pdf->Cell(30,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
// $pdf->SetXY(100,168);
// $pdf->Cell(65,8,'Autres',1,1,'L');
// $pdf->SetXY(165,168);
// $pdf->Cell(30,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
// $pdf->SetTextColor(225,0,0);

//UNITE QUALIFICATIONS BIOLOGIQUES
$pdf->Immuno($pdf->immunologie($datejour1,$datejour2));
$pdf->enteteserologie();
$pdf->ligneserologie(216.5,'HIV', $pdf->qualification('HIV',$datejour1,$datejour2), $pdf->qualificationdp('HIV','douteux',$datejour1,$datejour2), $pdf->qualificationdp('HIV','douteux', $datejour1,$datejour2), $pdf->qualificationdp('HIV','Positif',$datejour1,$datejour2),'');
$pdf->ligneserologie(223  ,'HBS', $pdf->qualification('HVB',$datejour1,$datejour2), $pdf->qualificationdp('HVB','douteux',$datejour1,$datejour2), $pdf->qualificationdp('HVB','douteux', $datejour1,$datejour2), $pdf->qualificationdp('HVB','Positif',$datejour1,$datejour2),''); 
$pdf->ligneserologie(229.5,'HCV', $pdf->qualification('HVC',$datejour1,$datejour2), $pdf->qualificationdp('HVC','douteux',$datejour1,$datejour2), $pdf->qualificationdp('HVC','douteux', $datejour1,$datejour2), $pdf->qualificationdp('HVC','Positif',$datejour1,$datejour2),''); 
$pdf->ligneserologie(236  ,'SYPH',$pdf->qualification('TPHA',$datejour1,$datejour2),$pdf->qualificationdp('TPHA','douteux',$datejour1,$datejour2),$pdf->qualificationdp('TPHA','douteux',$datejour1,$datejour2), $pdf->qualificationdp('TPHA','Positif',$datejour1,$datejour2),''); 
$pdf->ligneserologie(242.5,'PALU','0','0','0','0',''); 

//UNITE DISTRIBUTION
$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
$pdf->Image('../IMAGES/logoao.gif',5,5,15,15,0);
$pdf->Text(20,13,"Wilaya de : Djelfa ");$pdf->Text(100,13,"Structure :PTS EPH AIN OUSSERA");
$pdf->Text(20,18,"TEL:027/82/32/88");
$pdf->Text(20,23,"DU");$pdf->Text(27,23,$datejour11);$pdf->Text(47,23,"AU");$pdf->Text(55,23,$datejour22);
$pdf->Text(100,18,"FAX:027/82/21/37");
$pdf->Text(150,18,"Adresse:EPH AIN OUSSERA");
$pdf->SetXY(5,19);
$pdf->Cell(198,8,'________________________________________FICHE D EVALUATION________________________________________',0,1,'C');
$pdf->SetXY(5,28);
$pdf->Cell(198,8,'__________________________________________UNITE DISTRIBUTION__________________________________________',0,1,'C');
$pdf->Rect(5, 38, 198, 220 ,"d");
$pdf->psl(40,'','ST','CGR','PFC','CP','CPA','CRYO');
$pdf->psl(40+8,'PSL qualifiés et étiquetés','','','','','','');
$pdf->psl(40+16,'Stock Debut d Annee','','','','','','');
$pdf->psl(40+24,'Stock fin d Annee','0','0','0','0','0','0');
$pdf->psl(40+32,'produit périmés durant l\'année écoulée','0','0','0','0','0','0');
$pdf->entetedistributionim(90);
$pdf->lignedistributionim(90,'Service','ST','CGR','PFC','CP','CPA','CRYO');
//***CHIRURGIE homme +femme
$pdf->lignedistributionim(98,'Chirurgie',$pdf->distribution('CHIRURGIE HOMME','ST',$datejour1,$datejour2)+$pdf->distribution('CHIRURGIE FEMME','ST',$datejour1,$datejour2),$pdf->distribution('CHIRURGIE HOMME','CGR',$datejour1,$datejour2)+$pdf->distribution('CHIRURGIE FEMME','CGR',$datejour1,$datejour2),$pdf->distribution('CHIRURGIE HOMME','PFC',$datejour1,$datejour2)+$pdf->distribution('CHIRURGIE FEMME','PFC',$datejour1,$datejour2),$pdf->distribution('CHIRURGIE HOMME','CPS',$datejour1,$datejour2)+$pdf->distribution('CHIRURGIE FEMME','CPS',$datejour1,$datejour2),'***','***');
//***GYNECO-OBS 
$pdf->lignedistributionim(106,'Gyneco-obs',$pdf->distribution('GYNECO','ST',$datejour1,$datejour2)+$pdf->distribution('MATERNITE','ST',$datejour1,$datejour2),$pdf->distribution('GYNECO','CGR',$datejour1,$datejour2)+$pdf->distribution('MATERNITE','CGR',$datejour1,$datejour2),$pdf->distribution('GYNECO','PFC',$datejour1,$datejour2)+$pdf->distribution('MATERNITE','PFC',$datejour1,$datejour2),$pdf->distribution('GYNECO','CPS',$datejour1,$datejour2)+$pdf->distribution('MATERNITE','CPS',$datejour1,$datejour2),'***','***');
//***PEDIATRIE
$pdf->lignedistributionim(114,'Pediatrie',$pdf->distribution('PEDIATRIE','ST',$datejour1,$datejour2),$pdf->distribution('PEDIATRIE','CGR',$datejour1,$datejour2),$pdf->distribution('PEDIATRIE','PFC',$datejour1,$datejour2),$pdf->distribution('PEDIATRIE','CPS',$datejour1,$datejour2),'***','***');
//***HEMATOLOGIE
$pdf->lignedistributionim(122,'Hemato','***','***','***','***','***','***');
//***HEMOD
$pdf->lignedistributionim(130,'Hemod','***','***','***','***','***','***');
//***MED-INT medecine femme + medecine homme
$pdf->lignedistributionim(138,'Med-int',$pdf->distribution('MEDECINE HOMME','ST',$datejour1,$datejour2)+$pdf->distribution('MEDECINE FEMME','ST',$datejour1,$datejour2),$pdf->distribution('MEDECINE HOMME','CGR',$datejour1,$datejour2)+$pdf->distribution('MEDECINE FEMME','CGR',$datejour1,$datejour2),$pdf->distribution('MEDECINE HOMME','PFC',$datejour1,$datejour2)+$pdf->distribution('MEDECINE FEMME','PFC',$datejour1,$datejour2),$pdf->distribution('MEDECINE HOMME','CPS',$datejour1,$datejour2)+$pdf->distribution('MEDECINE FEMME','CPS',$datejour1,$datejour2),'***','***');
 //***UMC umc+bloca+blocb
$pdf->lignedistributionim(146,'Umc',$pdf->distribution('UMC','ST',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP A','ST',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP B','ST',$datejour1,$datejour2),$pdf->distribution('UMC','CGR',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP A','CGR',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP B','CGR',$datejour1,$datejour2),$pdf->distribution('UMC','PFC',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP A','PFC',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP B','PFC',$datejour1,$datejour2),$pdf->distribution('UMC','CPS',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP A','CPS',$datejour1,$datejour2)+$pdf->distribution('BLOC OPP B','CPS',$datejour1,$datejour2),'***','***');
//***AUTRES
$pdf->lignedistributionim(154,'Autre',$pdf->distribution('PTS','ST',$datejour1,$datejour2),$pdf->distribution('PTS','CGR',$datejour1,$datejour2),$pdf->distribution('PTS','PFC',$datejour1,$datejour2),$pdf->distribution('PTS','CPS',$datejour1,$datejour2),'***','***');
//***TOTAL
$pdf->lignedistributionim(162,'Total',$pdf->distributionpsl('ST',$datejour1,$datejour2),$pdf->distributionpsl('CGR',$datejour1,$datejour2),$pdf->distributionpsl('PFC',$datejour1,$datejour2),$pdf->distributionpsl('CPS',$datejour1,$datejour2),'***','***');
$pdf->pslne(174,555);
$pdf->incidenttrans(194);
//*******DISTRIBUTION EXTRA MURAUX **//   
$db_host="localhost";
$db_name="gpts2012"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from tdis1 LIMIT 10 ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->lignedistributionem(90);
$pdf->lignedistributionem1(90,'Etablissem','ST','CGR','PFC','CP','CPA','CRYO');
$pdf->SetXY(106,98);
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(20,8,"*****",1,0,'C',0);
   $pdf->cell(12,8,"***",1,0,'C',0);
   $pdf->cell(12,8,"***",1,0,'C',0);
   $pdf->cell(12,8,"***",1,0,'C',0);
   $pdf->cell(12,8,"***",1,0,'C',0);
   $pdf->cell(12,8,"***",1,0,'C',0);
   $pdf->cell(14,8,"***",1,0,'C',0);
   $pdf->SetXY(106,$pdf->GetY()+8); 
  }
$pdf->lignedistributionem1($pdf->GetY(),'Total','ST','CGR','PFC','CP','CPA','CRYO');
$pdf->Text(5,270," le responsable de la structure  ");
$pdf->Text(8,275," de transfusion sanguine");
$pdf->Text(18,280," DR TIBA");

$pdf->Text(140,270," Le Directeur de l'etablissement ");
//************************************distribution detail
$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
//$pdf->disa($datejour1,$datejour2);
$pdf->entetedistributionim(90);
$pdf->lignedistributionim(90,'Service','ST','CGR','PFC','CP','CPA','CRYO');
$pdf->lignedistributionimfin(98,'CHIR H','CHIRURGIE HOMME',$datejour1,$datejour2);
$pdf->lignedistributionimfin(106,'CHIR F','CHIRURGIE FEMME',$datejour1,$datejour2);
$pdf->lignedistributionimfin(114,'GYNECO','GYNECO',$datejour1,$datejour2);
$pdf->lignedistributionimfin(122,'MATE','MATERNITE',$datejour1,$datejour2);
$pdf->lignedistributionimfin(130,'PEDI','PEDIATRIE',$datejour1,$datejour2);
$pdf->lignedistributionimfin(138,'MEDE H','MEDECINE HOMME',$datejour1,$datejour2);
$pdf->lignedistributionimfin(146,'MEDE F','MEDECINE FEMME',$datejour1,$datejour2);
$pdf->lignedistributionimfin(154,'UMC','UMC',$datejour1,$datejour2);
$pdf->lignedistributionimfin(162,'BLOC A','BLOC OPP A',$datejour1,$datejour2);
$pdf->lignedistributionimfin(170,'BLOC B','BLOC OPP B',$datejour1,$datejour2);
$pdf->lignedistributionimfin(178,'HEMOD','HEMODIALYSE',$datejour1,$datejour2);
$pdf->lignedistributionimfin(186,'PTS','PTS',$datejour1,$datejour2);
$pdf->lignedistributionimtotal(194,'Total',$datejour1,$datejour2);
//*******************************************cdv**************************************//

function cdv($colone1,$colone2,$colone3,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select SEXE,AGE,datedon from tdon where SEXE='$colone1' and AGE >=$colone2  and AGE <=$colone3    and datedon >='$datejour1'and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $collecte=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $collecte;
}



$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
$H=10;
$pdf->SetXY(5,$H);
$pdf->Cell(50,32,'POPULATION',1,1,'C');
$pdf->SetXY(55,$H);
$pdf->Cell(25,8,'SEXE',1,1,'C');
$pdf->SetXY(80,$H);
$pdf->Cell(25,8,'00-14',1,1,'C');
$pdf->SetXY(105,$H);
$pdf->Cell(25,8,'15-24',1,1,'C');
$pdf->SetXY(130,$H);
$pdf->Cell(25,8,'25-49',1,1,'C');
$pdf->SetXY(155,$H);
$pdf->Cell(25,8,'+50',1,1,'C');
$pdf->SetXY(180,$H);
$pdf->Cell(25,8,'TOTAL',1,1,'C');
//msculin
$H=18;

$pdf->SetXY(55,$H);
$pdf->Cell(25,8,'masculin',1,1,'C');
$pdf->SetXY(80,$H);
$pdf->Cell(25,8,cdv('M',0,14,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(105,$H);
$pdf->Cell(25,8,cdv('M',15,24,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(130,$H);
$pdf->Cell(25,8,cdv('M',25,49,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(155,$H);
$pdf->Cell(25,8,cdv('M',50,100,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,$H);
$pdf->Cell(25,8,cdv('M',0,14,$datejour1,$datejour2)+cdv('M',15,24,$datejour1,$datejour2)+cdv('M',25,49,$datejour1,$datejour2)+cdv('M',50,100,$datejour1,$datejour2),1,1,'C');
//feminin
$H=26;
$pdf->SetXY(55,$H);
$pdf->Cell(25,8,'feminin',1,1,'C');
$pdf->SetXY(80,$H);
$pdf->Cell(25,8,cdv('F',0,14,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(105,$H);
$pdf->Cell(25,8,cdv('F',15,24,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(130,$H);
$pdf->Cell(25,8,cdv('F',25,49,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(155,$H);
$pdf->Cell(25,8,cdv('F',50,100,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,$H);
$pdf->Cell(25,8,cdv('F',0,14,$datejour1,$datejour2)+cdv('F',15,24,$datejour1,$datejour2)+cdv('F',25,49,$datejour1,$datejour2)+cdv('F',50,100,$datejour1,$datejour2),1,1,'C');

//total
$H=34;
$pdf->SetXY(55,$H);
$pdf->Cell(25,8,'total',1,1,'C');
$pdf->SetXY(80,$H);
$pdf->Cell(25,8,cdv('M',0,14,$datejour1,$datejour2)+cdv('F',0,14,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(105,$H);
$pdf->Cell(25,8,cdv('M',15,24,$datejour1,$datejour2)+cdv('F',15,24,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(130,$H);
$pdf->Cell(25,8,cdv('M',25,49,$datejour1,$datejour2)+cdv('F',25,49,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(155,$H);
$pdf->Cell(25,8,cdv('M',50,100,$datejour1,$datejour2)+cdv('F',50,100,$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,$H);
$pdf->Cell(25,8,cdv('M',0,14,$datejour1,$datejour2)+cdv('M',15,24,$datejour1,$datejour2)+cdv('M',25,49,$datejour1,$datejour2)+cdv('M',50,100,$datejour1,$datejour2)+cdv('F',0,14,$datejour1,$datejour2)+cdv('F',15,24,$datejour1,$datejour2)+cdv('F',25,49,$datejour1,$datejour2)+cdv('F',50,100,$datejour1,$datejour2),1,1,'C');

$pdf->Output();
?>


