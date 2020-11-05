<?php
//******************************************************************************************************//
$N=$_POST["N"];
$date=$_POST["DATE"];
$dateeuro=date('d/m/Y');
 
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
//$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->boncommande("BON DE COMMANDE N° $N");
// 
$h1=80;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(15,12,"N°",1,0,'C',0);
$pdf->SetXY(20,$h1); 	  
$pdf->cell(105,12,"designation du produits",1,0,'C',0);
$pdf->SetXY(125,$h1); 	  
$pdf->cell(25,5,"restant",1,'C',0);
$pdf->SetXY(150,$h1); 	  
$pdf->cell(25,5,"quantite",1,0,'C',0);
$pdf->SetXY(175,$h1); 	  
$pdf->cell(30,5,"quantite",1,0,'C',0);
$h=86;
$pdf->SetXY(125,$h); 	  
$pdf->cell(25,5,"stock",1,0,'C',0);
$pdf->SetXY(150,$h); 	  
$pdf->cell(25,5,"demande",1,0,'C',0);
$pdf->SetXY(175,$h); 	  
$pdf->cell(30,5,"livres",1,0,'C',0);
$pdf->SetXY(05,92); // marge sup 13
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM produit  ";
$resultat=mysql_query($query_liste);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(15,5,$row->idprod,1,0,'C',0);            //5  =hauteur de la cellule origine =7
   $pdf->cell(105,5,$row->produit,1,0,'L',0);
   $pdf->cell(25,5,$row->qte,1,0,'C',0);
   $pdf->cell(25,5,$_POST["$row->produit"],1,0,'C',0);//quantite demande
   $pdf->cell(30,5,"",1,0,'C',0);
   $pdf->SetXY(05,$pdf->GetY()+6); 
  }
$pdf->Rect(5, $pdf->GetY()+20, 75, 25,"d");$pdf->Rect(130, $pdf->GetY()+20, 75, 25,"d");
$pdf->Text(130,$pdf->GetY()+15,"********* le: ".$dateeuro);
$pdf->Text(25,$pdf->GetY()+10,"cachet du service ");$pdf->Text(145,$pdf->GetY(),"LE VETERINAIRE "); 
$pdf->piedbon();

$pdf->Output();
?>


