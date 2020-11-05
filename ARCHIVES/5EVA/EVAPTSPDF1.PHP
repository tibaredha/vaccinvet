<?php
//ancienne fiche devaluation 
//fonctions 
function collecte($colone1,$colone2,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select TDNR,STR,datedon from tdon where tdnr='$colone1'and str='$colone2'and datedon >='$datejour1'and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $collecte=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $collecte;
}
function indication($ind,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select IND,datedon from tdon where  ind ='$ind' and datedon >='$datejour1' and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $indication=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $indication;
}
function PREPARATION($colone,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone='on'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $PREPARATION=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $PREPARATION;
}
function qualification($colone,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $qualification=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualification;
}
function qualificationdp($colone,$dp,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone='$dp'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $qualificationdp=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualificationdp;
}
function immunologie($datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select GROUPAGE,datedon from tdon where GROUPAGE!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $immunologie=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $immunologie;
}
function immunologie1($datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select GROUPAGE,datedon from tdon where GROUPAGE=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $immunologie1=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $immunologie1;
}

function distribution($service,$PSL,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql= "select service,PSL from tdis1 where PSL='$PSL' and service ='$service' and condate >='$datejour1' and condate <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $distribution=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $distribution;
}
function distributionpsl($PSL,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql= "select PSL from tdis1 where PSL='$PSL' and condate >='$datejour1' and condate <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $distribution=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $distribution;
}







//******************************************************************************************************//
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

// echo $datejour1;
// echo "</br>";
// echo $datejour2;
// echo "</br>";
// echo $datejour11;
// echo "</br>";
// echo $datejour22;
// echo "</br>";
//*******************************************************************************************************// 
$datejour =date("d-m-Y ");
// ECHO $datejour;
//******************************************************************************************************//
require('../PDF/invoice.php');
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
$pdf->Image('../IMAGES/logoao.gif',100,5,15,15,0);
$pdf->Text(1,5,"MINISTERE DE LA SANTE DE LA POPULATION");$pdf->Text(150,5,"AGENCE NATIONALE DU SANG");
$pdf->Text(8,10,"ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(6,15,"EPH AIN OUSSERA WILAYA DE DJELFA");
$pdf->SetFont('Arial','B',15);
$pdf->Text(80,30,"FICHE D EVALUATION");
$pdf->SetFont('Arial','B',10);
$pdf->Text(5,40,"STRUCTURE DE TRANSFUSION SANGUINE ");
$pdf->SetTextColor(225,0,0);
$pdf->SetXY(83,35);
$pdf->Cell(53,8,'PTS AIN OUSSERA',1,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->Text(150,35,$datejour);
$pdf->Text(150,40,"TEL:027/82/32/88");
$pdf->Text(150,45,"FAX:027/82/21/37");
$pdf->Text(150,50,"E-MAIL:TIBAREDHA@YAHOO.FR");

$pdf->Text(83,50,"DU");
$pdf->Text(90,50,$datejour11);
$pdf->Text(110,50,"AU");
$pdf->Text(118,50,$datejour22);
//UNITE COLLECTE
$pdf->SetTextColor(225,0,0);
$pdf->Text(5,70,"UNITE COLLECTE");
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,75);
$pdf->Cell(38,8,'Nombre de dons total',1,1,'L');
$pdf->SetXY(5,83);
$pdf->Cell(38,8,'Dons réguliers',1,1,'L');
$pdf->SetXY(5,91);
$pdf->Cell(38,8,'Dons occasionnels',1,1,'L');
$pdf->SetXY(5,99);
$pdf->Cell(38,8,'Total dons',1,1,'L');

$pdf->SetXY(43,75);
$pdf->Cell(15,8,'Fixe',1,1,'C');
$pdf->SetXY(58,75);
$pdf->Cell(15,8,'Mobile',1,1,'C');
$pdf->SetXY(73,75);
$pdf->Cell(15,8,'Total',1,1,'C');
$pdf->SetXY(43,83);
$pdf->Cell(15,8,collecte('regulier','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(58,83);
$pdf->Cell(15,8,collecte('regulier','mobile',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(73,83);
$pdf->Cell(15,8,collecte('regulier','fixe',$datejour1,$datejour2)+collecte('regulier','mobile',$datejour1,$datejour2),1,1,'C');


$pdf->SetXY(43,91);
$pdf->Cell(15,8,collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(58,91);
$pdf->Cell(15,8,collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(73,91);
$pdf->Cell(15,8,collecte('Occasionnel','fixe',$datejour1,$datejour2)+collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');


$pdf->SetXY(43,99);
$pdf->Cell(15,8,collecte('regulier','fixe',$datejour1,$datejour2)+collecte('Occasionnel','fixe',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(58,99);
$pdf->Cell(15,8,collecte('regulier','mobile',$datejour1,$datejour2)+collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(73,99);
$pdf->Cell(15,8,collecte('regulier','fixe',$datejour1,$datejour2)+collecte('Occasionnel','fixe',$datejour1,$datejour2)+collecte('regulier','mobile',$datejour1,$datejour2)+collecte('Occasionnel','mobile',$datejour1,$datejour2),1,1,'C');

$pdf->SetXY(100,67);
$pdf->Cell(95,8,'Donneur Aphérèse prélevé',1,1,'L');
$pdf->SetXY(100,75);
$pdf->Cell(95,8,'00',1,1,'C');
$pdf->SetXY(100,83);
$pdf->Cell(65,8,'Nombre De Donneurs Contre Indiqués',1,1,'L');
$pdf->SetXY(165,83);
$pdf->Cell(30,8,indication('CIDT',$datejour1,$datejour2)+indication('CIDD',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,91);
$pdf->Cell(65,8,'Temporaires',1,1,'L');
$pdf->SetXY(165,91);
$pdf->Cell(30,8,indication('CIDT',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,99);
$pdf->Cell(65,8,'Definitives',1,1,'L');
$pdf->SetXY(165,99);
$pdf->Cell(30,8,indication('CIDD',$datejour1,$datejour2),1,1,'C');
//UNITE PREPARATION
$pdf->SetTextColor(225,0,0);
$pdf->Text(5,115,"UNITE PREPARATION");
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,120);
$pdf->Cell(73,8,'Nombre Total De PSL Préparés',1,1,'L');
$pdf->SetXY(5,128);
$pdf->Cell(73,8,'Sang Total ST',1,1,'L');
$pdf->SetXY(5,136);
$pdf->Cell(73,8,'Concentré globulaires CG',1,1,'L');
$pdf->SetXY(5,144);
$pdf->Cell(73,8,'Plasma frais congelé PFC',1,1,'L');
$pdf->SetXY(5,152);
$pdf->Cell(73,8,'Concentré standards plaquettaires CP',1,1,'L');
$pdf->SetXY(5,160);
$pdf->Cell(73,8,'Concentré plaquettaire d aphérèse',1,1,'L');
$pdf->SetXY(5,168);
$pdf->Cell(73,8,'Cryoprécipite ',1,1,'L');
$pdf->SetXY(78,120);
$pdf->Cell(20,8,PREPARATION('CGR',$datejour1,$datejour2)+PREPARATION('PFC',$datejour1,$datejour2)+PREPARATION('CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(78,128);
$pdf->Cell(20,8,PREPARATION('null',$datejour1,$datejour2) ,1,1,'C');
$pdf->SetXY(78,136);
$pdf->Cell(20,8,PREPARATION('CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(78,144);
$pdf->Cell(20,8,PREPARATION('PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(78,152);
$pdf->Cell(20,8,PREPARATION('CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(78,160);
$pdf->Cell(20,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(78,168);
$pdf->Cell(20,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,112);
$pdf->Cell(65,8,'Nombre Psl Non Etiquetes',1,1,'L');
$pdf->SetXY(165,112);
$pdf->Cell(30,8,PREPARATION('VI',$datejour1,$datejour2)+PREPARATION('FDS',$datejour1,$datejour2)+PREPARATION('AC',$datejour1,$datejour2)+PREPARATION('PCC',$datejour1,$datejour2)+PREPARATION('PL',$datejour1,$datejour2)  ,1,1,'C');
$pdf->SetXY(100,120);
$pdf->Cell(65,8,'Volume insufisant',1,1,'L');
$pdf->SetXY(165,120);
$pdf->Cell(30,8,PREPARATION('VI',$datejour1,$datejour2) ,1,1,'C');
$pdf->SetXY(100,128);
$pdf->Cell(65,8,'Fuite Défaut Soudure',1,1,'L');
$pdf->SetXY(165,128);
$pdf->Cell(30,8,PREPARATION('FDS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,136);
$pdf->Cell(65,8,'Aspect Coagule',1,1,'L');
$pdf->SetXY(165,136);
$pdf->Cell(30,8,PREPARATION('AC',$datejour1,$datejour2) ,1,1,'C');
$pdf->SetXY(100,144);
$pdf->Cell(65,8,'PFC/CP Contamine',1,1,'L');
$pdf->SetXY(165,144);
$pdf->Cell(30,8,PREPARATION('PCC',$datejour1,$datejour2) ,1,1,'C');
$pdf->SetXY(100,152);
$pdf->Cell(65,8,'PFC Lipemique ',1,1,'L');
$pdf->SetXY(165,152);
$pdf->Cell(30,8,PREPARATION('PL',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,160);
$pdf->Cell(65,8,'Sérologies Positives',1,1,'L');
$pdf->SetXY(165,160);
$pdf->Cell(30,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,168);
$pdf->Cell(65,8,'Autres',1,1,'L');
$pdf->SetXY(165,168);
$pdf->Cell(30,8,PREPARATION('null',$datejour1,$datejour2),1,1,'C');
$pdf->SetTextColor(225,0,0);
$pdf->Text(5,185,"UNITE QUALIFICATIONS BIOLOGIQUES DU DON ");
$pdf->SetTextColor(0,0,0);
//*********************************************//
$pdf->Text(5,192,"IMMUNOLOGIE ");
$pdf->SetXY(5,195);
$pdf->Cell(45,8,'Groupage 02 épreuves',1,1,'L');
$pdf->SetXY(50,195);
$pdf->Cell(10,8,immunologie($datejour1,$datejour2),1,1,'C');
$pdf->SetXY(60,195);
$pdf->Cell(10,8,'oui',1,1,'C');
$pdf->SetXY(78,195);
$pdf->Cell(10,8,'00',1,1,'C');
$pdf->SetXY(88,195);
$pdf->Cell(10,8,'non',1,1,'C');
$pdf->SetXY(5,211);
$pdf->Cell(45,8,'Nbr de dons phénotypés',1,1,'L');
$pdf->SetXY(50,211);
$pdf->Cell(48,8,'Receveurs phénotypés',1,1,'C');
$pdf->SetXY(5,219);
$pdf->Cell(45,8,'***',1,1,'C');
$pdf->SetXY(50,219);
$pdf->Cell(48,8,'***',1,1,'C');
$pdf->SetXY(5,235);
$pdf->Cell(45,8,'Epreuves de compatibilité ',1,1,'L');
$pdf->SetXY(50,235);
$pdf->Cell(48,8,immunologie($datejour1,$datejour2),1,1,'C');

//*********************************************//
$pdf->Text(100,192,"SEROLOGIE INFECTIEUSE ");
$pdf->SetXY(100,195);
$pdf->Cell(50,8,'Nombre de dons sérotypés',1,1,'L');
$pdf->SetXY(150,195);
$pdf->Cell(15,8,'DEPI',1,1,'C');
$pdf->SetXY(165,195);
$pdf->Cell(15,8,'CONT',1,1,'C');
$pdf->SetXY(180,195);
$pdf->Cell(15,8,'CONF',1,1,'C');
$pdf->SetXY(100,203);
$pdf->Cell(35,8,'HIV',1,1,'L');
$pdf->SetXY(135,203);
$pdf->Cell(15,8,qualification('HIV',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(150,203);
$pdf->Cell(15,8,qualificationdp('HIV','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(165,203);
$pdf->Cell(15,8,qualificationdp('HIV','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,203);
$pdf->Cell(15,8,qualificationdp('HIV','Positif',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,211);
$pdf->Cell(65,8,'HBS',1,1,'L');
$pdf->SetXY(135,211);
$pdf->Cell(15,8,qualification('HVB',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(150,211);
$pdf->Cell(15,8,qualificationdp('HVB','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(165,211);
$pdf->Cell(15,8,qualificationdp('HVB','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,211);
$pdf->Cell(15,8,qualificationdp('HVB','Positif',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,219);
$pdf->Cell(65,8,'HCV',1,1,'L');
$pdf->SetXY(135,219);
$pdf->Cell(15,8,qualification('HVC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(150,219);
$pdf->Cell(15,8,qualificationdp('HVC','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(165,219);
$pdf->Cell(15,8,qualificationdp('HVC','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,219);
$pdf->Cell(15,8,qualificationdp('HVC','Positif',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,227);
$pdf->Cell(65,8,'SYPHILIS',1,1,'L');
$pdf->SetXY(135,227);
$pdf->Cell(15,8,qualification('TPHA',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(150,227);
$pdf->Cell(15,8,qualificationdp('TPHA','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(165,227);
$pdf->Cell(15,8,qualificationdp('TPHA','douteux',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(180,227);
$pdf->Cell(15,8,qualificationdp('TPHA','Positif',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(100,235);
$pdf->Cell(65,8,'AUTRES',1,1,'L');
$pdf->SetXY(135,235);
$pdf->Cell(15,8,'00',1,1,'C');
$pdf->SetXY(150,235);
$pdf->Cell(15,8,'00',1,1,'C');
$pdf->SetXY(165,235);
$pdf->Cell(15,8,'00',1,1,'C');
$pdf->SetXY(180,235);
$pdf->Cell(15,8,'00',1,1,'C');

//pied de page 
$pdf->Text(5,260,"Dépistage test positif ou douteux à l issue de l étape 1");
$pdf->Text(5,268,"Controle test positif ou douteux  à l issue de l étape 2");
$pdf->Text(5,276,"Confirmé par l institue pasteur d Algerie  ");
$pdf->AddPage('p','a4');
$pdf->SetFont('Arial','B',10);
//*****************************************************************************************************//
$pdf->SetTextColor(225,0,0);
$pdf->Text(5,5,"UNITE DISTRIBUTION ");
$pdf->SetTextColor(0,0,0);
$pdf->Text(5,13,"Nbr De PSL Etiquetés Qualifiés ");
$pdf->Text(5,23,"Stock Debut d Annee");
$pdf->SetXY(100,8);
$pdf->Cell(30,8,'00',1,1,'C');
$pdf->Text(5,33,"Nombre De Demande De PSL Non Satisfaites  ");
$pdf->SetXY(45,18);
$pdf->Cell(20,8,'00',1,1,'C');
$pdf->Text(71,23,"Stock fin d Annee");
$pdf->SetXY(100,18);
$pdf->Cell(30,8,'00',1,1,'C');
$pdf->Text(131,23,"produit périmés");
$pdf->SetXY(160,18);
$pdf->Cell(30,8,'00',1,1,'C');
$pdf->SetXY(100,28);
$pdf->Cell(30,8,'00',1,1,'C');
//***********************//
$pdf->Text(5,45,"DISTRIBUTION INTRA MUROS ");$pdf->Text(100,45,"DISTRIBUTION EXTRA MUROS  ");
//****DISTRIBUTION INTRA MURAUX ***/////
//***entete du tableau
$pdf->SetXY(5,50);
$pdf->Cell(30,8,'Etablissements',1,1,'L');
$pdf->SetXY(35,50);
$pdf->Cell(12,8,'ST',1,1,'C');
$pdf->SetXY(47,50);
$pdf->Cell(12,8,'CGR',1,1,'C');
$pdf->SetXY(59,50);
$pdf->Cell(12,8,'PFC',1,1,'C');
$pdf->SetXY(71,50);
$pdf->Cell(12,8,'CP',1,1,'C');
$pdf->SetXY(83,50);
$pdf->Cell(12,8,'CPA',1,1,'C');

//***CHIRURGIE homme +femme
$pdf->SetXY(5,58);
$pdf->Cell(30,8,'CHIRURGIE',1,1,'L');
$pdf->SetXY(35,58);
$pdf->Cell(12,8,distribution('CHIRURGIE HOMME','ST',$datejour1,$datejour2)+distribution('CHIRURGIE FEMME','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,58);
$pdf->Cell(12,8,distribution('CHIRURGIE HOMME','CGR',$datejour1,$datejour2)+distribution('CHIRURGIE FEMME','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,58);
$pdf->Cell(12,8,distribution('CHIRURGIE HOMME','PFC',$datejour1,$datejour2)+distribution('CHIRURGIE FEMME','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,58);
$pdf->Cell(12,8,distribution('CHIRURGIE HOMME','CPS',$datejour1,$datejour2)+distribution('CHIRURGIE FEMME','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,58);
$pdf->Cell(12,8,'***',1,1,'C');
//***GYNECO-OBS 
$pdf->SetXY(5,66);
$pdf->Cell(30,8,'GYNECO-OBS',1,1,'L');
$pdf->SetXY(35,66);
$pdf->Cell(12,8,distribution('GYNECO','ST',$datejour1,$datejour2)+distribution('MATERNITE','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,66);
$pdf->Cell(12,8,distribution('GYNECO','CGR',$datejour1,$datejour2)+distribution('MATERNITE','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,66);
$pdf->Cell(12,8,distribution('GYNECO','PFC',$datejour1,$datejour2)+distribution('MATERNITE','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,66);
$pdf->Cell(12,8,distribution('GYNECO','CPS',$datejour1,$datejour2)+distribution('MATERNITE','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,66);
$pdf->Cell(12,8,'***',1,1,'C');
//***PEDIATRIE
$pdf->SetXY(5,74);
$pdf->Cell(30,8,'PEDIATRIE',1,1,'L');
$pdf->SetXY(35,74);
$pdf->Cell(12,8,distribution('PEDIATRIE','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,74);
$pdf->Cell(12,8,distribution('PEDIATRIE','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,74);
$pdf->Cell(12,8,distribution('PEDIATRIE','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,74);
$pdf->Cell(12,8,distribution('PEDIATRIE','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,74);
$pdf->Cell(12,8,'***',1,1,'C');
//***HEMATOLOGIE
$pdf->SetXY(5,82);
$pdf->Cell(30,8,'HEMATOLOGIE',1,1,'L');
$pdf->SetXY(35,82);
$pdf->Cell(12,8,'***',1,1,'C');
$pdf->SetXY(47,82);
$pdf->Cell(12,8,'***',1,1,'C');
$pdf->SetXY(59,82);
$pdf->Cell(12,8,'***',1,1,'C');
$pdf->SetXY(71,82);
$pdf->Cell(12,8,'***',1,1,'C');
$pdf->SetXY(83,82);
$pdf->Cell(12,8,'***',1,1,'C');
//***MED-INT medecine femme + medecine homme 
$pdf->SetXY(5,90);
$pdf->Cell(30,8,'MED-INT',1,1,'L');
$pdf->SetXY(35,90);
$pdf->Cell(12,8,distribution('MEDECINE HOMME','ST',$datejour1,$datejour2)+distribution('MEDECINE FEMME','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,90);
$pdf->Cell(12,8,distribution('MEDECINE HOMME','CGR',$datejour1,$datejour2)+distribution('MEDECINE FEMME','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,90);
$pdf->Cell(12,8,distribution('MEDECINE HOMME','PFC',$datejour1,$datejour2)+distribution('MEDECINE FEMME','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,90);
$pdf->Cell(12,8,distribution('MEDECINE HOMME','CPS',$datejour1,$datejour2)+distribution('MEDECINE FEMME','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,90);
$pdf->Cell(12,8,'***',1,1,'C');
//***UMC umc+bloca+blocb
$pdf->SetXY(5,98);
$pdf->Cell(30,8,'UMC',1,1,'L');
$pdf->SetXY(35,98);
$pdf->Cell(12,8,distribution('UMC','ST',$datejour1,$datejour2)+distribution('BLOC OPP A','ST',$datejour1,$datejour2)+distribution('BLOC OPP B','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,98);
$pdf->Cell(12,8,distribution('UMC','CGR',$datejour1,$datejour2)+distribution('BLOC OPP A','CGR',$datejour1,$datejour2)+distribution('BLOC OPP B','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,98);
$pdf->Cell(12,8,distribution('UMC','PFC',$datejour1,$datejour2)+distribution('BLOC OPP A','PFC',$datejour1,$datejour2)+distribution('BLOC OPP B','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,98);
$pdf->Cell(12,8,distribution('UMC','CPS',$datejour1,$datejour2)+distribution('BLOC OPP A','CPS',$datejour1,$datejour2)+distribution('BLOC OPP B','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,98);
$pdf->Cell(12,8,'***',1,1,'C');
//***AUTRES
$pdf->SetXY(5,106);
$pdf->Cell(30,8,'AUTRES',1,1,'L');
$pdf->SetXY(35,106);
$pdf->Cell(12,8,distribution('PTS','ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,106);
$pdf->Cell(12,8,distribution('PTS','CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,106);
$pdf->Cell(12,8,distribution('PTS','PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,106);
$pdf->Cell(12,8,distribution('PTS','CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,106);
$pdf->Cell(12,8,'***',1,1,'C');
//***TOTAL
$pdf->SetXY(5,114);
$pdf->Cell(30,8,'TOTAL',1,1,'L');
$pdf->SetXY(35,114);
$pdf->Cell(12,8,distributionpsl('ST',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(47,114);
$pdf->Cell(12,8,distributionpsl('CGR',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(59,114);
$pdf->Cell(12,8,distributionpsl('PFC',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(71,114);
$pdf->Cell(12,8,distributionpsl('CPS',$datejour1,$datejour2),1,1,'C');
$pdf->SetXY(83,114);
$pdf->Cell(12,8,'***',1,1,'C');

//*******DISTRIBUTION EXTRA MURAUX **//   doit etre comme un tableau
$db_host="localhost";
$db_name="gpts2012"; 
$db_user="root";
$db_pass="";
//la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
//sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from tdis1 LIMIT 7 ";
//$query="SELECT grh.Nomlatin,grh.Prenom_Latin,grh.cessation,grh.SERVICEar as SERVICEar FROM GRH where cessation !='y' and SERVICEar = $colone order by Nomlatin ";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$h=50;
$pdf->SetXY(100,$h);
$pdf->Cell(30,8,'Etablissements',1,1,'L');
$pdf->SetXY(130,$h);
$pdf->Cell(12,8,'ST',1,1,'C');
$pdf->SetXY(142,$h);
$pdf->Cell(12,8,'CGR',1,1,'C');
$pdf->SetXY(154,$h);
$pdf->Cell(12,8,'PFC',1,1,'C');
$pdf->SetXY(166,$h);
$pdf->Cell(12,8,'CP',1,1,'C');
$pdf->SetXY(178,$h);
$pdf->Cell(12,8,'CPA',1,1,'C');
$pdf->SetXY(100,58);
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(30,8,"*****",1,0,'C',0);
   $pdf->cell(12,8,"",1,0,'C',0);
   $pdf->cell(12,8,"",1,0,'C',0);
   $pdf->cell(12,8,"",1,0,'C',0);
   $pdf->cell(12,8,"",1,0,'C',0);
   $pdf->cell(12,8,"",1,0,'C',0);
   $pdf->SetXY(100,$pdf->GetY()+8); 
  }
$pdf->SetXY(100,$pdf->GetY()); 	  
$pdf->cell(30,8,"total :",1,0,'C',0);	  
$pdf->SetXY(130,$pdf->GetY()); 	  
$pdf->cell(60,8,"".$totalmbr1,1,0,'C',0);	
//*********INCIDENT TRANSFUSIONNELS****************************************//

$pdf->SetXY(5,142);
$pdf->Cell(85,8,'NOMBRE D INCIDENT TRANSFUSIONNELS',1,1,'L');
$pdf->SetXY(5,150);
$pdf->Cell(85,8,'00',1,1,'C');
$pdf->SetXY(100,142);
$pdf->Cell(30,8,'TYPES ',1,1,'C');
$pdf->SetXY(100,150);
$pdf->Cell(30,8,'*** ',1,1,'C');
//**********************************PIED DE PAGE**********************************//
$pdf->Text(5,200," DR TIBA PTS EPH AIN OUSSERA ");$pdf->Text(150,200," LE DIRECTEUR ");
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


