<?php
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$uc=$_GET["uc"];
$idelev=$_GET["idelev"];
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->SetFooterMargin(0);
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->mysqlconnect();
$result = mysql_query("SELECT * FROM ordvet where id =$uc " );
while($data =  mysql_fetch_array($result))
{
$pdf->enteteord("Ordonnance",$data['bilan'],$data['a1'],$data['ESPECE'],$data['NBR'],$data['TNBR'],$data['AGE'],$data['TAGE'],$data['SEXE'],$idelev,$uc);	
}
$pdf->Output($idelev.'.pdf', 'I');
?>