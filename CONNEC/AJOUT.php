<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,150,200,'AJOUT VETERINAIRE');
$per -> sautligne (17);
$per ->f0('index.php?uc=','post','formGCS');
$per ->submit(560,520,' AJOUT VETERINAIRE'); 
$per ->label(100,280,'wilaya');                     $per ->WILAYA1(260,280,'wilaya','vaccinvet','wil'); 
$per ->label(100,310,'daira');                      $per ->DAIRA2(260,310,'daira');                    
$per ->label(100,340,'commune');                    $per ->COMMUNE3(260,340,'commune');                
$per ->label(100,370,'AVN');                        $per ->txt(260,370,'AVN',29,'');
$per ->label(100,400,'Veterinaire');                $per ->txt(260,400,'Veterinaire',29,'');
$per ->label(100,430,'MDP');                        $per ->txt(260,430,'MDP',29,'');
$per ->label(100,460,'ADMIN');                      $per ->txt(260,460,'ADMIN',29,'');
$per ->label(100,490,'Date Inscription');           $per ->txt(260,490,'DATEINSC',29,'');
$per ->label(100,520,'Confirmation');               $per ->txt(260,520,'OK',29,'');
$per ->label(500,280,'AVND');                       $per ->AVND(560,280,'');
$per ->label(500,310,'AVNW');                       $per ->AVNW(560,310,''); 
$per ->f1();

?>
