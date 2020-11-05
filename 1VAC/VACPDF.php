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
header("Location:../index.php?uc=REGVAC0PDF") ; ///pose probleme non resolu
}
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'L', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
switch($_POST['vaccin'])
{
case '0'://BILAN VACCINATION 
{
$pdf->REGVACPDF ("RECAP BILAN PARTIEL DE VACCINATION \n PERIODE DU ","AVND",$_SESSION["AVN"],$datejour1,$datejour2) ;
// incomplet reste  les autre vaccination
break;
};
case '1'://ANTI-CLAVELEUSE 
{
$pdf->REGVACCPDF ("BILAN PARTIEL DE VACCINATION ANTI-CLAVELEUSE \n PERIODE DU ","AVND",$_SESSION["AVN"],"vacb1","vacb2","vacb3","vacb4","vacb5","vacb6","DPVAC",$datejour1,$datejour2) ;

	$pdf->AddPage('L','A4');
	$pdf->SetFont('aefurat', '', 10);
	$pdf->bilanentetepdf("LISTE DES ELEVEURS BENEFICIAIRES DE LA VACCINATION ANTI-CLAVELEUSE \n PERIODE DU $datejour11 AU $datejour22 ");
	$pdf->corps4();
	$h1=48;
	// $pdf->SetXY(05,$h1); 	  
	// $pdf->cell(10,14,"N°",1,0,'C',0);	
	$pdf->SetXY(05,$h1); 	  
	$pdf->cell(70,14,"Nom de l'eleveur",1,0,'C',0);
	$pdf->SetFont('aefurat', '', 9);
	$pdf->SetXY($pdf->GetX(),$h1); 	  
	$pdf->cell(25,14,"Nbr ovins vaccinés",1,0,'C',0);
	$pdf->SetFont('aefurat', '', 10);
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
	$pdf->SetXY($pdf->GetX(),$h1); 	  
	$pdf->cell(65,14,"DATE VACCINATION",1,0,'C',0);
	$pdf->SetXY(130,$h1); 	  
	$pdf->cell(90,7,"Repartition par age des ovins vaccinees",1,0,'C',0);
	$pdf->SetXY(05,62); // marge sup 13Caprins
	//********************************************************************************************//
	$db_host="localhost";
	$db_name="vaccinvet"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	$avn=$pdf->avnd();
	$query_liste = "SELECT * FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ORDER BY zonnelieu";
	$resultat=mysql_query($query_liste);
	//***********************************************************************//
	while($row=mysql_fetch_object($resultat))
	{
	if($row->vacb1!=0 or $row->vacb2!=0 or $row->vacb3!=0 or $row->vacb4!=0 or $row->vacb5!=0 or $row->vacb6!=0  or $row->vacb7!=0) {
	// $pdf->cell(10,5,$row->NCERTIFICAT,1,0,'C',0); 
	$pdf->cell(70,5,$row->nomeleveur."/".strtolower($row->FILSDE),1,0,'L',0);
	$pdf->cell(25,5,$row->vacb1+$row->vacb2+$row->vacb3+$row->vacb4+$row->vacb5+$row->vacb6,1,0,'C',0);     
	$pdf->cell(30,5,$pdf->nbrtocom3('vacccinvet','comm',$row->zonnelieu),1,0,'L',0);//$row->zonnelieu
	$pdf->cell(15,5,$row->vacb1,1,0,'C',0);
	$pdf->cell(15,5,$row->vacb2,1,0,'C',0);
	$pdf->cell(15,5,$row->vacb3,1,0,'C',0);
	$pdf->cell(15,5,$row->vacb4,1,0,'C',0);
	$pdf->cell(15,5,$row->vacb5,1,0,'C',0);
	$pdf->cell(15,5,$row->vacb6,1,0,'C',0);
	$pdf->cell(65,5,$row->datevac,1,0,'C',0);
	$pdf->SetXY(05,$pdf->GetY()+5); 
	}
	}
	// Brebis
	$query_liste = "SELECT datevac,SUM(vacb1)as Qvacb1  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb1=$row['Qvacb1'];
	mysql_free_result($requete);
	//Béliers
	$query_liste = "SELECT datevac,SUM(vacb2)as Qvacb2  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb2=$row['Qvacb2'];
	mysql_free_result($requete);
	//Antenais
	$query_liste = "SELECT datevac,SUM(vacb3)as Qvacb3  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb3=$row['Qvacb3'];
	mysql_free_result($requete);
	//Antenaises
	$query_liste = "SELECT datevac,SUM(vacb4)as Qvacb4  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb4=$row['Qvacb4'];
	mysql_free_result($requete);
	//Agneaux
	$query_liste = "SELECT datevac,SUM(vacb5)as Qvacb5  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb5=$row['Qvacb5'];
	mysql_free_result($requete);
	//Agnelles
	$query_liste = "SELECT datevac,SUM(vacb6)as Qvacb6  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb6=$row['Qvacb6'];
	mysql_free_result($requete);
	//Caprins
	$query_liste = "SELECT datevac,SUM(vacb7)as Qvacb7  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$row = mysql_fetch_array($requete); 
	$Qvacb7=$row['Qvacb7'];
	mysql_free_result($requete);

	//dose perdus
	// $query_liste = "SELECT datevac,SUM(DPVAC)as DPVAC  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	// $requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	// $row = mysql_fetch_array($requete); 
	// $DPVAC=$row['DPVAC'];
	// mysql_free_result($requete);

	//NBR D ELEVEUR
	// $query_liste = "SELECT datevac,SUM(DPVAC)as DPVAC  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and AVND='$avn' ";
	// $requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	// $row = mysql_fetch_array($requete); 
	// $DPVAC=$row['DPVAC'];
	// mysql_free_result($requete);
	$totalovins=$Qvacb1+$Qvacb2+$Qvacb3+$Qvacb4+$Qvacb5+$Qvacb6;	
	$pdf->SetXY(05,$pdf->GetY()); 	  
	$pdf->cell(70,0.5,"TOTAL",1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(25,0.5,$totalovins,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(30,0.5,'***',1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb1,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb2,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb3,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb4,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb5,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(15,0.5,$Qvacb6,1,0,'C',0);
	$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	$pdf->cell(65,0.5,'-----------------------',1,0,'C',0);
	///$pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	// /$pdf->cell(15,0.5,$Qvacb7,1,0,'C',0);
	// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
	// $pdf->cell(55,0.5,$DPVAC,1,0,'C',0);
	$pdf->Text(5,$pdf->GetY()+5,"Total des ovins vaccinés: ".$totalovins);
	$pdf->Text(5,$pdf->GetY()+5,"Tous les éleveurs cités ci-dessus ont été destinataire d'une copie de certificat de vaccination");	$pdf->Text(220,$pdf->GetY(),$pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"])." le: ".date('d/m/Y'));	  
	$pdf->Text(25,$pdf->GetY()+5,"  ");$pdf->Text(225,$pdf->GetY(),"Signature de l'IVD ");
	$pdf->Text(225,$pdf->GetY()+5,$_SESSION["USER"]);
   
break;
};
case '2'://ANTI-BRUCELLIQUE 
{
// incomplet reste  les autre vaccination
$pdf->REGVACBPDF ("BILAN PARTIEL DE VACCINATION ANTI-BRUCELLIQUE \n PERIODE DU ","AVND",$_SESSION["AVN"],"vabc1","vabc2","vabc3","vabc4","vabc5","vabc6","vabc7","DPVAB",$datejour1,$datejour2) ;
break;
};    
case '3'://ANTI-APHTEUX
{
// incomplet reste  les autre vaccination
$pdf->REGVACAPDF ("BILAN PARTIEL DE VACCINATION ANTI-APHTEUSE \n PERIODE DU ","AVND",$_SESSION["AVN"],"vaad1","vaad2","vaad3","vaad4","vaad5","vaad6","vaad7","DPVAA",$datejour1,$datejour2) ;
break;
};
case '4'://ANTI-RABIQUE
{
// incomplet reste  les autre vaccination
$pdf->REGVACAPDF ("BILAN PARTIEL DE VACCINATION ANTI-RABIQUE \n PERIODE DU ","AVND",$_SESSION["AVN"],"vare1","vare2","vare3","vare4","vare5","vare6","vare7","DPVAR",$datejour1,$datejour2) ;

break;
};
} 
$pdf->Output();
?>


