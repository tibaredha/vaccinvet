<?php
//******************************************************************************************************//
$N=$_POST["N"];
$date=$_POST["DATE"];
$dateeuro=date('d/m/Y');
$SVAC=$_POST["SVAC"];
$SVAA=$_POST["SVAA"];
$SVAR=$_POST["SVAR"];
$SVAB=$_POST["SVAB"];
$MVAC=$_POST["EVAC"];
$MVAA=$_POST["EVAA"];
$MVAR=$_POST["EVAR"];
$MVAB=$_POST["EVAB"];
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
$pdf->AddPage('p','A4');
$pdf->SetFont('aefurat', '', 10);
$pdf->boncommande("BON DE COMMANDE N° $N");
$h1=80;
$pdf->SetXY(05,$h1); 	  
$pdf->cell(15,12,"N°",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(105,12,"designation du produits",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(25,5,"restant",1,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(25,5,"quantite",1,0,'C',0);
$pdf->SetXY($pdf->GetX(),$h1); 	  
$pdf->cell(30,5,"quantite",1,0,'C',0);
$h=86;
$pdf->SetXY(125,$h); 	  
$pdf->cell(25,5,"stock",1,0,'C',0);
$pdf->SetXY(150,$h); 	  
$pdf->cell(25,5,"demande",1,0,'C',0);
$pdf->SetXY(175,$h); 	  
$pdf->cell(30,5,"livres",1,0,'C',0);
$pdf->SetXY(05,92); // marge sup 13
$pdf->lbc($pdf->GetY(),'1','Vaccin_anti-claveleux',$SVAC,$MVAC);
$pdf->lbc($pdf->GetY()+6,'1','Vaccin_anti-aphteux',$SVAA,$MVAA);
$pdf->lbc($pdf->GetY()+6,'1','Vaccin_anti-rabique',$SVAR,$MVAR);
$pdf->lbc($pdf->GetY()+6,'1','Vaccin_anti-brucellique',$SVAB,$MVAB);
$pdf->Rect(5, $pdf->GetY()+20, 75, 25,"d");$pdf->Rect(130, $pdf->GetY()+20, 75, 25,"d");
$pdf->Text(130,$pdf->GetY()+15," le: ".$dateeuro);
$pdf->Text(20,$pdf->GetY()+10,"cachet du service ivw");
$pdf->piedbon();

$pdf->Output();
?>


