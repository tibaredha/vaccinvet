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
header("Location:../index.php?uc=EVAVAA") ; ///pose probleme non resolu
}
$vaccin=$_POST['vaccin'];
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
switch($vaccin)
{
case '0'://BILAN VACCINATION ******************************************************************************
{
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
//$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->bilanentete("FLASH DE LA CAMPAGNE DE VACCINATION \n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps4();
$h1=80;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(60,10,"Nom  du vétérinaire Mandaté",1,0,'C',0);

$pdf->SetXY(65,$h1); 	  
$pdf->cell(35,10,"ANTI-CLAVELEUSE",1,'C',0);
$pdf->SetXY(100,$h1); 	  
$pdf->cell(35,10,"ANTI-BRUCELLIQUE",1,0,'C',0);
$pdf->SetXY(135,$h1); 	  
$pdf->cell(35,10,"ANTI-APHTEUSE",1,0,'C',0);
$pdf->SetXY(170,$h1); 	  
$pdf->cell(35,10,"ANTI-RABIQUE",1,0,'C',0);
$pdf->SetXY(05,90); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' order by avn  ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  //if($row->vacb1!=0 and $row->vacb2!=0 and $row->vacb3!=0 and $row->vacb4!=0 and $row->vacb5!=0 and $row->vacb6!=0  and $row->vacb7!=0) {
  
  $totalantic=$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6+$row->vacb7;
  $totalantib=$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6+$row->vabc7;
  $totalantia=$row->vaad1+$row->vaad2+$row->vaad3+$row->vaad4+$row->vaad5+$row->vaad6;
  $totalantir=$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6;
  
   $pdf->cell(60,5,$pdf->AVNTONOMVET('vaccinvet','users',$row->AVN),1,0,'L',0);          
   $pdf->cell(35,5,$totalantic,1,0,'C',0);
   $pdf->cell(35,5,$totalantib,1,0,'C',0);
   $pdf->cell(35,5,$totalantia,1,0,'C',0);
   $pdf->cell(35,5,$totalantir,1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5); 
  // }
  }
    //ANTI-CLAVELEUSE
    $query_liste = "SELECT datevac,SUM(vacb1)as Qvacb1,SUM(vacb2)as Qvacb2,SUM(vacb3)as Qvacb3,SUM(vacb4)as Qvacb4,SUM(vacb5)as Qvacb5,SUM(vacb6)as Qvacb6 ,SUM(vacb7)as Qvacb7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb1=$row['Qvacb1'];
	$Qvacb2=$row['Qvacb2'];
	$Qvacb3=$row['Qvacb3'];
	$Qvacb4=$row['Qvacb4'];
	$Qvacb5=$row['Qvacb5'];
	$Qvacb6=$row['Qvacb6'];
	$Qvacb7=$row['Qvacb7'];
	$totalvac=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6+$Qvacb7;
	mysql_free_result($requete);
	//ANTI-BRUCELLIQUE
    $query_liste = "SELECT datevac,SUM(vabc1)as Qvabc1,SUM(vabc2)as Qvabc2,SUM(vabc3)as Qvabc3,SUM(vabc4)as Qvabc4,SUM(vabc5)as Qvabc5,SUM(vabc6)as Qvabc6 ,SUM(vabc7)as Qvabc7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc1=$row['Qvabc1'];
	$Qvabc2=$row['Qvabc2'];
	$Qvabc3=$row['Qvabc3'];
	$Qvabc4=$row['Qvabc4'];
	$Qvabc5=$row['Qvabc5'];
	$Qvabc6=$row['Qvabc6'];
	$Qvabc7=$row['Qvabc7'];
	$totalvab=$Qvabc1+$Qvabc2+$Qvabc3+$Qvabc4+$Qvabc5+$Qvabc6+$Qvabc7;
	mysql_free_result($requete);
	//ANTI-APHTEUSE vaad1
    $query_liste = "SELECT datevac,SUM(vaad1)as Qvaad1,SUM(vaad2)as Qvaad2,SUM(vaad3)as Qvaad3,SUM(vaad4)as Qvaad4,SUM(vaad5)as Qvaad5,SUM(vaad6)as Qvaad6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad1=$row['Qvaad1'];
	$Qvaad2=$row['Qvaad2'];
	$Qvaad3=$row['Qvaad3'];
	$Qvaad4=$row['Qvaad4'];
	$Qvaad5=$row['Qvaad5'];
	$Qvaad6=$row['Qvaad6'];
	$totalvaa=$Qvaad1+$Qvaad2+$Qvaad3+$Qvaad4+$Qvaad5+$Qvaad6;
	mysql_free_result($requete);
	//ANTI-RABIQUE vare1
    $query_liste = "SELECT datevac,SUM(vare1)as Qvare1,SUM(vare2)as Qvare2,SUM(vare3)as Qvare3,SUM(vare4)as Qvare4,SUM(vare5)as Qvare5,SUM(vare6)as Qvare6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare1=$row['Qvare1'];
	$Qvare2=$row['Qvare2'];
	$Qvare3=$row['Qvare3'];
	$Qvare4=$row['Qvare4'];
	$Qvare5=$row['Qvare5'];
	$Qvare6=$row['Qvare6'];
	$totalvar=$Qvare1+$Qvare2+$Qvare3+$Qvare4+$Qvare5+$Qvare6;
	mysql_free_result($requete);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(60,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY(65,$pdf->GetY()); 	  
$pdf->cell(35,0.5,$totalvac,1,0,'C',0);
$pdf->SetXY(100,$pdf->GetY()); 	  
$pdf->cell(35,0.5,$totalvab,1,0,'C',0);
$pdf->SetXY(135,$pdf->GetY()); 	  
$pdf->cell(35,0.5,$totalvaa,1,0,'C',0);
$pdf->SetXY(170,$pdf->GetY()); 	  
$pdf->cell(35,0.5,$totalvar,1,0,'C',0);
$totalactesvaccination=$totalvac+$totalvab+$totalvaa+$totalvar;	  
$pdf->Text(5,$pdf->GetY()+10,"Total des actes de vaccination: ".$totalactesvaccination);
$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(25,$pdf->GetY()+10,"Signature de l'IVW  ");$pdf->Text(125,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
break;
};

case '1'://Anti-claveleuse ******************************************************************************
{
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->bilanentete("FLASH DE LA CAMPAGNE DE VACCINATION   \n ANTI-CLAVELEUSE \n Période du  $datejour11 au $datejour22 ");
$pdf->corps4();
$h1=80;
$wid=17.8;
$pdf->SetXY(05,$h1); 	  
$pdf->multicell(40,10,"Nom  du vétérinaire Mandaté",1,'C',0);
$pdf->SetXY(45,$h1); 	  
$pdf->cell($wid,10,"Brebis",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Béliers",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Antenais",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Antenaises",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Agneaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Agnelles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Caprins",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Total",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->multicell(18,10,"Nombre eleveurs",1,'C',0);
$pdf->SetXY(05,90); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn(); //IL FAUT QUE AVND DU REGISTRE AVND SESSION 
$query_liste = "SELECT AVN,count(AVN) as ele,SUM(vacb1) as vacb1,SUM(vacb2) as vacb2,SUM(vacb3) as vacb3,SUM(vacb4) as vacb4,SUM(vacb5) as vacb5,SUM(vacb6) as vacb6,SUM(vacb7) as vacb7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' group by AVN ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  if($row->vacb1!=0 or $row->vacb2!=0 or $row->vacb3!=0 or $row->vacb4!=0 or $row->vacb5!=0 or $row->vacb6!=0  or $row->vacb7!=0) {
   $pdf->cell(40,5,$pdf->AVNTONOMVET('vaccinvet','users',$row->AVN),1,0,'L',0);          
   $wid=17.8;
   $pdf->cell($wid,5,$row->vacb1,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb2,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb3,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb4,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb5,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb6,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb7,1,0,'C',0);
   $pdf->cell($wid,5,$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6+$row->vacb7,1,0,'C',0);
   $pdf->cell($wid,5,$row->ele,1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5);   
  } 
   
  } 
    //Brebis
    $query_liste = "SELECT datevac,SUM(vacb1)as Qvacb1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb1=$row['Qvacb1'];
	mysql_free_result($requete);
	//Béliers
    $query_liste = "SELECT datevac,SUM(vacb2)as Qvacb2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb2=$row['Qvacb2'];
	mysql_free_result($requete);
	//Antenais
    $query_liste = "SELECT datevac,SUM(vacb3)as Qvacb3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb3=$row['Qvacb3'];
	mysql_free_result($requete);
	//Antenaises
    $query_liste = "SELECT datevac,SUM(vacb4)as Qvacb4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb4=$row['Qvacb4'];
	mysql_free_result($requete);
    //Agneaux
    $query_liste = "SELECT datevac,SUM(vacb5)as Qvacb5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb5=$row['Qvacb5'];
	mysql_free_result($requete);
	//Agnelles
    $query_liste = "SELECT datevac,SUM(vacb6)as Qvacb6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb6=$row['Qvacb6'];
	mysql_free_result($requete);
	//Caprins
    $query_liste = "SELECT datevac,SUM(vacb7)as Qvacb7  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb7=$row['Qvacb7'];
	mysql_free_result($requete);
    //nombre d eleveurpose de probleme 
    $query_liste = "SELECT datevac,count(AVN)as NBRELE  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$NBRELE=$row['NBRELE'];
	mysql_free_result($requete);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(40,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb6,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvacb7,1,0,'C',0);
$totalovins=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6+$Qvacb7;
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$totalovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(18,0.5,$NBRELE,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+10,"Total des ovins vaccinées: ".$totalovins);
$pdf->Text(5,$pdf->GetY()+5,"Nombre d eleveurs touchés : ".$NBRELE);		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(125,$pdf->GetY()+5,"Le vétérinaire chargé du suivi ");
$pdf->Text(125,$pdf->GetY()+5,"Nom : ".$_SESSION["USER"]);
$pdf->Text(125,$pdf->GetY()+5,"AVN :".$_SESSION["AVN"]);
break;
};
case '2'://ANTI-BRUCELLIQUE ******************************************************************************
{
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->bilanentete("FLASH DE LA CAMPAGNE DE VACCINATION   \n ANTI-BRUCELLIQUE \n Période du  $datejour11 au $datejour22 ");
$pdf->corps4();
$h1=80;
$wid=17.8;
$pdf->SetXY(05,$h1); 	  
$pdf->multicell(40,10,"Nom  du vétérinaire Mandaté",1,'C',0);
$pdf->SetXY(45,$h1); 	  
$pdf->cell($wid,10,"Brebis",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Béliers",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Antenais",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Antenaises",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Agneaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Agnelles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Caprins",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Total",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->multicell(18,10,"Nombre eleveurs",1,'C',0);
$pdf->SetXY(05,90); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn(); //IL FAUT QUE AVND DU REGISTRE AVND SESSION 
$query_liste = "SELECT AVN,count(AVN) as ele,SUM(vabc1) as vabc1,SUM(vabc2) as vabc2,SUM(vabc3) as vabc3,SUM(vabc4) as vabc4,SUM(vabc5) as vabc5,SUM(vabc6) as vabc6,SUM(vabc7) as vabc7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' group by AVN ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   if($row->vabc1!=0 or $row->vabc2!=0 or $row->vabc3!=0 or $row->vabc4!=0 or $row->vabc5!=0 or $row->vabc6!=0  or $row->vabc7!=0) {
   $pdf->cell(40,5,$pdf->AVNTONOMVET('vaccinvet','users',$row->AVN),1,0,'L',0);          
   $wid=17.8;
   $pdf->cell($wid,5,$row->vabc1,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc2,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc3,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc4,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc5,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc6,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc7,1,0,'C',0);
   $pdf->cell($wid,5,$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6+$row->vabc7,1,0,'C',0);
   $pdf->cell($wid,5,$row->ele,1,0,'C',0); 
   $pdf->SetXY(05,$pdf->GetY()+5);   
  } 
  } 
    //Brebis
    $query_liste = "SELECT datevac,SUM(vabc1)as Qvabc1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc1=$row['Qvabc1'];
	mysql_free_result($requete);
	//Béliers
    $query_liste = "SELECT datevac,SUM(vabc2)as Qvabc2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc2=$row['Qvabc2'];
	mysql_free_result($requete);
	//Antenais
    $query_liste = "SELECT datevac,SUM(vabc3)as Qvabc3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc3=$row['Qvabc3'];
	mysql_free_result($requete);
	//Antenaises
    $query_liste = "SELECT datevac,SUM(vabc4)as Qvabc4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc4=$row['Qvabc4'];
	mysql_free_result($requete);
    //Agneaux
    $query_liste = "SELECT datevac,SUM(vabc5)as Qvabc5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc5=$row['Qvabc5'];
	mysql_free_result($requete);
	//Agnelles
    $query_liste = "SELECT datevac,SUM(vabc6)as Qvabc6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc6=$row['Qvabc6'];
	mysql_free_result($requete);
	//Caprins
    $query_liste = "SELECT datevac,SUM(vabc7)as Qvabc7  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc7=$row['Qvabc7'];
	mysql_free_result($requete);
    //nombre d eleveurpose de probleme 
    $query_liste = "SELECT datevac,count(AVN)as NBRELE  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$NBRELE=$row['NBRELE'];
	mysql_free_result($requete);	
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(40,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc6,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvabc7,1,0,'C',0);
$totalovins=$Qvabc1+$Qvabc2+$Qvabc3+$Qvabc4+$Qvabc5+$Qvabc6+$Qvabc7;
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$totalovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(18,0.5,$NBRELE,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+10,"Total des ovins vaccinées: ".$totalovins);
$pdf->Text(5,$pdf->GetY()+5,"Nombre d eleveurs touchés : ".$NBRELE);		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(125,$pdf->GetY()+5,"Le vétérinaire chargé du suivi ");
$pdf->Text(125,$pdf->GetY()+5,"Nom : ".$_SESSION["USER"]);
$pdf->Text(125,$pdf->GetY()+5,"AVN :".$_SESSION["AVN"]);
break;
};

case '3'://ANTI-APHTEUX ******************************************************************************
{
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->bilanentete("FLASH DE LA CAMPAGNE DE VACCINATION   \n ANTI-APHTEUX \n Période du  $datejour11 au $datejour22 ");
$pdf->corps4();
$h1=80;
$wid=20;
$pdf->SetXY(05,$h1); 	  
$pdf->multicell(40,10,"Nom  du vétérinaire Mandaté",1,'C',0);
$pdf->SetXY(45,$h1); 	  
$pdf->cell($wid+4,10,"Vaches Laitières",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Génisses",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Taureaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Taurillons",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Veaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Velles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Total",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->multicell(18,10,"Nombre eleveurs",1,'C',0);
$pdf->SetXY(05,90); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn(); //IL FAUT QUE AVND DU REGISTRE AVND SESSION 
$query_liste = "SELECT AVN,count(AVN) as ele,SUM(vaad1) as vaad1,SUM(vaad2) as vaad2,SUM(vaad3) as vaad3,SUM(vaad4) as vaad4,SUM(vaad5) as vaad5,SUM(vaad6) as vaad6 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' group by AVN ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   if($row->vaad1!=0 or $row->vaad2!=0 or $row->vaad3!=0 or $row->vaad4!=0 or $row->vaad5!=0 or $row->vaad6!=0) {
   $pdf->cell(40,5,$pdf->AVNTONOMVET('vaccinvet','users',$row->AVN),1,0,'L',0);          
   $pdf->cell(24,5,$row->vaad1,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad2,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad3,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad4,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad5,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad6,1,0,'C',0);
   $pdf->cell(20,5,$row->vaad1+$row->vaad2+$row->vaad3+$row->vaad4+$row->vaad5+$row->vaad6,1,0,'C',0);
   $pdf->cell(18,5,$row->ele,1,0,'C',0); 
   $pdf->SetXY(05,$pdf->GetY()+5);
   } 
  }
    // Vaches Laitières
    $query_liste = "SELECT datevac,SUM(vaad1)as Qvaad1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad1=$row['Qvaad1'];
	mysql_free_result($requete);
   // Vaches Génisses
    $query_liste = "SELECT datevac,SUM(vaad2)as Qvaad2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad2=$row['Qvaad2'];
	mysql_free_result($requete);
     // Vaches Taureaux
    $query_liste = "SELECT datevac,SUM(vaad3)as Qvaad3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad3=$row['Qvaad3'];
	mysql_free_result($requete);
     // Vaches Taurillons
    $query_liste = "SELECT datevac,SUM(vaad4)as Qvaad4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad4=$row['Qvaad4'];
	mysql_free_result($requete);
	 // Vaches Veaux
    $query_liste = "SELECT datevac,SUM(vaad5)as Qvaad5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad5=$row['Qvaad5'];
	mysql_free_result($requete);
	 // Vaches Velles
    $query_liste = "SELECT datevac,SUM(vaad6)as Qvaad6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad6=$row['Qvaad6'];
	mysql_free_result($requete);
    //nombre d eleveurpose de probleme 
    $query_liste = "SELECT datevac,count(AVN)as NBRELE  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$NBRELE=$row['NBRELE'];
	mysql_free_result($requete);	
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(40,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(24,0.5,$Qvaad1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvaad2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvaad3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvaad4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvaad5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvaad6,1,0,'C',0);
$totalovins=$Qvaad1+$Qvaad2+$Qvaad3+$Qvaad4+$Qvaad5+$Qvaad6;
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$totalovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(18,0.5,$NBRELE,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+10,"Total des bovins vaccinées: ".$totalovins);
$pdf->Text(5,$pdf->GetY()+5,"Nombre d eleveurs touchés : ".$NBRELE);		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(125,$pdf->GetY()+5,"Le vétérinaire chargé du suivi ");
$pdf->Text(125,$pdf->GetY()+5,"Nom : ".$_SESSION["USER"]);
$pdf->Text(125,$pdf->GetY()+5,"AVN :".$_SESSION["AVN"]);
break;
};
case '4'://ANTI-RABIQUE sous controle ***********************************************************
{
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->bilanentete("FLASH DE LA CAMPAGNE DE VACCINATION \n ANTI-RABIQUE \n Période du  $datejour11 au $datejour22 ");
$pdf->corps4();
$h1=80;
$wid=20;
$pdf->SetXY(05,$h1); 	  
$pdf->multicell(40,10,"Nom  du vétérinaire Mandaté",1,'C',0);
$pdf->SetXY(45,$h1); 	  
$pdf->cell($wid+4,10,"Vaches Laitières",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Génisses",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Taureaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Taurillons",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Veaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Velles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell($wid,10,"Total",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->multicell(18,10,"Nombre eleveurs",1,'C',0);
$pdf->SetXY(05,90); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn(); //IL FAUT QUE AVND DU REGISTRE AVND SESSION 
$query_liste = "SELECT count(AVN) as ele,SUM(vare1)AS vare1,SUM(vare2)AS vare2,SUM(vare3)AS vare3,SUM(vare4)AS vare4,SUM(vare5)AS vare5,SUM(vare6)AS vare6,AVN FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and vare1!=0 and vare2!=0 and vare3!=0 and vare4!=0 and vare5!=0 and vare6!=0 group by AVN";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
    if($row->vare1!=0 or $row->vare2!=0 or $row->vare3!=0 or $row->vare4!=0 or $row->vare5!=0 or $row->vare6!=0) {
   $pdf->cell(40,5,$pdf->AVNTONOMVET('vaccinvet','users',$row->AVN),1,0,'L',0);          
   $pdf->cell(24,5,$row->vare1,1,0,'C',0);
   $pdf->cell(20,5,$row->vare2,1,0,'C',0);
   $pdf->cell(20,5,$row->vare3,1,0,'C',0);
   $pdf->cell(20,5,$row->vare4,1,0,'C',0);
   $pdf->cell(20,5,$row->vare5,1,0,'C',0);
   $pdf->cell(20,5,$row->vare6,1,0,'C',0);
   $pdf->cell(20,5,$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6,1,0,'C',0);
   $pdf->cell(18,5,$row->ele,1,0,'C',0); 
   $pdf->SetXY(05,$pdf->GetY()+5); 
      }  
  }
     // Vaches Laitières
    $query_liste = "SELECT datevac,SUM(vare1)as Qvare1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'  ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare1=$row['Qvare1'];
	mysql_free_result($requete);
   // Vaches Génisses
    $query_liste = "SELECT datevac,SUM(vare2)as Qvare2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare2=$row['Qvare2'];
	mysql_free_result($requete);
     // Vaches Taureaux
    $query_liste = "SELECT datevac,SUM(vare3)as Qvare3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare3=$row['Qvare3'];
	mysql_free_result($requete);
     // Vaches Taurillons
    $query_liste = "SELECT datevac,SUM(vare4)as Qvare4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare4=$row['Qvare4'];
	mysql_free_result($requete);
	 // Vaches Veaux
    $query_liste = "SELECT datevac,SUM(vare5)as Qvare5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare5=$row['Qvare5'];
	mysql_free_result($requete);
	 // Vaches Velles
    $query_liste = "SELECT datevac,SUM(vare6)as Qvare6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare6=$row['Qvare6'];
	mysql_free_result($requete);
    
	
	
	//nombre d eleveur pose de probleme  
    $query_liste = "SELECT vare1,vare2,vare3,vare4,vare5,vare6 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and vare1!=0 and vare2!=0 and vare3!=0 and vare4!=0 and vare5!=0 and vare6!=0";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$NBRELE=mysql_num_rows($requete);
	//$NBRELE=$row['AVN'];
	//$NBRELE=$row['AVN'];
	 mysql_free_result($requete);	

	
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(40,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(24,0.5,$Qvare1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvare2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvare3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvare4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvare5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$Qvare6,1,0,'C',0);
$totalovins=$Qvare1+$Qvare2+$Qvare3+$Qvare4+$Qvare5+$Qvare6;
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell($wid,0.5,$totalovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(18,0.5,$NBRELE,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+10,"Total des bovins vaccinées: ".$totalovins);
$pdf->Text(5,$pdf->GetY()+5,"Nombre d eleveurs touchés : ".$NBRELE);		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(125,$pdf->GetY()+5,"Le vétérinaire chargé du suivi ");
$pdf->Text(125,$pdf->GetY()+5,"Nom : ".$_SESSION["USER"]);
$pdf->Text(125,$pdf->GetY()+5,"AVN :".$_SESSION["AVN"]);
break;
};

}

$pdf->Output();
?>


