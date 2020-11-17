<?php
include('./SESSION/SESSION.php'); 
$idelev=$_GET["idelev"];
$IDORD=$_GET["ID"];
$per ->f0('index.php?uc=NMED1','post','comment_form');
$per ->url(80,180,"1VAC/FORD.php?uc=".$IDORD."&idelev=".$idelev."","Ordonnance N° : ".$IDORD,4);
$per ->url(80,210,"index.php?uc=ENTMED","Categorie/Nom du Médicament:",4);$per->CM(310,230,'categorie',"1","Antibiotique"); $per ->products(550,230,"MD");    
$per ->label(80,260,'Posologie:');                              $per ->txtid(310,260,'PS',10,'PS');  
$VA=array("Auriculaire","Cutanee","Hypodermique","I.M","I.P","I.V","Intra-arterielle","Intra-articulaire","Intra-cardiaque","Intradermique","Intramammaire","Intrarachidienne","Intrarumina","Intra-synoviale","Intra-tacheale","Nasale","Nebulisation","Oculaire","Par effraction","Paravertebrale","Percutanee","Peros","Pulmonaire","Rectale","Sublinguinale","Tracheobrochique","Transfixion","Tronculaire","Urogenitale");
$per ->label(80,290,'voie:');                                   $per ->combov(310,290,'VA',$VA)  ;//$per ->txtid(310,290,'VA',10,'VA');  
$per ->label(80,320,"Rythme d'administration:");                $per ->txtid(310,320,'RA',10,'RA');  
echo '<input type="hidden" name="IDELEV" id="IDELEV"  value="'.$idelev.'">';
echo '<input type="hidden" name="IDORD" id="IDORD"  value="'.$IDORD.'">';
$per ->submit(80,380,'Ajouter Nom du Médicament vétérinaire');
$per ->f1();
$per->sautligne (13);
$per ->list_med_eleveur ('Liste des medicaments ','AVN',$_SESSION["AVN"],$idelev,$IDORD);
$per->sautligne (20);
?>