<?php
//registre de vaccination en foction du vaccin sans   where date
include('./SESSION/SESSION.php');

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
header("Location:./index.php?uc=REGVAC0") ;
}
$vaccin=$_POST['vaccin']; //pour utiliser un seul fichier pour plusieur vaccin  avec un switche 
$avn=$_SESSION["AVN"];
//******************************************************************************************************//

switch($vaccin)
{
case '0'://registre de vaccination
{
$per->REGVAC ("REGISTRE DE VACCINATION Dr:","AVND",$_SESSION["AVN"],"0","1","28","29",$datejour1,$datejour2) ;
break;
};
case '1'://ANTI-CLAVELEUSE
{
$per->REGVACCB1 ("REGISTRE DE VACCINATION ANTI-CLAVELEUSE Dr:","AVND",$_SESSION["AVN"],"0","1","2","3","4","5","6","7","8","DPVAC","28","29",$datejour1,$datejour2) ;
break;
};
case '2'://ANTI-BRUCELLIQUE
{
$per->REGVACCB1 ("REGISTRE DE VACCINATION ANTI-BRUCELLIQUE Dr:","AVND",$_SESSION["AVN"],"0","1","9","10","11","12","13","14","15","DPVAB","28","29",$datejour1,$datejour2) ;
break;
};
case '3'://ANTI-APHTEUX
{
$per->REGVACAR1 ("REGISTRE DE VACCINATION ANTI-APHTEUX Dr:","AVND",$_SESSION["AVN"],"0","1","16","17","18","19","20","21","DPVAA","28","29",$datejour1,$datejour2) ;
break;
};
case '4'://ANTI-RABIQUE
{
$per->REGVACAR1 ("REGISTRE DE VACCINATION ANTI-RABIQUE Dr:","AVND",$_SESSION["AVN"],"0","1","22","23","24","25","26","27","DPVAR","28","29",$datejour1,$datejour2) ;

break;
};
} 
?>


