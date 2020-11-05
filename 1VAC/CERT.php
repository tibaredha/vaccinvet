<?php
$IDVAC=$_GET["IDVAC"];
$DATE=$_GET["DATE"];
$ELEV=$_GET["ELEV"];
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
$vac=valeur($IDVAC,'vacb1')+valeur($IDVAC,'vacb2')+valeur($IDVAC,'vacb3')+valeur($IDVAC,'vacb4')+valeur($IDVAC,'vacb5')+valeur($IDVAC,'vacb6');
$vab=valeur($IDVAC,'vabc1')+valeur($IDVAC,'vabc2')+valeur($IDVAC,'vabc3')+valeur($IDVAC,'vabc4')+valeur($IDVAC,'vabc5')+valeur($IDVAC,'vabc6')+valeur($IDVAC,'vabc7');
$vaa=valeur($IDVAC,'vaad1')+valeur($IDVAC,'vaad2')+valeur($IDVAC,'vaad3')+valeur($IDVAC,'vaad4')+valeur($IDVAC,'vaad5')+valeur($IDVAC,'vaad6');
$var=valeur($IDVAC,'vare1')+valeur($IDVAC,'vare2')+valeur($IDVAC,'vare3')+valeur($IDVAC,'vare4')+valeur($IDVAC,'vare5')+valeur($IDVAC,'vare6');
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
$pdf->entete("CERTIFICAT DE VACCINATION ANTI-CLAVELEUSE \n ET/OU ANTI-BRUCELLIQUE DES OVINS/CAPRINS ",valeur($IDVAC,'NBILAN'),valeur($IDVAC,'NCERTIFICAT'));
$pdf->corps(valeur($IDVAC,'datevac'),valeur($IDVAC,'nomeleveur'),'',valeur($IDVAC,'FILSDE'),valeur($IDVAC,'CINPC'),valeur($IDVAC,'DAIRADE'),valeur($IDVAC,'CFN'),valeur($IDVAC,'DELE'),'i***',$pdf->nbrtodai2('vaccinvet','dai',valeur($IDVAC,'DAIRA')),$pdf->nbrtocom3('vaccinvet','comm',valeur($IDVAC,'zonnelieu')),valeur($IDVAC,'adresse'));
$pdf->ligne(140,"","Brebis","Béliers","Antenais","Antenaises","Agneaux","Agnelles","Caprins","Total");
$pdf->ligne(150,"ANTI-CLAVELEUSE",valeur($IDVAC,'vacb1'),valeur($IDVAC,'vacb2'),valeur($IDVAC,'vacb3'),valeur($IDVAC,'vacb4'),valeur($IDVAC,'vacb5'),valeur($IDVAC,'vacb6'),'00',$vac);
$pdf->ligne(160,"ANTI-BRUCELLIQUE",valeur($IDVAC,'vabc1'),valeur($IDVAC,'vabc2'),valeur($IDVAC,'vabc3'),valeur($IDVAC,'vabc4'),valeur($IDVAC,'vabc5'),valeur($IDVAC,'vabc6'),valeur($IDVAC,'vabc7'),$vab);
//nbrtostring helveticaB
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts($vac, "EUR");
$text = $obj->convert("fr-FR");
$pdf->Text(5,180,"le nombre de tetes ovines vaccinées contre la Clavelée :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(85,180,ucwords($text));
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts($vab, "EUR");
$text1 = $obj->convert("fr-FR");
$pdf->Text(5,190,"le nombre de tetes ovines et caprines vaccinées contre la Brucellose :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(105,190,ucwords($text1));
$pdf->SetFont('aefurat', 'B', 10);
$pdf->Text(5,270,"(1) rayer la mention inutile ");
$pdf->pied($pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"]),valeur($IDVAC,'datevac'));
//*************************************************************************************************************************************//
//2eme page
$pdf->AddPage();
$pdf->entete("CERTIFICAT DE VACCINATION ANTI-APHTEUSE \n ET ANTI-RABIQUE DES BOVINS ",valeur($IDVAC,'NBILAN'),valeur($IDVAC,'NCERTIFICAT'));
$pdf->corps1(valeur($IDVAC,'datevac'),valeur($IDVAC,'nomeleveur'),'',valeur($IDVAC,'FILSDE'),valeur($IDVAC,'CINPC'),valeur($IDVAC,'DAIRADE'),valeur($IDVAC,'CFN'),valeur($IDVAC,'DELE'),'i***',$pdf->nbrtodai2('vaccinvet','dai',valeur($IDVAC,'DAIRA')),$pdf->nbrtocom3('vaccinvet','comm',valeur($IDVAC,'zonnelieu')),valeur($IDVAC,'adresse'));
$pdf->ligne1(140,"","Vaches Laitières","Génisses","Taureaux","Taurillons","Veaux","Velles","Total");
$pdf->ligne1(150,"ANTI-APHTEUX",valeur($IDVAC,'vaad1'),valeur($IDVAC,'vaad2'),valeur($IDVAC,'vaad3'),valeur($IDVAC,'vaad4'),valeur($IDVAC,'vaad5'),valeur($IDVAC,'vaad6'),$vaa);
$pdf->ligne1(160,"ANTI-RABIQUE",valeur($IDVAC,'vare1'),valeur($IDVAC,'vare2'),valeur($IDVAC,'vare3'),valeur($IDVAC,'vare4'),valeur($IDVAC,'vare5'),valeur($IDVAC,'vare6'),$var);
//nbrtostring
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts($vaa, "EUR");
$text2 = $obj->convert("fr-FR");
$pdf->Text(5,180,"le nombre de tetes bovines vaccinées contre la Fièvre Aphteuse :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(98,180,ucwords($text2));
$pdf->SetFont('aefurat', 'B', 10);
$obj = new nuts($var, "EUR");
$text3 = $obj->convert("fr-FR");
$pdf->Text(5,190,"le nombre de tetes bovines et caprines vaccinées contre la Rage :");
$pdf->SetFont('helveticaB', 'B', 11);
$pdf->Text(98,190,ucwords($text3));
$pdf->SetFont('aefurat', 'B', 10);
$pdf->pied($pdf->nbrtodaira('vaccinvet','dai',$_SESSION["DAIRA"]),valeur($IDVAC,'datevac'));
$pdf->Output();


?>


