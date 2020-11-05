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
$pdf->Text(18,12,"Transfusion De Sang /nombre de flacon et groupe/ ");
$pdf->Text(10,25,"Date");
$pdf->Text(23,25,"Nbr");
$pdf->Text(38,25,"Groupe");
$pdf->Text(55,25,"RAI");
$pdf->Text(67,25,"Médecin");
$pdf->Text(82,25,"Observation");



$pdf->Line( 20,15 ,20 ,135);
$pdf->Line( 35,15 ,35 ,135);
$pdf->Line( 50,15 ,50 ,135);
$pdf->Line( 65,15 ,65 ,135);
$pdf->Line( 80,15 ,80 ,135);
$pdf->Line( 100,15 ,100 ,135);


$pdf->Line( 5,15 ,100 ,15 );
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
$pdf->Text(132,65,"DE GROUPE SANGUIN");
$pdf->Text(146,70,"-Receveur-");
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
$pdf->SetFont('Arial','B',7);
$pdf->Text(10,30,"les resultats figurant ci dessus ne doivent");
$pdf->Text(10,35,"étre considerés comme définitifs qu aprés");
$pdf->Text(10,40,"une deuxième détermination effectuée sur");
$pdf->Text(10,45,"un second prélèvement.");
$pdf->SetFont('Arial','B',8);

$pdf->Line(10 ,50 ,95 ,50);
$pdf->Text(10,60,"Nom:");
$pdf->Text(18,60,$nomdnr);
$pdf->Text(10,70,"Prenom:");
$pdf->Text(22,70,$prenomdnr);
$pdf->Text(10,80,"Date de naissance:");
$pdf->Text(37,80,$Dns);
$pdf->Text(10,90,"Carte etablie le:");
$pdf->Text(31,90,$dateeuro);
$pdf->Text(65,110,"le responssable:");
$pdf->Text(70,115,"Dr TIBA");

$pdf->Rect(110, 5,95, 130 ,"d");
$pdf->Text(115,15,"Premeiere détetmination:");
$pdf->Text(160,15,"---------------------------------------------");
$pdf->Text(115,20,"Nom Et Adresse Du Laboratoire :");
$pdf->Text(160,20,"---------------------------------------------");
$pdf->Text(115,25,"Goupage ABO:");
$pdf->Text(115,30,"Goupage RH:");
$pdf->Text(115,35,"Du:");
$pdf->Text(115,40,"D:");
$pdf->Text(115,45,"C:");
$pdf->Text(115,50,"E:");
$pdf->Text(115,55,"c:");
$pdf->Text(115,60,"e:");
$pdf->Text(115,65,"K:");


$pdf->Line(110 ,70 ,205 ,70);
$pdf->Text(115,75,"Dexieme détetmination:");
$pdf->Text(160,75,"---------------------------------------------");
$pdf->Text(115,80,"Nom Et Adresse Du Laboratoire :");
$pdf->Text(160,80,"---------------------------------------------");
$pdf->Text(115,85,"Goupage ABO:");
$pdf->Text(115,90,"Goupage RH:");
$pdf->Text(115,95,"Du:");
$pdf->Text(115,100,"D:");
$pdf->Text(115,105,"C:");
$pdf->Text(115,110,"E:");
$pdf->Text(115,115,"c:");
$pdf->Text(115,120,"e:");
$pdf->Text(115,125,"K:");


$pdf->Output();

?>


