<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_SESSION["IDP"]; 
$per ->h(2,150,180,'Modification Compte Utilisateur ');
$per -> sautligne (17);
$per ->f0('index.php?uc=CONF1','post','formGCS');
$per ->hide(100,100,'IDP',20,$IDP);
$per ->submit(940,200,' modification');
$query_liste = "SELECT * FROM users where IDP=$IDP ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
while( $result = mysql_fetch_array( $requete ) )
{             
$per ->label(100,300,'NOM UTILISATEUR');                $per ->txt(260,300,'Veterinaire',29,$result[5]);
$per ->label(100,350,'AVN');                            $per ->txt(260,350,'AVN',29,$result[4]);
$per ->label(100,400,'MDP');                            $per ->txt(260,400,'MDP',29,$result[6]);
$per ->label(100,450,'ADRESSE');                        $per ->txt(260,450,'ADRESSE',29,$result[21]);
} 
$per ->f1();
?>