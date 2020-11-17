<?php 
include('./SESSION/SESSION.php'); 
$per ->f0('index.php?uc=CATMED1','post','form1');
$per ->label(80,230,'Nom Categorie Produit:');               $per ->txtid(310,230,'categorie',30,'categorie');  
$per ->submit(1150,250,'Ajouter Categorie Produit');
$per ->f1();
$per->sautligne (5);
$per ->catmed_med ('Liste des Categories ');
$per->sautligne (5);
?>