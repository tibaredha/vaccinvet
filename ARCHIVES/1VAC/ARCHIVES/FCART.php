<?php
//model grand
$IDDNR=$_GET["iddnr"]; 
$nomdnr=$_GET["nomdnr"]; 
$prenomdnr=$_GET["prenomdnr"]; 
$sexe=$_GET["sexe"]; 
$GROUPAGE=$_GET["GROUPAGE"]; 
$RHESUS=$_GET["RHESUS"]; 
$Dns=$_GET["DATENAISSANCE"];
$dateeuro=date('d/m/Y');
$x=substr($dateeuro,6,4);
$Y=substr($_GET["DATENAISSANCE"],6,4);
$AGE=$x-$Y;
//******************************************************************************************************//  
require('../PDF/invoice.php');
$pdf = new PDF_Invoice( 'L', 'mm', 'A5' );
$pdf->AddPage('L','A5');
//image (url,x,y,hauteur,largeur,0)
$pdf->Image('../IMAGES/LOGOAO.GIF',152,30,15,15,0);
$pdf->SetFont('Arial','B',8);
$pdf->Rect(5, 5,95, 130 ,"d");
$pdf->Line( 5,20 ,100 ,20 );
$pdf->Text(10,13,"Date");
$pdf->Text(23,13,"N don");
$pdf->Text(40,13,"TA");



$pdf->Text(55,13,"Date");
$pdf->Text(68,13,"N don");
$pdf->Text(88,13,"TA");

$pdf->Line( 20,5 ,20 ,135);
$pdf->Line( 35,5 ,35 ,135);
$pdf->Line( 50,5 ,50 ,135);
$pdf->Line( 65,5 ,65 ,135);
$pdf->Line( 80,5 ,80 ,135);
$pdf->Line( 100,5 ,100 ,135);


$pdf->Line( 5,30 ,100 ,30 );
$pdf->Line( 5,30 ,100 ,30 );
$pdf->Line( 5,40 ,100 ,40 );
$pdf->Line( 5,50 ,100 ,50 );
$pdf->Line( 5,60 ,100 ,60 );
$pdf->Line( 5,70 ,100 ,70 );
$pdf->Line( 5,80 ,100 ,80 );
$pdf->Line( 5,90 ,100 ,90 );
$pdf->Line( 5,100 ,100 ,100 );
$pdf->Line( 5,110 ,100 ,110 );
$pdf->Line( 5,120 ,100 ,120 );




$pdf->Rect(110, 5,95, 130 ,"d");
$pdf->Text(115,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
$pdf->Text(135,15,"AGENCE NATIONALE DU SANG  ");
$pdf->Line(115 ,20 ,200 ,20 );
$pdf->SetFont('Arial','B',14);
$pdf->Text(150,55,"CARTE");
$pdf->Text(135,65,"DONNEUR DE SANG ");
$pdf->SetFont('Arial','B',8);
$pdf->Text(134,90,"Structure de Transfusion Sanguine:");
$pdf->Text(136,95,"PTS Ain oussera wilaya de Djelfa ");
$pdf->Text(115,125,"Numéro d identification du donneur: ");
$pdf->Text(165,125,$IDDNR);
$pdf->Text(115,130,"Delivrée le: ");
$pdf->Text(130,130,$dateeuro);

//********************************************************************************************************//
$pdf->AddPage('L','A5');
$pdf->SetFont('Arial','B',8);
$pdf->Rect(65, 10,30, 30 ,"d");
$pdf->Rect(5, 5,95, 130 ,"d");
$pdf->Text(10,15,"Goupage ABO:");
$pdf->Text(35,15,$GROUPAGE);
$pdf->Text(10,20,"Goupage RH:");
$pdf->Text(35,20,$RHESUS);
$pdf->Text(10,25,"Phenotype:");
$pdf->Text(75,25,"Photo");
$pdf->Text(35,25,"----------");
$pdf->Line(10 ,50 ,95 ,50);
$pdf->Text(10,60,"Nom:");
$pdf->Text(18,60,$nomdnr);
$pdf->Text(10,70,"Prenom:");
$pdf->Text(22,70,$prenomdnr);
$pdf->Text(10,80,"Date de naissance:");
$pdf->Text(37,80,$Dns);
$pdf->Text(10,90,"Carte etabli le:");
$pdf->Text(31,90,$dateeuro);
$pdf->Text(65,110,"le responssable:");
$pdf->Text(70,115,"Dr TIBA");

$pdf->Rect(110, 5,95, 130 ,"d");
$pdf->Text(115,15,"Date Du Premier Don:");
$pdf->Text(152,15,"------------------------------------");
$pdf->Text(115,20,"Nombre De Don Anterieur:");
$pdf->Text(152,20,"------------------------------------");


$pdf->Line(110 ,30 ,205 ,30);

$pdf->Line(110 ,40 ,205 ,40);
$pdf->Line(110 ,50 ,205 ,50);
$pdf->Line(110 ,60 ,205 ,60);
$pdf->Line(110 ,70 ,205 ,70);
$pdf->Line(110 ,80 ,205 ,80);
$pdf->Line(110 ,90 ,205 ,90);
$pdf->Line(110 ,100 ,205 ,100);
$pdf->Line(110 ,110 ,205 ,110);
$pdf->Line(110 ,120 ,205 ,120);

$pdf->Text(112,36,"Date");
$pdf->Text(125,36,"N don");
$pdf->Text(142,36,"TA");
$pdf->Text(157,36,"Date");
$pdf->Text(168,36,"N don");
$pdf->Text(188,36,"TA");

$pdf->Line( 122,30 ,122 ,135);
$pdf->Line( 135,30 ,135 ,135);
$pdf->Line( 150,30 ,150 ,135);
$pdf->Line( 165,30 ,165 ,135);
$pdf->Line( 180,30 ,180 ,135);
$pdf->Line( 110,30 ,110 ,135);









$pdf->Output();
?>



