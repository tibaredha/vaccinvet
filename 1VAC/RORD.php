<?php
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$date=$_POST["annee"]."-".$_POST["mois"]."-".$_POST["jour"];
$date1=$_POST["annee1"]."-".$_POST["mois1"]."-".$_POST["jour1"];
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage();

$db_host="localhost"; 
$db_user="root";
$db_pass="";
$db_name="vaccinvet";

$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$result = mysql_query("SELECT * FROM ordvet where a1 BETWEEN '$date' AND '$date1' order by a1" );

$pdf->SetFont('aefurat', '', 12);
$pdf->Image("logo.png", $x=75, $y=5, $w=0, $h=0, $type='PNG', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$pdf->Text(5,10,"REBHI Mohammed");
$pdf->Text(5,$pdf->GetY()+5,"Docteur Vétérinaire");
$pdf->Text(5,$pdf->GetY()+5,"AVN : 89034");
$pdf->Text(5,$pdf->GetY()+10,"Adresse : Station de monte ");
$pdf->Text(5,$pdf->GetY()+5,"Rue Mohamed Boudiaf  Ain oussera ");
$pdf->Text(5,$pdf->GetY()+5,"Tél : 0550885260");
$pdf->Text(5,$pdf->GetY()+5,"Mail : rebhimohamed96@gmail.com");

$pdf->SetXY(10,$pdf->GetY()+10);$pdf->cell(190,10,"REGISTRE DES ORDONNANCES",1,1,'C',0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(190,10,"DU : ".$date." AU : ".$date1,1,1,'C',0);$pdf->SetFillColor(68,114,199);

$pdf->SetXY($pdf->GetX(),$pdf->GetY()+10);$pdf->cell(20,10,"N°",1,0,'C',1,0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(60,10,"Nom du client",1,0,'C',1,0);$pdf->SetFont('aefurat', '', 9);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(25,10,"ESPECES",1,0,'C',1,0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(25,10,"NBR-MED",1,0,'C',1,0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(35,10,"ADRESSE",1,0,'C',1,0);
$pdf->SetXY($pdf->GetX(),$pdf->GetY());$pdf->cell(25,10,"DATE",1,0,'C',1,0);
$pdf->SetXY(10,$pdf->GetY()+10);

while($data =  mysql_fetch_object($result))
{
	$result1 = mysql_query('SELECT * FROM elev where idelev ='.$data->IDELEV );while($data1 =  mysql_fetch_object($result1)){$nom=$data1->nomelev;$prenom=$data1->prenomelev;	$filsde=$data1->filsde;$adresse=$data1->ADRESSE;}


	$pdf->cell(20,5,$data->bilan,1,0,'C',0);	
	$pdf->cell(60,5,$nom.'_'.$prenom.'_'.$filsde,1,0,'L',0);	
	$pdf->cell(25,5,$data->ESPECE,1,0,'C',0);	

	$result2 = mysql_query('SELECT * FROM medvet where IDORD ='.$data->id );
	$total=mysql_num_rows($result2);

	$pdf->cell(25,5,$total,1,0,'C',0);	
	$pdf->cell(35,5,$adresse,1,0,'L',0);	
	$pdf->cell(25,5,$pdf->dateUS2FR($data->a1),1,0,'C',0);	
	$pdf->SetXY(10,$pdf->GetY()+5);	
}
$pdf->Output('reg_ord.pdf', 'I');
?>


