<?php
include('./SESSION/SESSION.php');
$datejour1= $per -> verifannee($_POST['annee'],$_POST['mois'],$_POST['jour']);
$datejour2= $per -> verifannee($_POST['annee1'],$_POST['mois1'],$_POST['jour1']);
if ($datejour1>$datejour2)
{
header("Location: index.php?uc=REGVAC0") ;
} 
switch($_POST['vaccin'])
{
case '0'://REGISTRE DE VACCINATION
{
$per->REGVAC ("REGISTRE DE VACCINATION Dr:","AVND",$_SESSION["AVN"],"0","1","28","29",$datejour1,$datejour2) ;
break;
};
case '1'://ANTI-CLAVELEUSE
{
$per->REGVACCB ("REGISTRE DE VACCINATION ANTI-CLAVELEUSE Dr:","AVND",$_SESSION["AVN"],"0","1","2","3","4","5","6","7","8","DPVAC","28","29",$datejour1,$datejour2) ;
break;
};
case '2'://ANTI-BRUCELLIQUE
{
$per->REGVACCB ("REGISTRE DE VACCINATION ANTI-BRUCELLIQUE Dr:","AVND",$_SESSION["AVN"],"0","1","9","10","11","12","13","14","15","DPVAB","28","29",$datejour1,$datejour2) ;
break;
};
case '3'://ANTI-APHTEUX
{
$per->REGVACAR ("REGISTRE DE VACCINATION ANTI-APHTEUX Dr:","AVND",$_SESSION["AVN"],"0","1","16","17","18","19","20","21","DPVAA","28","29",$datejour1,$datejour2) ;
break;
};
case '4'://ANTI-RABIQUE
{
$per->REGVACAR ("REGISTRE DE VACCINATION ANTI-RABIQUE Dr:","AVND",$_SESSION["AVN"],"0","1","22","23","24","25","26","27","DPVAR","28","29",$datejour1,$datejour2) ;
break;
};
} 
?>


