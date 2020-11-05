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
if ($datejour1>$datejour2)
{
header("Location:../index.php?uc=EVAVAAC") ; ///pose probleme non resolu
}
//******************************************************************************************************//
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'L', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
switch($_POST['vaccin'])
{
case '0'://BILAN VACCINATION 
{
// incomplet reste  les autre vaccination

break;
};
case '1'://ANTI-CLAVELEUSE 
{
$pdf->BPD("FLASH DE LA CAMPAGNE DE VACCINATION ANTI-CLAVELEUSE \n Période du","AVND",$_SESSION["AVN"],"vacb1","vacb2","vacb3","vacb4","vacb5","vacb6","DPVAC","VACQE",$datejour1,$datejour2);	

break;
};
case '2'://ANTI-BRUCELLIQUE 
{
$pdf->BPD("FLASH DE LA CAMPAGNE DE VACCINATION ANTI-BRUCELLIQUE \n Période du","AVND",$_SESSION["AVN"],"vabc1","vabc2","vabc3","vabc4","vabc5","vabc6","DPVAB","VABQE",$datejour1,$datejour2);	
//probleme non resolu pour nbr deleveur total ??????????
// incomplet reste  les autre vaccination
break;
};    
case '3'://ANTI-APHTEUX
{
// incomplet reste  les autre vaccination
break;
};
case '4'://ANTI-RABIQUE
{
// incomplet reste  les autre vaccination
break;
};
} 
$pdf->Output();

?>


