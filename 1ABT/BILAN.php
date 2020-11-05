<?php
require('../TCPDF/battoire.php');
$pdf = new bat('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetFont('aefurat', '', 12);
//************************CORPS*************************// 
$pdf->Text(55,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(50,15,"MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL");
$pdf->Text(5,30,"DIRECTIONS DES SERVICES AGRICOLES");
$pdf->Text(5,35,"INSPECTION VETERINAIRE DE LA WILAYA :DJELFA");
$pdf->Text(5,40,"DAIRA:");
$pdf->Text(5,45,"COMMUNE:");
$pdf->Text(5,50,"N° : ........../IVD/");
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(60,60," BILAN DES INSPECTIONS DES VIANDES ");
$pdf->Text(65,65," ET POISSONS MOIS");
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,70," TUERIE /");
//1ere page 
$pdf->Text(5,75,"1-VIANDES ROUGES");
$pdf->entete(80);
$H1=111111;
$pdf->ligne(100,'Males',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne0(110,'Poids (kg)',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(120,'Femelles',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne0(130,'Poids (kg)',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(140,'Total',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne0(150,'Poids moyen(kg)',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,170,"2-VIANDES FORRAINES:");
$pdf->entete(175);
$pdf->ligne(195,'Total',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
//2eme page 
$pdf->AddPage();
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,5,"3-ETAT DES SAISIES DES VIANDES:");
$pdf->entete(10);
$pdf->ligne(30,'Tuberculose',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(40,'Viandes ictériques',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(50,'Pneumonies',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(60,'Ladrerie',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(70,'Septicémie',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(80,'Etat cadavérique',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(90,'Viande fiévreuse',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(100,'Viande cachectique',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(110,'Mélanose',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(120,'Viande traumatique',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(130,'Autre à préciser',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->ligne(140,'Total',$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1,$H1);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(5,150,"4-ETAT  DES SAISIES D'ORGANES ET NOMBRE D'ANIMAUX ATTEINTS/MALADIE:");
$pdf->entete(155);
$pdf->ligne1(175,'Hydatidose');
$pdf->ligne1(195,'Tuberculose');
$pdf->ligne1(215,'Fasciolose');
$pdf->ligne1(235,'Autres ');
$pdf->ligne1(255,'Total');
//3eme page 
$pdf->AddPage();
$pdf->Text(5,10,"5-VIANDES BLANCHES");
$pdf->entete2(20);
$pdf->ligne2(40,'Poulets');
$pdf->ligne2(50,'Dindes');
$pdf->ligne2(60,'canards');
$pdf->ligne2(70,'autres');
$pdf->Text(5,85,"6-POISSONS:");
$pdf->entete3(90);
$pdf->ligne3(100,'Poissons blancs');
$pdf->ligne3(110,'Poissons bleus');
$pdf->ligne3(120,'total');
$pdf->Text(5,135,"7-OBSEVATIONS");
$pdf->Text(10,145,"1.	état général des carcasses");
$pdf->Text(10,155,"2.	état des saisies");
$pdf->Text(10,165,"3.	état de l'abattoir ou tuerie (infrastructure, hygiène)");
$pdf->Text(5,175,"8-COUT DE LA VIANDE ET POISSONS");
$pdf->entete4(180);
$pdf->Text(5,215,"9-ABATTAGE SANITAIRE");
$pdf->ABATTAGE(220);
$pdf->Text(155,250,"Ain oussera");
$pdf->Output();

?>
