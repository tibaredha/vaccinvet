<?php 

$per ->h(3,100,220,"* Completer Simplement Le Formulaire Si dessous Pour S'inscrir ");

$per -> sautligne (18);
$per ->f0('index.php?uc=INS2','post','formGCS');
$per ->submit(560,520,' AJOUT VETERINAIRE'); 
$per ->label(100,280,'Wilaya');                     $per ->WILAYA1(260,280,'WILAYA','vaccinvet','wil'); $per ->photosx(1080,230,'Azul',150,150);
$per ->label(100,310,'Daira');                      $per ->DAIRA2(260,310,'DAIRA');                    
$per ->label(100,340,'Commune');                    $per ->COMMUNE3(260,340,'COMMUNE');                
$per ->label(100,400,'AVN');                        $per ->txt(260,400,'AVN',29,'');
$per ->label(100,370,'Nom d’utilisateur');          $per ->txt(260,370,'USER',29,'');
$per ->label(100,430,'MDP');                        $per ->txt(260,430,'MDP',29,0);
$per ->label(100,460,'Date Inscription');           $per ->txt(260,460,'DATEINSC',29,date("Y-m-d"));
$per ->f1();
$per ->h(3,100,490,"* votre compte sera activer prochainement ");
?>







      
      
	
	  
      
     
	
  