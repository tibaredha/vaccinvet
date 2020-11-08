<?php
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$uc=$_GET["uc"];
$idelev=$_GET["idelev"];
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
$result = mysql_query("SELECT * FROM ordvet where id =$uc " );
while($data =  mysql_fetch_array($result))
{
$pdf->enteteord("Ordonnance",$data['bilan'],$data['a1'],$data['ESPECE'],$data['NBR'],$data['TNBR'],$data['AGE'],$data['TAGE'],$data['SEXE'],$idelev,$uc);	
}
$pdf->Output();
?>


