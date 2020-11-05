<?php
//model reduit CARTE DONNEUR $_REQUEST["iddnr"]; 
//$IDDNR=1;
$nomdnr=$_REQUEST["NOMDNR"]; 
$prenomdnr=$_REQUEST["PRENOMDNR"]; 
$sexe=$_REQUEST["SEXE"]; 
$GROUPAGE=$_REQUEST["GROUPAGE"]; 
$RHESUS=$_REQUEST["rhesus"]; 
$Dns=$_REQUEST["DATENAISSANCE"];
$dateeuro=date('d/m/Y');
$x=substr($dateeuro,6,4);
$Y=substr($_REQUEST["DATENAISSANCE"],6,4);
$AGE=$x-$Y;
//******************************************************************************************************//
//constitution du IDDNR
$NOM1   = substr($_REQUEST["NOMDNR"],0,2) ;
$PRENOM1= substr($_REQUEST["PRENOMDNR"],0,2);
$J      = substr($_REQUEST["DATENAISSANCE"],0,2);
$M      = substr($_REQUEST["DATENAISSANCE"],3,2);
$A      = substr($_REQUEST["DATENAISSANCE"],8,2);
$DNS    =  $J.$M.$A ;
$IDDNR  = $DNS.$NOM1.$PRENOM1.$sexe ;         //
//******************************************************************************************************//
//******************************************************************************************************//  
require('../PDF/invoice.php');
$pdf = new PDF_Invoice( 'p', 'mm', 'A5' );
$pdf->SetDisplayMode('fullpage','two');//mode d affichage 
$pdf->AddPage('p','A5');
//image (url,x,y,hauteur,largeur,0)
$pdf->Image('../IMAGES/LOGOAO.GIF',105,20,15,15,0);
$pdf->SetFont('Arial','B',6);
$pdf->Rect(1, 1,70, 100 ,"d");
$pdf->Rect(78, 1,70, 100 ,"d");
$pdf->Text(82,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
$pdf->Text(96,15,"AGENCE NATIONALE DU SANG  ");
$pdf->Line(80 ,18 ,145 ,18 );
$pdf->SetFont('Arial','B',14);
$pdf->Text(104,45,"CARTE");
$pdf->Text(88,50,"DONNEUR DE SANG ");
$pdf->SetFont('Arial','B',8);
$pdf->Text(90,60,"Structure de Transfusion Sanguine:");
$pdf->Text(92,65,"PTS Ain oussera wilaya de Djelfa ");
$pdf->SetFont('Arial','B',7);
$pdf->Text(82,94,"Numéro d'identification du donneur: ");//
$pdf->Text(82,98,"Delivrée le: ");
$pdf->SetFont('Arial','B',8);
$pdf->Text(10,5,"Date");
$pdf->Line(25,1 ,25 ,101);
$pdf->Text(32,5,"N°don");
$pdf->Line(50,1 ,50 ,101);
$pdf->Text(58,5,"TA");
$pdf->Line(1 ,8 ,71 ,8 );
$pdf->Line(1 ,16 ,71 ,16 );
$pdf->Line(1 ,24 ,71 ,24 );
$pdf->Line(1 ,32 ,71 ,32);
$pdf->Line(1 ,40 ,71 ,40 );
$pdf->Line(1 ,48 ,71 ,48 );
$pdf->Line(1 ,56 ,71 ,56 );
$pdf->Line(1 ,64 ,71 ,64 );
$pdf->Line(1 ,72 ,71 ,72 );
$pdf->Line(1 ,80 ,71 ,80 );
$pdf->Line(1 ,88 ,71 ,88 );
//$pdf->Rect(1, 109,70, 100 ,"d"); RECTANGLE DE BAS 
//$pdf->Rect(78, 109,70, 100 ,"d");
//****************DONNES ******//
$pdf->SetTextColor(225,0,0);
$pdf->Text(125,94,$IDDNR);
$pdf->Text(95,98,$dateeuro);
$pdf->SetTextColor(0,0,0);
//********************************************************************************************************//
$pdf->AddPage('p','A5');

$pdf->SetFont('Arial','B',10);
$pdf->Rect(1, 1,70, 100 ,"d");
$pdf->Rect(78, 1,70, 100 ,"d");
$pdf->Text(4,10,"GROUPAGE:");
$pdf->Text(7,20,"RHESUS:");
$pdf->Text(6,30,"Phenotype:");
$pdf->Text(48,22,"Photo");
$pdf->Rect(35,1,36, 49 ,"d");//RECTANGLE PHOTO
$pdf->Line(1 ,50 ,71 ,50);
$pdf->Text(4,55,"Nom:");
$pdf->Text(4,60,"Prénom:");
$pdf->Text(4,65,"Date de naissance:");
$pdf->Text(4,70,"Carte établie le:");
$pdf->Text(25,80,"le responsable:");
$pdf->Text(30,85,"Dr TIBA");
$pdf->Text(82,8,"Date Du Premier Don:");
$pdf->Text(128,8,"-----------");
$pdf->Text(82,13,"Nombre De Don Antérieur:");
$pdf->Text(128,13,"-----------");
$pdf->Line(78 ,24 ,148 ,24 );
$pdf->Text(86,21,"Date");
$pdf->Line(100,16 ,100 ,101);
$pdf->Text(106,21,"N°don");
$pdf->Line(125,16 ,125 ,101);
$pdf->Text(132,21,"TA");
$pdf->Line(78 ,16 ,148,16);
$pdf->Line(78 ,32 ,148,32);
$pdf->Line(78 ,40 ,148 ,40 );
$pdf->Line(78 ,48 ,148 ,48 );
$pdf->Line(78 ,56 ,148,56 );
$pdf->Line(78,64 ,148,64 );
$pdf->Line(78 ,72 ,148,72 );
$pdf->Line(78 ,80 ,148,80 );
$pdf->Line(78 ,88 ,148,88 );

//******************DONNEES*****//
$pdf->SetTextColor(225,0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Text(13,15,$GROUPAGE);
$pdf->Text(8,25,$RHESUS);
$pdf->SetFont('Arial','B',10);
$pdf->Text(8,35,"********");
$pdf->Text(14,55,$nomdnr);
$pdf->Text(19,60,$prenomdnr);
$pdf->Text(37,65,$Dns);
$pdf->Text(30,70,$dateeuro);
$pdf->SetTextColor(0,0,0);
$pdf->Output();
?>




