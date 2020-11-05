<?php
//model reduit CARTE GROUPAGE
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
$pdf->Text(88,50,"DE GROUPE SANGUIN");
$pdf->Text(99,55,"-Receveur-");
$pdf->SetFont('Arial','B',8);
$pdf->Text(90,60,"Structure de Transfusion Sanguine:");
$pdf->Text(92,65,"PTS Ain oussera wilaya de Djelfa ");
$pdf->SetFont('Arial','B',7);
$pdf->Text(82,94,"Numéro d'identification du donneur: ");//
$pdf->Text(82,98,"Delivrée le: ");
//***********************************************************************************//
$pdf->SetFont('Arial','B',8);
$pdf->Text(2,13,"Date");
$pdf->Line(15,8 ,15 ,101);
$pdf->Text(16,13,"NBR°/GR.RH");
$pdf->Line(34,8 ,34 ,101);
$pdf->Text(38,13,"RAI");
$pdf->Line(49,8 ,49 ,101);
$pdf->Text(50,13,"OBSERVATION");
$pdf->Text(5,6,"Transfusion De Sang Nbr De Flacon Et Groupe");
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
//********************************************************************************************************//
$pdf->SetFont('Arial','B',8);
$pdf->Text(80,5,"1ERE détermination:");
$pdf->Text(80,10,$dateeuro);
$pdf->Text(80,15,"Laboratoire :");
$pdf->Text(80,20,"PTS Ain oussera");
$pdf->Text(80,25,"GROUPAGE:"."".$GROUPAGE);
$pdf->Text(80,30,"RHESUS:"."".$RHESUS);
$pdf->Text(80,35,"Du:------------------------------");
$pdf->Text(80,40,"D:-------------------------------");
$pdf->Text(80,45,"C:-------------------------------");
$pdf->Text(80,50,"E:-------------------------------");
$pdf->Text(80,55,"c:-------------------------------");
$pdf->Text(80,60,"e:-------------------------------");
$pdf->Text(80,65,"K:-------------------------------");
$pdf->Line(115,1 ,115 ,68);
$pdf->Text(116,5,"2EME détermination:");
$pdf->Text(116,10,"-------------------------------");
$pdf->Text(116,15,"Laboratoire :");
$pdf->Text(116,20,"-------------------------------");
$pdf->Text(116,25,"GROUPAGE:-------------");
$pdf->Text(116,30,"RHESUS:------------------");
$pdf->Text(116,35,"Du:----------------------------");
$pdf->Text(116,40,"D:-----------------------------");
$pdf->Text(116,45,"C:-----------------------------");
$pdf->Text(116,50,"E:-----------------------------");
$pdf->Text(116,55,"c:-----------------------------");
$pdf->Text(116,60,"e:-----------------------------");
$pdf->Text(116,65,"K:-----------------------------");
$pdf->Line(78 ,70 ,148 ,70);
$pdf->SetFont('Arial','B',9);
$pdf->Text(80,75,"les resultats figurant ci dessus ne doivent");
$pdf->Text(80,80,"étre considerés comme définitifs qu'aprés");
$pdf->Text(80,85,"une deuxième détermination effectuée sur");
$pdf->Text(80,90,"un second prélèvement.");


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





