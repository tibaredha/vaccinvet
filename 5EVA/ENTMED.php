<?php 
include('./SESSION/SESSION.php'); 
$per ->f0('index.php?uc=ENTMED1','post','form1');
$CM=array("Antibiotique");
$per ->label(80,200,'Categorie :');                      $per ->combov(310,200,'categorie',$CM)  ;
$per ->label(80,230,'Nom du Médicament vétérinaire:');   $per ->txtid(310,230,'name',30,'name');  
$per ->label(80,260,'Description Produit:');             $per ->txtid(310,260,'description',30,'description');
$per ->label(80,260+30,'C M M:');                        $per ->txtjs(310,260+30,'cmm',29,'00','stock()');  
$per ->label(80,260+60,'Stock min:');                    $per ->txtjs(310,260+60,'smin',29,'00','stock()');  
$per ->label(80,260+90,'Periodicite (en mois):');        $per ->txtjs(310,260+90,'per',29,'03','stock()');  
$per ->label(80,260+120,'Delai de livraison (en mois):');$per ->txtjs(310,260+120,'dlv',29,'01','stock()');  
$per ->label(80,260+150,'Quantite seuil:');              $per ->txtjs(310,260+150,'qts',29,'00','stock()');  
$per ->label(80,260+180,'Stock max:');                   $per ->txtjs(310,260+180,'smax',29,'00','stock()');  
$per ->label(80,260+210,'Stock actuel:');                $per ->txtjs(310,260+210,'qte',29,'00','stock()');  
$per ->label(80,260+240,'Prix:');                        $per ->txtjs(310,260+240,'price',29,'00','stock()');  
echo '<input type="hidden" name="date" id="IDORD"  value="'.date('Y-m-d').'">';
$per ->submit(1150,250,'Ajouter Nom du Médicament vétérinaire');
$per ->f1();
$per->sautligne (18);
$per ->list_med ('Liste des medicaments ','AVN',$_SESSION["AVN"],"","");
$per->sautligne (20);
?>