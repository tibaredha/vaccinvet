<?php
//VERIFICATION DES DATES
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
header("Location:../index.php?uc=BAMD") ; ///pose probleme non resolu
}

//******************************************************************************************************//

require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/bam.php');
$pdf = new vet ( 'L', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage();
$pdf->bilanentete("BILAN DES ACTIVITES VETERINAIRES \n DU PRATICIEN PRIVE \n PERIODE DU $datejour11 AU $datejour22  ");
$pdf->Text(5,$pdf->GetY()+30,"Dr:".$_SESSION["USER"]);
$pdf->Text(5,$pdf->GetY()+10 ,"AVN:".$_SESSION["AVN"]);
$pdf->Text(5,$pdf->GetY()+10 ,"Adresse:".$pdf->nbrtocom3('vaccinvet','comm',$_SESSION["COMMUNE"]));
$pdf->Text(5,$pdf->GetY()+10,"Commune:".$pdf->nbrtocom3('vaccinvet','comm',$_SESSION["COMMUNE"]));
$pdf->Text(5,$pdf->GetY()+10 ,"Daïra:".$pdf->nbrtodai2('vaccinvet','dai',$_SESSION["DAIRA"]));
$pdf->Text(5,$pdf->GetY()+10 ,"Wilaya:".$pdf->nbrtowil('vaccinvet','wil',$_SESSION["WILAYA"]));
$pdf->SetFont('aefurat', '', 10);
//PATHOLOGIE ANIMALE
$pdf->AddPage();
$h1=5;
$pdf->SetXY(05,$h1); 	  
$pdf->multicell(80,10,"Pathologies animales fréquentes",1,'C',0);
$pdf->SetXY(85,$h1); 	  
$pdf->multicell(25*5,5,"Espèces animales touchées",1,'C',0);
$pdf->SetXY(85,$h1+5); 	  
$pdf->multicell(25,5,"bovins",1,'C',0);
$pdf->SetXY(85+25,$h1+5); 	  
$pdf->multicell(25,5,"ovins",1,'C',0);
$pdf->SetXY(85+25*2,$h1+5); 	  
$pdf->multicell(25,5,"caprins",1,'C',0);
$pdf->SetXY(85+25*3,$h1+5); 	  
$pdf->multicell(25,5,"équins",1,'C',0);
$pdf->SetXY(85+25*4,$h1+5); 	  
$pdf->multicell(25,5,"camelins",1,'C',0);
$pdf->SetXY(85+25*5,$h1); 	  
$pdf->multicell(25,10,"Nomber de cas positif",1,'C',0);
$pdf->SetXY(85+25*6,$h1); 	  
$pdf->multicell(25,10,"Nomber de Têtes traitées",1,'C',0);
$pdf->SetXY(85+25*7,$h1); 	  
$pdf->multicell(30,10,"TRT utilisé observations",1,'C',0);

// espece pathologie date avn table


function ligne($col,$tab,$avn,$datejour1,$datejour2) 
{
$cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db("vaccinvet",$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT DATEBAM,SUM($col)as $col  FROM $tab where DATEBAM >='$datejour1'and DATEBAM <='$datejour2' and AVN='$avn' ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$row = mysql_fetch_array($requete); 
$resultat=$row[$col];
mysql_free_result($requete);
return $resultat;
}



$pdf->LIGNETABLEAU(15,'Affections ','Bronchite aigue',ligne('A1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('A2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('A3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('A4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('A5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('A6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('A7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'respiratoires','Bronchite chronque',ligne('B1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('B2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('B3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('B4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('B5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('B6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('B7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Pneumonies',ligne('C1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('C2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('C3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('C4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('C5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('C6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('C7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Affections','Entérite bactérienne',ligne('D1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('D2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('D3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('D4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('D5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('D6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('D7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'digestives','Colibacillose',ligne('E1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('E2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('E3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('E4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('E5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('E6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('E7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Dysenterie',ligne('F1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('F2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('F3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('F4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('F5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('F6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('F7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Affections ','Piétin',ligne('G1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('G2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('G3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('G4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('G5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('G6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('G7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'podales','Arthrite',ligne('H1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('H2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('H3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('H4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('H5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('H6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('H7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Polyarthrite',ligne('I1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('I2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('I3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('I4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('I5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('I6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('I7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','boiterie',ligne('J1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('J2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('J3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('J4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('J5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('J6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('J7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Parasitoses ','P.Externe Gale',ligne('K1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('K2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'et parasitismes','P.Externe Poux',ligne('L1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('L2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('L3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('L4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('L5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('L6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('L7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','P.Externe Tiques',ligne('M1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('M2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('M3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('M4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('M5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('M6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('M7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','P.Douve',ligne('N1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('N2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('N3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('N4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('N5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('N6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('N7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','G.Douve',ligne('O1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('O2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('O3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('O4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('O5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('O6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('O7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','S.Pulmonaire',ligne('P1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('P2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('P3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('P4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('P5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('P6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('P7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','S.Gastro-intestinale',ligne('Q1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('Q2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Q3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Q4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('K5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Q6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Q7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Affections  ','Vêlages dystociques',ligne('R1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('R2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('R3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('R4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('R5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('R6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('R7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'gynécologiques','Prolapsus utérins',ligne('S1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('S2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('S3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('S4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('S5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('S6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('S7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'et obstétriques','Rétention placentaire',ligne('T1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('T2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('T3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('T4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('T5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('T6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('T7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Avortement infectieux',ligne('U1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('U2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('U3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('U4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('U5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('U6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('U7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Avortement traumatique',ligne('V1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('V2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('V3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('V4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('V5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('V6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('V7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Affections  ','Hypocalcémie',ligne('W1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('W2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('W3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('W4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('W5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('W6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('W7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'métaboliques','Acidose métabolique',ligne('X1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('X2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('X3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('X4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('X5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('X6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('X7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Acétonie',ligne('Y1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('Y2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Y3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Y4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Y5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Y6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Y7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Syndrome de vache couchée',ligne('Z1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('Z2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Z3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Z4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Z5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Z6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('Z7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Météorisation gazeuse',ligne('SA1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SA2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SA3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SA4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SA5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SA6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SA7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Chirurgie','Ruminotomie',ligne('SB1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SB2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SB3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SB4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SB5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SB6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SB7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Exerese des abcès et tumeurs',ligne('SC1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SC2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SC3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SC4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SC5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SC6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SC7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'','Césarienne',ligne('SD1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SD2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SD3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SD4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SD5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SD6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SD7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Affections mammaires','Mammite',ligne('SE1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SE2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SE3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SE4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SE5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SE6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SE7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->LIGNETABLEAU($pdf->GetY()+5,'Autres pathologies*','',ligne('SF1','bam',$pdf->avn(),$datejour1,$datejour2) ,ligne('SF2','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SF3','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SF4','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SF5','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SF6','bam',$pdf->avn(),$datejour1,$datejour2),ligne('SF7','bam',$pdf->avn(),$datejour1,$datejour2),'***');
$pdf->SetXY(05,$pdf->GetY()+5); 	  
$pdf->cell(285,10," (*) Détails: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);


$pdf->AddPage();
$avn=$pdf->avn();
//Pathologie Aviaire
$pdf->Text(5,$pdf->GetY(),"Pathologie Aviaire");
$pdf->LIGNETABLEAUA("Poulet chair ",'A1','A2','A3','A4',$datejour1,$datejour2,$avn); 
$pdf->LIGNETABLEAUA("Poule pondeuse",'B1','B2','B3','B4',$datejour1,$datejour2,$avn);
$pdf->LIGNETABLEAUA("Repro-chair",'C1','C2','C3','C4',$datejour1,$datejour2,$avn);
$pdf->LIGNETABLEAUA("Repro-ponte ",'D1','D2','D3','D4',$datejour1,$datejour2,$avn);
$pdf->LIGNETABLEAUA("Couvoir",'E1','E2','E3','E4',$datejour1,$datejour2,$avn);
$pdf->LIGNETABLEAUA("Dindes",'F1','F2','F3','F4',$datejour1,$datejour2,$avn);

//Pathologie Apicole:
$pdf->Text(5,$pdf->GetY()+5,"Pathologie Apicole:");
$pdf->SetXY(10,$pdf->GetY()+5); 	  
$pdf->cell(80,10,"Noms des apiculteurs touchés",1,1,'C',0);
$pdf->SetXY(90,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Type de pathologie",1,1,'C',0);           
$pdf->SetXY(130,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Nombre de  ruches Traitées",1,1,'C',0);
$pdf->SetXY(170,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Traitement utilisé",1,1,'C',0);
$cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db("vaccinvet",$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from  bamap  where DATEBAM >='$datejour1'and DATEBAM <='$datejour2' and AVN='$avn' ";
$resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(80,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);
   $pdf->cell(40,5,$row->A1,1,0,'C',0);
   $pdf->cell(40,5,$row->A2,1,0,'C',0);
   $pdf->cell(40,5,$row->A3,1,0,'C',0);
   $pdf->SetXY(10,$pdf->GetY()+5); 
  }
//Pathologie Cunicole:
$pdf->Text(5,$pdf->GetY()+5,"Pathologie Cunicole:");
$pdf->SetXY(10,$pdf->GetY()+5); 	  
$pdf->cell(80,10,"Noms des éleveurs touchés",1,1,'C',0);
$pdf->SetXY(90,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Type de pathologie",1,1,'C',0);           
$pdf->SetXY(130,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Nombre de sujets Traitées",1,1,'C',0);
$pdf->SetXY(170,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Traitement utilisé",1,1,'C',0);
$cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db("vaccinvet",$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from  bamac  where DATEBAM >='$datejour1'and DATEBAM <='$datejour2' and AVN='$avn' ";
$resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(80,5,$row->NOM.'_'.$row->PRENOM,1,0,'L',0);
   $pdf->cell(40,5,$row->A1,1,0,'C',0);
   $pdf->cell(40,5,$row->A2,1,0,'C',0);
   $pdf->cell(40,5,$row->A3,1,0,'C',0);
   $pdf->SetXY(10,$pdf->GetY()+5); 
  }
//Les vaccinations réalisées:
$pdf->Text(5,$pdf->GetY()+5,"Les vaccinations réalisées:");
$pdf->SetXY(10,$pdf->GetY()+5); 	  
$pdf->cell(80,10,"Type de vaccination",1,1,'C',0);
$pdf->SetXY(90,$pdf->GetY()-10); 	  
$pdf->cell(40,10,"Effectif vacciné",1,1,'C',0); 
//vaccination anti clavleuse
function vaccination($colvaccin,$avn,$datejour1,$datejour2) 
{
$cnx = mysql_connect("localhost","root","")or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db("vaccinvet",$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT datevac,SUM($colvaccin)as $colvaccin  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$row = mysql_fetch_array($requete); 
$colvaccin=$row[$colvaccin];
mysql_free_result($requete);
return $colvaccin;    				    
}
$c1=vaccination('vacb1',$avn,$datejour1,$datejour2);
$c2=vaccination('vacb2',$avn,$datejour1,$datejour2);
$c3=vaccination('vacb3',$avn,$datejour1,$datejour2);
$c4=vaccination('vacb4',$avn,$datejour1,$datejour2);
$c5=vaccination('vacb5',$avn,$datejour1,$datejour2);
$c6=vaccination('vacb6',$avn,$datejour1,$datejour2);
$Claveleuse=$c1+$c2+$c3+$c4+$c5+$c6;
$pdf->LIGNEVACCINATION($pdf->GetY(),'Vaccination Anti-Claveleuse',$Claveleuse);
//vaccination anti Aphteuse
$a1=vaccination('vaad1',$avn,$datejour1,$datejour2);
$a2=vaccination('vaad2',$avn,$datejour1,$datejour2);
$a3=vaccination('vaad3',$avn,$datejour1,$datejour2);
$a4=vaccination('vaad4',$avn,$datejour1,$datejour2);
$a5=vaccination('vaad5',$avn,$datejour1,$datejour2);
$a6=vaccination('vaad6',$avn,$datejour1,$datejour2);
$Aphteuse=$a1+$a2+$a3+$a4+$a5+$a6;
$pdf->LIGNEVACCINATION($pdf->GetY(),'Vaccination Anti-Aphteuse',$Aphteuse);
//vaccination Entérotoxémie
$pdf->LIGNEVACCINATION($pdf->GetY(),'Entérotoxémie','***');

//vaccination anti rabique
$r1=vaccination('vare1',$avn,$datejour1,$datejour2);
$r2=vaccination('vare2',$avn,$datejour1,$datejour2);
$r3=vaccination('vare3',$avn,$datejour1,$datejour2);
$r4=vaccination('vare4',$avn,$datejour1,$datejour2);
$r5=vaccination('vare5',$avn,$datejour1,$datejour2);
$r6=vaccination('vare6',$avn,$datejour1,$datejour2);
$rabique=$r1+$r2+$r3+$r4+$r5+$r6;
$pdf->LIGNEVACCINATION($pdf->GetY(),'Vaccination Anti-rabique',$rabique);


//vaccination anti Brucellique
$b1=vaccination('vabc1',$avn,$datejour1,$datejour2);
$b2=vaccination('vabc2',$avn,$datejour1,$datejour2);
$b3=vaccination('vabc3',$avn,$datejour1,$datejour2);
$b4=vaccination('vabc4',$avn,$datejour1,$datejour2);
$b5=vaccination('vabc5',$avn,$datejour1,$datejour2);
$b6=vaccination('vabc6',$avn,$datejour1,$datejour2);
$b7=vaccination('vabc7',$avn,$datejour1,$datejour2);
$Brucellique=$b1+$b2+$b3+$b4+$b5+$b6+$b7;
$pdf->LIGNEVACCINATION($pdf->GetY(),'Vaccination Anti-Brucellique',$Brucellique);


$pdf->LIGNEVACCINATION($pdf->GetY(),'Autres','***');












 







 

	  
	  
	  
	  
$pdf->AddPage();
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->multicell(285,10,"Les maladies à déclaration obligatoire et les mesures prises :",1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'C',0);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(285,10,"Griffe et signature du praticien privé  "."Dr : ".$_SESSION["USER"]." AVN:".$_SESSION["AVN"],0,1,'C',0);


$pdf->Output();

?>


