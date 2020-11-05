<?php 
include('./SESSION/SESSION.php'); 
$IDP=$_GET["IDP"];
$per ->h(2,150,200,'MODIFICATION VETERINAIRE');
$per -> sautligne (17);
$per ->f0('index.php?uc=MOD1','post','formGCS');
$per ->submit(560,520,'MODIFICATION VETERINAIRE');
$per ->hide(100,100,'IDP',20,$IDP);
$query_liste = "SELECT * FROM users where IDP=$IDP ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
while( $result = mysql_fetch_array( $requete ) )
{
$per ->label(100,280,'wilaya');                     $per ->WILAYA1(260,280,'wilaya','vaccinvet','wil'); // $per ->txt(260,280,'wilaya',29,$result[1]);
$per ->label(100,310,'daira');                      $per ->DAIRA2(260,310,'daira');                    // $per ->txt(260,310,'daira',29,$result[2]);
$per ->label(100,340,'commune');                    $per ->COMMUNE3(260,340,'commune');                //$per ->txt(260,340,'commune',29,$result[3]);
$per ->label(100,370,'AVN');                        $per ->txt(260,370,'AVN',29,$result[4]);
$per ->label(100,400,'Veterinaire');                $per ->txt(260,400,'Veterinaire',29,$result[5]);
$per ->label(100,430,'MDP');                        $per ->txt(260,430,'MDP',29,$result[6]);
$per ->label(100,460,'ADMIN');                      $per ->txt(260,460,'ADMIN',29,$result[7]);
$per ->label(100,490,'Date Inscription');           $per ->txt(260,490,'DATEINSC',29,$result[8]);
$per ->label(100,520,'Confirmation');               $per ->txt(260,520,'OK',29,$result[9]);
$per ->label(500,280,'AVND');                       $per ->AVND(560,280,$result[11]);// $per ->txt(560,280,'AVND',29,$result[11]);
$per ->label(500,310,'AVNW');                       $per ->AVNW(560,310,$result[12]); // $per ->txt(560,310,'AVNW',29,$result[12]);
} 
$per ->f1();
?>
<div style=" position:absolute;left:969px;top:270px;">	 
<h2 align="center"><img src='./images/photos/<?php echo $IDP;?>.jpg' width='160' height='160' border='0' alt=''/></h2>
</div>