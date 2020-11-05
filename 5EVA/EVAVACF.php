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
header("Location:../index.php?uc=EVAVAF") ; ///pose probleme non resolu
}
$vaccin=$_POST['vaccin']; //pour utiliser un seul fichier pour plusieur vaccin  avec un switche
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'L', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
switch($vaccin)
{
case '0'://BILAN VACCINATION ******************************************************************************
{
$pdf->AddPage('L','A4');
$pdf->SetFont('aefurat', '', 10);

$pdf->bilanentete(" RECAP BILAN PARTIEL DE VACCINATION \n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps3();
$h1=50;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(65,10,"Nom de l'eleveur",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(35,10,"Zone/Lieu",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"VCLAV",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"PCLAV",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"VBRUC",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"PBRUC",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"VAPHT",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"PAPHT",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(22,10,"VRABI",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(25,10,"PRABI",1,0,'C',0);
$pdf->SetXY(05,60); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  //if($row->vacb1!=0 and $row->vacb2!=0 and $row->vacb3!=0 and $row->vacb4!=0 and $row->vacb5!=0 and $row->vacb6!=0  and $row->vacb7!=0) {
  
  $totalantic=$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6;
  $totalanticp=$row->DPVAC;
  $totalantib=$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6+$row->vabc7;
  $totalantibp=$row->DPVAB;
  $totalantia=$row->vaad1+$row->vaad2+$row->vaad3+$row->vaad4+$row->vaad5+$row->vaad6;
  $totalantiap=$row->DPVAA;
  $totalantir=$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6;
  $totalantirp=$row->DPVAR;
   $pdf->cell(65,5,$row->nomeleveur." / ".ucwords($row->FILSDE),1,0,'L',0);          
   $pdf->cell(35,5,$pdf->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
   $pdf->cell(22,5,$totalantic,1,0,'C',0);
   $pdf->cell(22,5,$totalanticp,1,0,'C',0);
   $pdf->cell(22,5,$totalantib,1,0,'C',0);
   $pdf->cell(22,5,$totalantibp,1,0,'C',0);
   $pdf->cell(22,5,$totalantia,1,0,'C',0);
   $pdf->cell(22,5,$totalantibp,1,0,'C',0);
   $pdf->cell(22,5,$totalantir,1,0,'C',0);
   $pdf->cell(25,5,$totalantirp,1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5); 
  // }
  }
    //ANTI-CLAVELEUSE
    $query_liste = "SELECT datevac,SUM(DPVAC)as DPVAC,SUM(vacb1)as Qvacb1,SUM(vacb2)as Qvacb2,SUM(vacb3)as Qvacb3,SUM(vacb4)as Qvacb4,SUM(vacb5)as Qvacb5,SUM(vacb6)as Qvacb6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb1=$row['Qvacb1'];
	$Qvacb2=$row['Qvacb2'];
	$Qvacb3=$row['Qvacb3'];
	$Qvacb4=$row['Qvacb4'];
	$Qvacb5=$row['Qvacb5'];
	$Qvacb6=$row['Qvacb6'];
	$DPVAC=$row['DPVAC'];
	$totalvac=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6;
	mysql_free_result($requete);
	//ANTI-BRUCELLIQUE
    $query_liste = "SELECT datevac,SUM(DPVAB)as DPVAB,SUM(vabc1)as Qvabc1,SUM(vabc2)as Qvabc2,SUM(vabc3)as Qvabc3,SUM(vabc4)as Qvabc4,SUM(vabc5)as Qvabc5,SUM(vabc6)as Qvabc6 ,SUM(vabc7)as Qvabc7 FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvabc1=$row['Qvabc1'];
	$Qvabc2=$row['Qvabc2'];
	$Qvabc3=$row['Qvabc3'];
	$Qvabc4=$row['Qvabc4'];
	$Qvabc5=$row['Qvabc5'];
	$Qvabc6=$row['Qvabc6'];
	$Qvabc7=$row['Qvabc7'];
	$DPVAB=$row['DPVAB'];
	$totalvab=$Qvabc1+$Qvabc2+$Qvabc3+$Qvabc4+$Qvabc5+$Qvabc6+$Qvabc7;
	mysql_free_result($requete);
	//ANTI-APHTEUSE vaad1
    $query_liste = "SELECT datevac,SUM(DPVAA)as DPVAA,SUM(vaad1)as Qvaad1,SUM(vaad2)as Qvaad2,SUM(vaad3)as Qvaad3,SUM(vaad4)as Qvaad4,SUM(vaad5)as Qvaad5,SUM(vaad6)as Qvaad6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvaad1=$row['Qvaad1'];
	$Qvaad2=$row['Qvaad2'];
	$Qvaad3=$row['Qvaad3'];
	$Qvaad4=$row['Qvaad4'];
	$Qvaad5=$row['Qvaad5'];
	$Qvaad6=$row['Qvaad6'];
	$DPVAA=$row['DPVAA'];
	$totalvaa=$Qvaad1+$Qvaad2+$Qvaad3+$Qvaad4+$Qvaad5+$Qvaad6;
	mysql_free_result($requete);
	//ANTI-RABIQUE vare1
    $query_liste = "SELECT datevac,SUM(DPVAR)as DPVAR,SUM(vare1)as Qvare1,SUM(vare2)as Qvare2,SUM(vare3)as Qvare3,SUM(vare4)as Qvare4,SUM(vare5)as Qvare5,SUM(vare6)as Qvare6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare1=$row['Qvare1'];
	$Qvare2=$row['Qvare2'];
	$Qvare3=$row['Qvare3'];
	$Qvare4=$row['Qvare4'];
	$Qvare5=$row['Qvare5'];
	$Qvare6=$row['Qvare6'];
	$DPVAR=$row['DPVAR'];
	$totalvar=$Qvare1+$Qvare2+$Qvare3+$Qvare4+$Qvare5+$Qvare6;
	mysql_free_result($requete);
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(100,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$totalvac,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$DPVAC,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$totalvab,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$DPVAB,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$totalvaa,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$DPVAA,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(22,0.5,$totalvar,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(25,0.5,$DPVAR,1,0,'C',0);
$totalactesvaccination=$totalvac+$totalvab+$totalvaa+$totalvar;	  
$pdf->Text(5,$pdf->GetY()+10,"Total des actes de vaccination: ".$totalactesvaccination);
$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");		  
$pdf->Text(130,$pdf->GetY()+15,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));
$pdf->Text(25,$pdf->GetY()+10,"Signature de l'IVW  ");$pdf->Text(125,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
$pdf->Text(137,$pdf->GetY()+5,$_SESSION["USER"]);
break;
};
case '1'://ANTI-CLAVELEUSE ******************************************************************************
{
$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->bilanentetef("BILAN FINAL DE VACCINATION ANTI-CLAVELEUSE \n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps3();
$pdf->SetXY(05,65); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
    //Brebis
    $query_liste = "SELECT datevac,SUM(vacb1)as Qvacb1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb1=$row['Qvacb1'];
	mysql_free_result($requete);
	//Béliers
    $query_liste = "SELECT datevac,SUM(vacb2)as Qvacb2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb2=$row['Qvacb2'];
	mysql_free_result($requete);
	//Antenais
    $query_liste = "SELECT datevac,SUM(vacb3)as Qvacb3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb3=$row['Qvacb3'];
	mysql_free_result($requete);
	//Antenaises
    $query_liste = "SELECT datevac,SUM(vacb4)as Qvacb4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb4=$row['Qvacb4'];
	mysql_free_result($requete);
    //Agneaux
    $query_liste = "SELECT datevac,SUM(vacb5)as Qvacb5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb5=$row['Qvacb5'];
	mysql_free_result($requete);
	//Agnelles
    $query_liste = "SELECT datevac,SUM(vacb6)as Qvacb6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb6=$row['Qvacb6'];
	mysql_free_result($requete);
	//Caprins
    $query_liste = "SELECT datevac,SUM(vacb7)as Qvacb7  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb7=$row['Qvacb7'];
	mysql_free_result($requete);
	//dose perdus
    $query_liste = "SELECT datevac,SUM(DPVAC)as DPVAC  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$DPVAC=$row['DPVAC'];
	mysql_free_result($requete);
	//NBR D ELEVEUR
    $query_liste = "SELECT datevac FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$NBRELEVEUR=mysql_num_rows($requete);
	mysql_free_result($requete);
$totalovins=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6;
$pdf->SetFont('aefurat', '', 11);	
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(100,10,"NOMBRE D OVINS VACCINES",1,0,'L',0);$pdf->SetXY(105,$pdf->GetY()); $pdf->cell(100,10,$totalovins,1,0,'C',0);	  
$pdf->SetXY(05,$pdf->GetY()+10); 	  
$pdf->cell(100,10,"NOMBRE D ELEVEURS TOUCHES",1,0,'L',0);$pdf->SetXY(105,$pdf->GetY()); $pdf->cell(100,10,$NBRELEVEUR,1,0,'C',0);	  
$pdf->SetXY(05,$pdf->GetY()+10); 	  
$pdf->cell(100,10,"NOMBRE DE DOSE DE VACCIN RECEPTIONNEES",1,0,'L',0);$pdf->SetXY(105,$pdf->GetY()); $pdf->cell(100,10,$totalovins+$DPVAC,1,0,'C',0);	  
$pdf->SetXY(05,$pdf->GetY()+10); 	  
$pdf->cell(100,10,"NOMBRE DE DOSES PERDUS",1,0,'L',0);$pdf->SetXY(105,$pdf->GetY()); $pdf->cell(100,10,$DPVAC,1,0,'C',0);	  
$pdf->SetXY(05,$pdf->GetY()+10); 	  
$pdf->cell(100,10,"NOMBRE DE DOSES RESTITUEES",1,0,'L',0);$pdf->SetXY(105,$pdf->GetY()); $pdf->cell(100,10,"00",1,0,'C',0);
$pdf->Text(110,$pdf->GetY()+20,$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
$pdf->Text(20,$pdf->GetY()+10,"Signature de l'IVW  ");$pdf->Text(110,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
$pdf->Text(120,$pdf->GetY()+5,$_SESSION["USER"]);
break;
};
case '2'://ANTI-BRUCELLIQUE ***********************************************************************************
{
$pdf->AddPage('L','A4');
$pdf->SetFont('aefurat', '', 10);
//$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->bilanentete("BILAN FINAL DE VACCINATION  ANTI-BRUCELLIQUE\n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps3();
$h1=50;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(10,14,"N°",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(60,14,"Nom de l'eleveur",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(20,14,"Nbr ovins ",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(20,14,"Nbr caprins ",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1);
$pdf->cell(30,14,"Zone/Lieu",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Brebis",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Béliers",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Antenais",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Antenaises",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Agneaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Agnelles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Caprins",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
$pdf->SetXY(145,$h1); 	  
$pdf->cell(90,7,"Repartition par age des ovins vaccinees",1,0,'C',0);
$pdf->SetXY(235,$h1); 	  
$pdf->cell(15,7,"Caprins",1,0,'C',0);


$pdf->SetXY(05,64); // marge sup 13Caprins
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' order by  NCERTIFICAT";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  if($row->vabc1!=0 or $row->vabc2!=0 or $row->vabc3!=0 or $row->vabc4!=0 or $row->vabc5!=0 or $row->vabc6!=0  or $row->vabc7!=0) {
   $pdf->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
   $pdf->cell(60,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0);
   $pdf->cell(20,5,$row->vabc1+$row->vabc2+$row->vabc3+$row->vabc4+$row->vabc5+$row->vabc6,1,0,'C',0);
   $pdf->cell(20,5,$row->vabc7,1,0,'C',0);  
   $pdf->cell(30,5,$pdf->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
   $pdf->cell(15,5,$row->vabc1,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc2,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc3,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc4,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc5,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc6,1,0,'C',0);
   $pdf->cell(15,5,$row->vabc7,1,0,'C',0);
   $pdf->cell(40,5,$row->DPVAB,1,0,'C',0);
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
    //dose perdus
    $query_liste = "SELECT datevac,SUM(DPVAB)as DPVAB  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$DPVAB=$row['DPVAB'];
	mysql_free_result($requete);	
$totalovins=$Qvabc1+$Qvabc2+$Qvabc3+$Qvabc4+$Qvabc5+$Qvabc6;
$totalovins1=$Qvabc7;	
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(70,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(20,0.5,$totalovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(20,0.5,$totalovins1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(30,0.5,'***',1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc6,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvabc7,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(40,0.5,$DPVAB,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+5,"Total des ovins vaccinés: ".$totalovins);
$pdf->Text(5,$pdf->GetY()+5,"Total des caprins vaccinés: ".$totalovins1);
$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$pdf->Text(220,$pdf->GetY(),$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
$pdf->Text(25,$pdf->GetY()+5,"Signature de l'IVW  ");$pdf->Text(205,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
$pdf->Text(215,$pdf->GetY()+5,$_SESSION["USER"]);
break;
};    
case '3'://ANTI-APHTEUX
{
$pdf->AddPage('L','A4');
$pdf->SetFont('aefurat', '', 10);
//$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->bilanentete("BILAN FINAL DE VACCINATION  ANTI-APHTEUSE \n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps3();
$h1=50;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(10,14,"N°",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(62,14,"Nom de l'eleveur",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(30,14,"Nbr bovins vaccinés",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(37,14,"Zone/Lieu",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(30,7,"Vaches Laitieres",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Génisses",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Taureaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Taurillons",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Veaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Velles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
$pdf->SetXY(144,$h1); 	  
$pdf->cell(105,7,"Repartition par age des bovins vaccinees",1,0,'C',0);
$pdf->SetXY(05,64); // marge sup 13
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' order by  NCERTIFICAT";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  if($row->vaad1!=0 or $row->vaad2!=0 or $row->vaad3!=0 or $row->vaad4!=0 or $row->vaad5!=0 or $row->vaad6!=0) {
   $pdf->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
   $pdf->cell(62,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0); 
   $pdf->cell(30,5,$row->vaad1+$row->vaad2+$row->vaad3+$row->vaad4+$row->vaad5+$row->vaad6,1,0,'C',0);        
   $pdf->cell(37,5,$pdf->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
   $pdf->cell(30,5,$row->vaad1,1,0,'C',0);
   $pdf->cell(15,5,$row->vaad2,1,0,'C',0);
   $pdf->cell(15,5,$row->vaad3,1,0,'C',0);
   $pdf->cell(15,5,$row->vaad4,1,0,'C',0);
   $pdf->cell(15,5,$row->vaad5,1,0,'C',0);
   $pdf->cell(15,5,$row->vaad6,1,0,'C',0);
   $pdf->cell(40,5,$row->DPVAA,1,0,'C',0);
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
    //dose perdus
    $query_liste = "SELECT datevac,SUM(DPVAA)as DPVAA  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$DPVAA=$row['DPVAA'];
	mysql_free_result($requete);
$totalbovins=$Qvaad1+$Qvaad2+$Qvaad3+$Qvaad4+$Qvaad5+$Qvaad6;
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(72,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(30,0.5,$totalbovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(37,0.5,'***',1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(30,0.5,$Qvaad1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvaad2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvaad3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvaad4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvaad5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvaad6,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(40,0.5,$DPVAA,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+5,"Total des bovins vaccinés: ".$totalbovins);
$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$pdf->Text(220,$pdf->GetY(),$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
$pdf->Text(25,$pdf->GetY()+5,"Signature de l'IVW  ");$pdf->Text(205,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
$pdf->Text(215,$pdf->GetY()+5,$_SESSION["USER"]);
break;
};
case '4'://ANTI-RABIQUE
{
$pdf->AddPage('L','A4');
$pdf->SetFont('aefurat', '', 10);
//$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->bilanentete("BILAN FINAL DE VACCINATION  ANTI-RABIQUE \n PERIODE DU $datejour11 AU $datejour22 ");
$pdf->corps3();
$h1=50;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(10,14,"N°",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(62,14,"Nom de l'eleveur",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(30,14,"Nbr bovins vaccinés",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(37,14,"Zone/Lieu",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(30,7,"Vaches Laitieres",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Génisses",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Taureaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Taurillons",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Veaux",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1+7); 	  
$pdf->cell(15,7,"Velles",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(40,14,"Nombre de doses perdues",1,0,'C',0);
$pdf->SetXY(144,$h1); 	  
$pdf->cell(105,7,"Repartition par age des bovins vaccinés",1,0,'C',0);
$pdf->SetXY(05,64); // marge sup 13
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$avn=$pdf->avn();
$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' order by  NCERTIFICAT";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  if($row->vare1!=0 or $row->vare2!=0 or $row->vare3!=0 or $row->vare4!=0 or $row->vare5!=0 or $row->vare6!=0) {
   $pdf->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
   $pdf->cell(62,5,$row->nomeleveur." / ".$row->FILSDE,1,0,'L',0); 
    $pdf->cell(30,5,$row->vare1+$row->vare2+$row->vare3+$row->vare4+$row->vare5+$row->vare6,1,0,'C',0);  
   $pdf->cell(37,5,$pdf->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
   $pdf->cell(30,5,$row->vare1,1,0,'C',0);
   $pdf->cell(15,5,$row->vare2,1,0,'C',0);
   $pdf->cell(15,5,$row->vare3,1,0,'C',0);
   $pdf->cell(15,5,$row->vare4,1,0,'C',0);
   $pdf->cell(15,5,$row->vare5,1,0,'C',0);
   $pdf->cell(15,5,$row->vare6,1,0,'C',0);
   $pdf->cell(40,5,$row->DPVAR,1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5); 
   }
  }
    // Vaches Laitières
    $query_liste = "SELECT datevac,SUM(vare1)as Qvare1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare1=$row['Qvare1'];
	mysql_free_result($requete);
   // Vaches Génisses
    $query_liste = "SELECT datevac,SUM(vare2)as Qvare2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare2=$row['Qvare2'];
	mysql_free_result($requete);
     // Vaches Taureaux
    $query_liste = "SELECT datevac,SUM(vare3)as Qvare3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare3=$row['Qvare3'];
	mysql_free_result($requete);
     // Vaches Taurillons
    $query_liste = "SELECT datevac,SUM(vare4)as Qvare4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare4=$row['Qvare4'];
	mysql_free_result($requete);
	 // Vaches Veaux
    $query_liste = "SELECT datevac,SUM(vare5)as Qvare5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare5=$row['Qvare5'];
	mysql_free_result($requete);
	 // Vaches Velles
    $query_liste = "SELECT datevac,SUM(vare6)as Qvare6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2'and AVN='$avn'";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvare6=$row['Qvare6'];
	mysql_free_result($requete);
    //dose perdus
    $query_liste = "SELECT datevac,SUM(DPVAR)as DPVAR  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVN='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$DPVAR=$row['DPVAR'];
	mysql_free_result($requete);
$totalbovins=$Qvare1+$Qvare2+$Qvare3+$Qvare4+$Qvare5+$Qvare6;
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(72,0.5,"TOTAL",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(30,0.5,$totalbovins,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(37,0.5,'***',1,0,'C',0);
$pdf->cell(30,0.5,$Qvare1,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvare2,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvare3,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvare4,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvare5,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(15,0.5,$Qvare6,1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
$pdf->cell(40,0.5,$DPVAR,1,0,'C',0);
$pdf->Text(5,$pdf->GetY()+5,"Total des bovins vaccinés: ".$totalbovins);
$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$pdf->Text(220,$pdf->GetY(),$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
$pdf->Text(25,$pdf->GetY()+5,"Signature de l'IVW  ");$pdf->Text(205,$pdf->GetY(),"Griffe et Signature du vétérinaire mandaté ");
$pdf->Text(215,$pdf->GetY()+5,$_SESSION["USER"]);
break;
};
} 
$pdf->Output();
?>


