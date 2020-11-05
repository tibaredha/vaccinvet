<?php
$IDVAC=$_GET["IDVAC"];
$DATE=$_GET["DATE"];
$ELEV=$_GET["ELEV"];


$vac=$_GET["vac2"]+$_GET["vac3"]+$_GET["vac4"]+$_GET["vac5"]+$_GET["vac6"]+$_GET["vac7"];

function valeur($IDVAC,$colone)
{
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM regvac where idregvac=$IDVAC";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$row=mysql_fetch_object($requete);
$valeur=$row->$colone;
return $valeur;
}

require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
 //strtoupper  strtolower  ucfirst  ucwords   mb_strtolower NBILAN NCERTIFICAT
//**************************************************************************************************************************************//
//1ERE page
$pdf->AddPage();
$pdf->entete("CERTIFICAT DE VACCINATION ANTI-CLAVELEUSE \n ET/OU ANTI-BRUCELLIQUE DES OVINS/CAPRINS \n en cour de realisation",valeur($IDVAC,'NBILAN'),valeur($IDVAC,'NCERTIFICAT'));
$pdf->corps($DATE,$ELEV,'','','','','','','','','','');
$pdf->ligne(140,"","Brebis","Béliers","Antenais","Antenaises","Agneaux","Agnelles","Caprins","Total");
$pdf->ligne(150,"ANTI-CLAVELEUSE",valeur($IDVAC,'vacb1'),valeur($IDVAC,'vacb2'),valeur($IDVAC,'vacb3'),valeur($IDVAC,'vacb4'),valeur($IDVAC,'vacb5'),valeur($IDVAC,'vacb6'),'00',$vac);
$pdf->ligne(160,"ANTI-BRUCELLIQUE",'00','00','00','00','00','00','00','00');
//nbrtostring helveticaB
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts($vac, "EUR");
$text = $obj->convert("fr-FR");
$pdf->Text(5,180,"le nombre de tetes ovines vaccinées contre la Clavelée :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(85,180,ucwords($text));
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts('', "EUR");
$text1 = $obj->convert("fr-FR");
$pdf->Text(5,190,"le nombre de tetes ovines et caprines vaccinées contre la Brucellose :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(105,190,ucwords($text1));
$pdf->SetFont('aefurat', 'B', 10);
$pdf->Text(5,270,"(1) rayer la mention inutile ");
$pdf->pied('','');
//*************************************************************************************************************************************//
//2eme page
$pdf->AddPage();
$pdf->entete("CERTIFICAT DE VACCINATION ANTI-APHTEUSE \n ET ANTI-RABIQUE DES BOVINS",'','');
$pdf->corps1($DATE,$ELEV,'','','','','','','','','','');
$pdf->ligne1(140,"","Vaches Laitières","Génisses","Taureaux","Taurillons","Veaux","Velles","Total");
$pdf->ligne1(150,"ANTI-APHTEUX",'00','00','00','00','00','00','00');
$pdf->ligne1(160,"ANTI-RABIQUE",'00','00','00','00','00','00','00');
//nbrtostring
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts('', "EUR");
$text2 = $obj->convert("fr-FR");
$pdf->Text(5,180,"le nombre de tetes bovines vaccinées contre la Fièvre Aphteuse :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(98,180,ucwords($text2));
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts('', "EUR");
$text3 = $obj->convert("fr-FR");
$pdf->Text(5,190,"le nombre de tetes bovines et caprines vaccinées contre la Rage :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(98,190,ucwords($text3));
$pdf->SetFont('aefurat', 'B', 10);
$pdf->pied('','');

$pdf->Output();


?>


