<?php
//******************************************************************************************************//
$STR=$_POST["STR"];
$NOMDNR=$_POST["NOMDNR"];             
$PRENOMDNR=$_POST["PRENOMDNR"];        
$SEXE=$_POST["SEXE"];                  
$DATENAISSANCE=$_POST["DATENAISSANCE"];
$WILAYA=$_POST["WILAYAN"];             
$COMMUNE=$_POST["COMMUNEN"]; 
$WILAYAR=$_POST["WILAYAR"];           
$COMMUNER=$_POST["COMMUNER"]; 
$ADRESSE=$_POST["ADRESSE"]; 
$TELEPHONE=$_POST["TELEPHONE"];        
$TDNR=$_POST["TDNR"];                  
$TDON=$_POST["TDON"];                 
$POIDS=$_POST["POIDS"];               
$TA=$_POST["TA"];                                       
$HDP=$_POST["HDP"];
$date=$_POST["DATE"];
$NOM1   = substr($NOMDNR,0,2) ;
$PRENOM1= substr($PRENOMDNR,0,2);
$J      = substr($DATENAISSANCE,8,2);
$M      = substr($DATENAISSANCE,5,2);
$A      = substr($DATENAISSANCE,0,4);
$DNS    =  $J.$M.$A ;
$IDDNR  = $DNS.$NOM1.$PRENOM1.$SEXE ; 
$x=substr(date('d/m/Y'),6,4);
$Y=substr($DATENAISSANCE,0,4);
$AGE=$x-$Y;	
//*****************************************************************************************************//
require('../PDF/DNR.php');
$pdf = new DNR ( 'P', 'mm', 'A4' );
$pdf->entete();
$pdf->corps($POIDS);
// $pdf->SetXY(5,45);
// $pdf->Cell(43,8,$IDDNR ,1,1,'C');
$pdf->Code39(5,43,$IDDNR,1,12);
$pdf->Text(80,40,date('d/m/Y'));
$pdf->Text(136,40,$STR);
$pdf->Text(22,80,$NOMDNR);
$pdf->Text(100,80,$PRENOMDNR);
$pdf->Text(180,80,$SEXE);
$pdf->Text(22,90,$DATENAISSANCE);
$pdf->Text(178,90,$AGE."ans");
$pdf->Text(45,110,$pdf->nbrtowil('gpts2012','wil',$WILAYA)); //FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
$pdf->Text(130,110,$pdf->nbrtocom('gpts2012','com',$COMMUNE));//FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
$pdf->Text(45,120,$pdf->nbrtowil('gpts2012','wil',$WILAYAR));//FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
$pdf->Text(130,120,$pdf->nbrtocom('gpts2012','com',$COMMUNER));//FONCTION QUI TRANSFORME  CODE W/C EN WILAYA COMMUNE
$pdf->Text(45,130,$ADRESSE);
$pdf->Text(167,130,$TELEPHONE);
//**************************//
$pdf->Text(37,160,$TDNR);
$pdf->Text(20,170,$POIDS);
$pdf->Text(15,180,$TA);
$pdf->Text(32,190,$TDON);
$pdf->Text(45,210,$HDP);
$pdf->Text(5,285,$pdf->cherchednr($NOMDNR,$PRENOMDNR,$DATENAISSANCE,$SEXE)); 
$pdf->insertiondnr ($NOMDNR,$PRENOMDNR,$SEXE,$DATENAISSANCE,$WILAYA,$COMMUNE,$WILAYAR,$COMMUNER,$ADRESSE,$TELEPHONE,$date,$STR,$TDNR,$TDON,$POIDS,$TA);
//*************************//
$pdf->SetFillColor(250); //elle fonctionne avec 3 parametre si le 2et 3 sont absent  la couleurvarie du noire  au gris //sinon 1=rouge 2vert 3 bleu 
$pdf->setxy(10,10);
$pdf->Cell(20,10,'retour',0,1,'C',true,'http://localhost/GPTS2013/index.php?uc=NDNR');
$pdf->Output();
?>


