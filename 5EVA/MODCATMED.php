<?php
include('./SESSION/SESSION.php'); 
$id=$_GET["id"];
$query_liste = "SELECT * FROM categorie where id=$id ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
$row = mysql_fetch_array($requete); 
$per ->f0('index.php?uc=MODCATMED1','post','form1');
$per ->label(80,230,'Nom Categorie Produit:');               $per ->txtid1(310,230,'categorie',30,'categorie',$row['categorie']);  
echo '<input type="hidden" name="idcategorie"  value="'.$id.'">';

$per ->submit(1150,250,'Modifier Categorie Produit');
$per ->f1();
$per->sautligne (5);
$per ->catmed_med ('Liste des Categories ');
$per->sautligne (5);
?>