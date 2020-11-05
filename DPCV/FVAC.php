<?php
if ($_POST["WILAYAR"] !=1 and $_POST["COMMUNER"] !=''  and $_POST["a1"] !=''  and $_POST["ANNEE"] !='' and $_POST["a3"] !='' and $_POST["a4"] !='' and $_POST["a5"] !='') {
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage();
$M=10;
$pdf->SetFont('helveticaB', 'U', 16);
$pdf->Text(65,$pdf->GetY()+$M+45,"Demande de participation");
$pdf->Text(60,$pdf->GetY()+$M,"aux campagnes de vaccination");
$pdf->SetFont('helvetica', '', 14);
$pdf->Text(25,$pdf->GetY()+$M+20,"J'ai l'honneur , Dr: ".strtoupper($_POST["a3"])." ".ucwords($_POST["a4"]));$pdf->Text(150,$pdf->GetY(),"AVN:".$_POST["a5"]);
$pdf->Text(20,$pdf->GetY()+$M,"Praticien privé installé à la commune : ".$pdf->nbrtocom3('vaccinvet','comm',$_POST["COMMUNER"]));
$pdf->Text(20,$pdf->GetY()+$M,"Daïra : ".$pdf->nbrtodaira('vaccinvet','dai',$_POST["DAIRA"]));$pdf->Text(96,$pdf->GetY(),"de solliciter votre haute bienveillance ");
$pdf->Text(20,$pdf->GetY()+$M,"d'accepter ma demande de participation aux campagnes de vaccination:");
$pdf->Text(20,$pdf->GetY()+$M,"V.A.C , V.A.A, V.A.R ,et V.A.B (".$_POST["ANNEE"].".)");
$pdf->SetFont('helveticaB', '', 14);
$pdf->Text(32,$pdf->GetY()+$M,"Veuillez Monsieur l'inspecteur, agréer mes sentiments les plus ");
$pdf->Text(20,$pdf->GetY()+$M,"distinguées.");
$pdf->SetFont('helvetica', '', 14);
$pdf->Text(90,$pdf->GetY()+$M,"Fait à: ".$pdf->nbrtocom3('vaccinvet','comm',$_POST["COMMUNER"])."  le: ".$pdf->dateUS2FR($_POST["a1"]));
$pdf->SetFont('helvetica', '', 14);
$pdf->Text(100,$pdf->GetY()+$M,"Signature et cachet");
$pdf->Text(85,$pdf->GetY()+$M,"(De l'intéressé Dr: ".strtoupper($_POST["a3"])." ".ucwords($_POST["a4"]).")");
//inserer enregistrement dan table dpcv
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "INSERT INTO dpcv (WILAYA,DAIRA,COMMUNE,NOM,PRENOM,AVN,DATEDEMANDE,ANNEE,ADRESSE) 
VALUES ('".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNER"]."','".$_POST["a3"]."','".$_POST["a4"]."','".$_POST["a5"]."','".$_POST["a1"]."','".$_POST["ANNEE"]."','".$_POST["ADRESSE"]."')";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());


$pdf->Output();
}
else
{
header("Location: ../index.php?uc=DPCV") ;
}

?>


