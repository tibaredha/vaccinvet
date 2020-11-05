<?php
if ($_POST["WILAYAR"] !=1 and $_POST["COMMUNER"] !=''  and $_POST["a1"] !=''  and $_POST["bilan"] !='' and $_POST["a3"] !='' and $_POST["a4"] !='' and $_POST["a5"] !='') 
{
require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
 //strtoupper  strtolower  ucfirst  ucwords   mb_strtolower
//**************************************************************************************************************************************//
//1ERE page
$pdf->AddPage();
$pdf->enteteord("Ordonnance",$_POST["bilan"],$_POST["N"],$_POST["a1"],strtoupper($_POST["a3"]),ucwords($_POST["a4"]),$_POST["a5"],$pdf->nbrtowil('vaccinvet','wil',$_POST["WILAYAR"]),$pdf->nbrtodai2('vaccinvet','dai',$_POST["DAIRA"]),$pdf->nbrtocom3('vaccinvet','comm',$_POST["COMMUNER"]),$_POST["ADRESSE"]);
// $pdf->corpsord($_POST["a1"],strtoupper($_POST["a3"]),ucwords($_POST["a4"]),$_POST["a5"],$_POST["a6"],$_POST["a8"],$_POST["a9"],$_POST["a7"],);
// $pdf->ligne(140,"","Brebis","Béliers","Antenais","Antenaises","Agneaux","Agnelles","Caprins","Total");
// $pdf->ligne(150,"ANTI-CLAVELEUSE",$_POST["b1"],$_POST["b2"],$_POST["b3"],$_POST["b4"],$_POST["b5"],$_POST["b6"],$_POST["b7"],$_POST["b8"]);
// $pdf->ligne(160,"ANTI-BRUCELLIQUE",$_POST["c1"],$_POST["c2"],$_POST["c3"],$_POST["c4"],$_POST["c5"],$_POST["c6"],$_POST["c7"],$_POST["c8"]);
//nbrtostring helveticaB
// $pdf->SetFont('aefurat', 'B', 10);
// $obj = new nuts($_POST["b8"], "EUR");
// $text = $obj->convert("fr-FR");
// $pdf->Text(5,180,"le nombre de tetes ovines vaccinées contre la Clavelée :");
// $pdf->SetFont('helveticaB', 'B', 11);
// $pdf->Text(85,180,ucwords($text));
// $pdf->SetFont('aefurat', 'B', 10);
// $obj = new nuts($_POST["c8"], "EUR");
// $text1 = $obj->convert("fr-FR");
// $pdf->Text(5,190,"le nombre de tetes ovines et caprines vaccinées contre la Brucellose :");
// $pdf->SetFont('helveticaB', 'B', 11);
// $pdf->Text(105,190,ucwords($text1));
// $pdf->SetFont('aefurat', 'B', 10);
// $pdf->Text(5,270,"(1) rayer la mention inutile ");
// $pdf->pied($pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"]),$_POST["a1"]);
// $pdf->Code39(100, 235, $_SESSION["AVN"], $baseline=0.5, $height=16);
//*************************************************************************************************************************************//
//2eme page
// $pdf->AddPage();
// $pdf->entete("CERTIFICAT DE VACCINATION ANTI-APHTEUSE \n ET ANTI-RABIQUE DES BOVINS",$_POST["bilan"],$_POST["N"]);
// $pdf->corps1($_POST["a1"],strtoupper($_POST["a3"]),ucwords($_POST["a4"]),$_POST["a5"],$_POST["a6"],$_POST["a8"],$_POST["a9"],$_POST["a7"],$pdf->nbrtowil('vaccinvet','wil',$_POST["WILAYAR"]),$pdf->nbrtodai2('vaccinvet','dai',$_POST["DAIRA"]),$pdf->nbrtocom3('vaccinvet','comm',$_POST["COMMUNER"]),$_POST["ADRESSE"]);
// $pdf->ligne1(140,"","Vaches Laitières","Génisses","Taureaux","Taurillons","Veaux","Velles","Total");
// $pdf->ligne1(150,"ANTI-APHTEUX",$_POST["d1"],$_POST["d2"],$_POST["d3"],$_POST["d4"],$_POST["d5"],$_POST["d6"],$_POST["d7"]);
// $pdf->ligne1(160,"ANTI-RABIQUE",$_POST["e1"],$_POST["e2"],$_POST["e3"],$_POST["e4"],$_POST["e5"],$_POST["e6"],$_POST["e7"]);
//nbrtostring
// $pdf->SetFont('aefurat', 'B', 10);
// $obj = new nuts($_POST["d7"], "EUR");
// $text2 = $obj->convert("fr-FR");
// $pdf->Text(5,180,"le nombre de tetes bovines vaccinées contre la Fièvre Aphteuse :");
// $pdf->SetFont('helveticaB', 'B', 11);
// $pdf->Text(98,180,ucwords($text2));
// $pdf->SetFont('aefurat', 'B', 10);
// $obj = new nuts($_POST["e7"], "EUR");
// $text3 = $obj->convert("fr-FR");
// $pdf->Text(5,190,"le nombre de tetes bovines et caprines vaccinées contre la Rage :");
// $pdf->SetFont('helveticaB', 'B', 11);
// $pdf->Text(98,190,ucwords($text3));
// $pdf->SetFont('aefurat', 'B', 10);
// $pdf->pied($pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"]),$_POST["a1"]);
// $pdf->Code39(100, 235, $_SESSION["AVN"], $baseline=0.5, $height=16);
//*************************************************************************************************************************************//
//AJOUTER acte de VACCINATION DANS REGISTRE DE VACCINATION 
// if ( $_POST["b1"]!=0 or $_POST["b2"]!=0 or $_POST["b3"]!=0 or $_POST["b4"]!=0 or $_POST["b5"]!=0 or $_POST["b6"]!=0 or $_POST["b7"]!=0
  // or $_POST["c1"]!=0 or $_POST["c2"]!=0 or $_POST["c3"]!=0 or $_POST["c4"]!=0 or $_POST["c5"]!=0 or $_POST["c6"]!=0 or $_POST["c7"]!=0 
  // or $_POST["d1"]!=0 or $_POST["d2"]!=0 or $_POST["d3"]!=0 or $_POST["d4"]!=0 or $_POST["d5"]!=0 or $_POST["d6"]!=0
  // or $_POST["e1"]!=0 or $_POST["e2"]!=0 or $_POST["e3"]!=0 or $_POST["e4"]!=0 or $_POST["e5"]!=0 or $_POST["e6"]!=0
// )
// {

// prevoir 04 tables  en fonction du nbr de vaccins  
// $db_host="localhost";
// $db_name="vaccinvet"; 
// $db_user="root";
// $db_pass="";
// $avn=$pdf->avn();
// $avnd=$pdf->avnd();
// $avnw=$pdf->avnw();
// $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
// $db  = mysql_select_db($db_name,$cnx) ;
// mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
// $sql = "INSERT INTO regvac (FILSDE,WILAYA,DAIRA,NCERTIFICAT,datevac,nomeleveur,zonnelieu,AVN,vacb1,vacb2,vacb3,vacb4,vacb5,vacb6,vacb7,vabc1,vabc2,vabc3,vabc4,vabc5,vabc6,vabc7,vaad1,vaad2,vaad3,vaad4,vaad5,vaad6,vare1,vare2,vare3,vare4,vare5,vare6,WIL,DAI,COM,DPVAC,DPVAB,DPVAA,DPVAR,AVND,AVNW,NBILAN,CINPC,DELE,DAIRADE,CFN,adresse) 
// VALUES ('".$_POST["a5"]."','".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["N"]."','".$_POST["a1"]."','".strtoupper($_POST["a3"])."_".ucwords($_POST["a4"])."','".$_POST["COMMUNER"]."','".$avn."',
// '".$_POST["b1"]."','".$_POST["b2"]."','".$_POST["b3"]."','".$_POST["b4"]."','".$_POST["b5"]."','".$_POST["b6"]."','".$_POST["b7"]."',
// '".$_POST["c1"]."','".$_POST["c2"]."','".$_POST["c3"]."','".$_POST["c4"]."','".$_POST["c5"]."','".$_POST["c6"]."','".$_POST["c7"]."',
// '".$_POST["d1"]."','".$_POST["d2"]."','".$_POST["d3"]."','".$_POST["d4"]."','".$_POST["d5"]."','".$_POST["d6"]."',
// '".$_POST["e1"]."','".$_POST["e2"]."','".$_POST["e3"]."','".$_POST["e4"]."','".$_POST["e5"]."','".$_POST["e6"]."',
// '".$_POST["WIL"]."','".$_POST["DAI"]."','".$_POST["COM"]."',
// '".$_POST["DPb"]."','".$_POST["DPc"]."','".$_POST["DPd"]."','".$_POST["DPe"]."',
// '".$avnd."','".$avnw."','".$_POST["bilan"]."','".$_POST["a6"]."','".$_POST["a7"]."','".$_POST["a8"]."','".$_POST["a9"]."','".$_POST["ADRESSE"]."'
// )";
// $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
// }
$pdf->Output();
}
else
{
header("Location: ../index.php?uc=NVAC") ;
}
?>


