<?php
//VERIFICATION DES DATES
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
//AFFECTATION de la date de selection dans lancien exemple sans condition 
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
//condition si date1 ET SUP A DATE2  pose probleme
if ($datejour1>$datejour2)
{
header("Location:../index.php?uc=EVAVAA") ; ///pose probleme non resolu
}

//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'L', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
switch($_POST['vaccin'])
{
case '0'://BILAN VACCINATION ******************************************************************************
{
$pdf->REGVACPDF ("RECAP BILAN PARTIEL DE VACCINATION \n PERIODE DU ","AVN",$_SESSION["AVN"],$datejour1,$datejour2) ;

break;
};
case '1'://ANTI-CLAVELEUSE 
{
$pdf->REGVACCPDF ("BILAN PARTIEL DE VACCINATION ANTI-CLAVELEUSE \n PERIODE DU ","AVN",$_SESSION["AVN"],"vacb1","vacb2","vacb3","vacb4","vacb5","vacb6","DPVAC",$datejour1,$datejour2) ;
break;
};
case '2'://ANTI-BRUCELLIQUE ***********************************************************************************
{
$pdf->REGVACBPDF ("BILAN PARTIEL DE VACCINATION ANTI-BRUCELLIQUE \n PERIODE DU ","AVN",$_SESSION["AVN"],"vabc1","vabc2","vabc3","vabc4","vabc5","vabc6","vabc7","DPVAB",$datejour1,$datejour2) ;
break;
};    
case '3'://ANTI-APHTEUX
{
$pdf->REGVACAPDF ("BILAN PARTIEL DE VACCINATION ANTI-APHTEUSE \n PERIODE DU ","AVN",$_SESSION["AVN"],"vaad1","vaad2","vaad3","vaad4","vaad5","vaad6","vaad7","DPVAA",$datejour1,$datejour2) ;
break;
};
case '4'://ANTI-RABIQUE
{
$pdf->REGVACAPDF ("BILAN PARTIEL DE VACCINATION ANTI-RABIQUE \n PERIODE DU ","AVN",$_SESSION["AVN"],"vare1","vare2","vare3","vare4","vare5","vare6","vare7","DPVAR",$datejour1,$datejour2) ;
break;
};
case '5'://REGISTRE IMPOT
{
$pdf->IMPOTPDF("LISTE D ELVEURS BENEFICIAIRES DE LA VACCINATION \n PERIODE DU ","AVN",$_SESSION["AVN"],"vare1","vare2","vare3","vare4","vare5","vare6","vare7","DPVAR",$datejour1,$datejour2) ;
break;
};



} 
$pdf->Output();
?>


