<?php
//un code qui marche tres bien mais ne repond pas au exigence personnel  le code fichier listdnr1
//simple et sofistique 
require('../PDF/invoice.php');

$pdf=new FPDF('P','cm','A4');

//Titres des colonnes
$header=array('DATE DON','idp','nomdnr','prenomdnr');

$pdf->SetFont('Arial','B',14);
$pdf->AddPage();
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(0.5,13); // marge sup 13

//**********************************************************************//
mysql_connect('localhost','root','') or die("ERROR DATABASE CONNECTION");
mysql_select_db('gpts2012') or die("DATA SELECTION ERRROR");
$query="select datedon,idp,nomdnr,prenomdnr, GROUPAGE ,RHESUS from tdon ORDER BY idp";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
//***********************************************************************//
$pdf->Text(5,5,"fgfghfgh");

// for($i=0;$i<sizeof($header);$i++)
    
// $pdf->cell(5,1,$header[$i],1,0,'C',1);
// $pdf->SetFillColor(0xdd,0xdd,0xdd);
// $pdf->SetTextColor(0,0,0);
// $pdf->SetFont('Arial','',8);
// $pdf->SetXY(0.5,$pdf->GetY()+1);
$fond=0;
while($row=mysql_fetch_array($resultat))
  {
   $pdf->cell(5,0.7,$row["datedon"],1,0,'C',$fond);//5  =hauteur de la cellule origine =7
   $pdf->cell(5,0.7,$row["idp"],1,0,'C',$fond);
   $pdf->cell(5,0.7,$row["nomdnr"],1,0,'C',$fond);
   $pdf->cell(5,0.7,$row["prenomdnr"],1,0,'C',$fond);
   $pdf->SetXY(0.5,$pdf->GetY()+1);
   
  }
 $pdf->AddPage(); 
 $pdf->Text(1,1,"fgfghfgh");
$pdf->output();
?>