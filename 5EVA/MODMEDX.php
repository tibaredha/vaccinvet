<?php
include('./SESSION/SESSION.php'); 
$id=$_GET["id"];
$query_liste = "SELECT * FROM products where id=$id ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
$row = mysql_fetch_array($requete); 
$per ->f0('index.php?uc=MODMEDX1','post','form1');
$per ->label(80,200,'Categorie Produit :');                      $per ->combov(310,200,'categorie',$per->CM($row['categorie']))  ;
$per ->label(80,230,'Nom Commercial Produit:');                  $per ->txtid1(310,230,'name',30,'name',$row['name']);  
$per ->label(80,260,'DCI Produit:');                             $per ->txtid1(310,260,'description',30,'description',$row['description']);
$per ->label(80,260+30,'Consommation Moyenne /(mois):');         $per ->txtjs(310,260+30,'cmm',29,$row['cmm'],'stock()');  
$per ->label(80,260+60,'Stock min Produit:');                    $per ->txtjs(310,260+60,'smin',29,$row['smin'],'stock()');  
$per ->label(80,260+90,'Periodicite de commande (mois):');       $per ->txtjs(310,260+90,'per',29,'03','stock()');  
$per ->label(80,260+120,'Delai de livraison (mois):');           $per ->txtjs(310,260+120,'dlv',29,'01','stock()');  
$per ->label(80,260+150,'Quantite seuil Produit:');              $per ->txtjs(310,260+150,'qts',29,$row['qts'],'stock()');  
$per ->label(80,260+180,'Stock max Produit:');                   $per ->txtjs(310,260+180,'smax',29,$row['smax'],'stock()');  
$per ->label(80,260+210,'Stock actuel Produit:');                $per ->txtjs(310,260+210,'qte',29,$row['qte'],'stock()');  
$per ->label(80,260+240,'Prix Produit:');                        $per ->txtjs(310,260+240,'price',29,$row['price'],'stock()');  
echo '<input type="hidden" name="date"   value="'.date('Y-m-d').'">';
echo '<input type="hidden" name="idmed"  value="'.$id.'">';
$per ->submit(1150,250,'Modifier Nom du Produit vétérinaire');
$per ->f1();
$per->sautligne (18);
?>