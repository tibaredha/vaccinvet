<?php
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage();
$pdf->listvet("Liste des Vétérinaires Praticiens Privés de La Wilaya de Djelfa \n Arrété au ".date('d-m-Y'));
$h=65;
$pdf->SetXY(05,$h); 	  
$pdf->cell(60,05,"NOM_PRENOM",1,0,'C',0);
$pdf->SetXY(65,$h); 	  
$pdf->cell(16,05,"AVN°",1,0,'C',0);
$pdf->SetXY(81,$h); 	  
$pdf->cell(44,05," COMMUNE DU CABINET",1,0,'C',0);
$pdf->SetXY(125,$h); 	  
$pdf->cell(40,05," DAIRA DU CABINET",1,0,'C',0);
$pdf->SetXY(165,$h); 	  
$pdf->cell(40,05," WILAYA DU CABINET",1,0,'C',0);
$pdf->SetXY(05,70); // marge sup 13ADRESS EXACTE DU CABINET
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from users order by user";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(60,5,$row->USER,1,0,'L',0);
   $pdf->cell(16,5,$row->AVN,1,0,'C',0);
   $pdf->cell(44,5,$pdf->nbrtocom3('vaccinvet','comm',$row->COMMUNE),1,0,'C',0);
   $pdf->cell(40,5,$pdf->nbrtodai2('vaccinvet','dai',$row->DAIRA),1,0,'C',0);
   $pdf->cell(40,5,$pdf->nbrtowil('vaccinvet','wil',$row->WILAYA),1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+5); 
  }
$pdf->SetXY(05,$pdf->GetY()); 	  
$pdf->cell(60,05,"total",1,0,'C',0);
$pdf->SetXY(65,$pdf->GetY()); 	  
$pdf->cell(140,05,$totalmbr1,1,0,'C',0);
	 
$pdf->Output();
?>