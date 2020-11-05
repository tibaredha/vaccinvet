<?php
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage('L','A4');
$pdf->SetFont('aefurat', '', 8);
$pdf->boncommande("REGISTRE DE STOCK VACCINS ......");
$h=64;
$pdf->SetXY(05,$h); 	  
$pdf->cell(60,05,"DATE",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h); 	  
$pdf->cell(40,05,"ENTREE",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h); 	  
$pdf->cell(40,05,"SORTIE",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h); 	  
$pdf->cell(40,05,"RESTE",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h); 	  
$pdf->cell(40,05," observation",1,0,'C',0);

$pdf->SetXY(05,70); // marge sup 
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * from STOCK ";
$resultat=mysql_query($query);

while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(60,5,$pdf->dateUS2FR($row->date),1,0,'L',0);
   $pdf->cell(40,5,$row->EVAC,1,0,'C',0);
   $pdf->cell(40,5,$row->SVAC,1,0,'C',0);
   $pdf->cell(40,5,$row->RVAC,1,0,'C',0);
   $pdf->cell(40,5,'',1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+6); 
  }
$pdf->Text(20,$pdf->GetY()+5,"cachet du service ivw");


$pdf->Output();
?>


