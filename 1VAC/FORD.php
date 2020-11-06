<?php
if ($_POST["WILAYAR"] !=1 and $_POST["COMMUNER"] !=''  and $_POST["a1"] !=''  and $_POST["bilan"] !='' and $_POST["a3"] !='' and $_POST["a4"] !='' and $_POST["a5"] !='') 
{
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage();
$pdf->enteteord("Ordonnance",$_POST["bilan"],$_POST["a1"],strtoupper($_POST["a3"]),ucwords($_POST["a4"]),$_POST["a5"],$pdf->nbrtowil('vaccinvet','wil',$_POST["WILAYAR"]),$pdf->nbrtodai2('vaccinvet','dai',$_POST["DAIRA"]),$pdf->nbrtocom3('vaccinvet','comm',$_POST["COMMUNER"]),$_POST["ADRESSE"],$_POST["ESPECE"],$_POST["SEXE"],$_POST["AGE"],$_POST["TAGE"],$_POST["NBR"],$_POST["TNBR"],$_POST["IDELEV"]);
$pdf->Output();
}
else
{
header("Location: ../index.php?uc=NVAC") ;
}
?>


