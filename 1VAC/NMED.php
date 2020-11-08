<?php
include('./SESSION/SESSION.php'); 
$idelev=$_GET["idelev"];
$IDORD=$_GET["ID"];
$per ->f0('index.php?uc=NMED1','post','comment_form');
$per ->label(80,230,'Nom du Médicament vétérinaire:');$per ->txtid(310,230,'MD',10,'MD');  
$per ->label(80,260,'Posologie:');                    $per ->txtid(310,260,'PS',10,'PS');  
$per ->label(80,290,'voie:');                         $per ->txtid(310,290,'VA',10,'VA');  
$per ->label(80,320,"Rythme d'administration:");      $per ->txtid(310,320,'RA',10,'RA');  
$per ->label(80,350,"Délai d'attente:");              $per ->txtid(310,350,'DA',10,'DA');  
echo '<input type="hidden" name="IDELEV" id="IDELEV"  value="'.$idelev.'">';
echo '<input type="hidden" name="IDORD" id="IDORD"  value="'.$IDORD.'">';
$per ->label(80,200,'Ordonnance N° :'.$IDORD); 
$per ->url(215,180,"1VAC/FORD.php?uc=".$IDORD."&idelev=".$idelev."","Ordonnance",4);
$per ->submit(1150,250,'Ajouter Nom du Médicament vétérinaire');
$per ->f1();
$per->sautligne (13);
$per ->list_med_eleveur ('Liste des medicaments ','AVN',$_SESSION["AVN"],$idelev,$IDORD);
$per->sautligne (20);
?>