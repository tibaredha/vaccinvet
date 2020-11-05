<?php 
include('./SESSION/SESSION.php'); 
include('./class/class.php');
$id  = $_REQUEST['idon']; 
$sql = "SELECT * FROM tdon WHERE idon = ".$id ;
$requete = mysql_query( $sql, $cnx ) ; 
if( $result = mysql_fetch_object( $requete ) )
{
$per ->h(2,500,180,'CONFIRMER DONNEUR');
$per -> sautligne (2);
$per -> photos(1000,250);
$per ->f0('index.php?uc=CONFDNR3','post');
$per ->submit(100,490,'Confirmer Donneur');
$per ->label(100,250,'Idon');                     $per ->txt(200,250,'idon',32,$result->idon);
$per ->label(100,280,'Nomdnr');                   $per ->txt(200,280,'nomdnr',32,$result->NOMDNR); 
$per ->label(100,310,'Prenomdnr');                $per ->txt(200,310,'prenomdnr',32,$result->PRENOMDNR);   
$per ->label(100,340,'Sexe');                     $per ->txt(200,340,'sexe',32,$result->SEXE);   
$per ->label(100,370,'Date naissance');           $per ->txt(200,370,'DATENAISSANCE',32,$result->DATENAISSANCE);   
$per ->label(100,400,'IDDNR');                    $per ->txt(200,400,'iddnr',32,$result->IDDNR);  
$per ->label(100,430,'NDP');                      $per ->txt(200,430,'IDP',32,$result->IDP);  
$per ->label(100,460,'Date don');                 $per ->txt(200,460,'datedon',32,$result->datedon);
$per ->label(500,250,'Indication');               $per ->combov(600,250,'IND',array("IND","CIDT","CIDD")); 
$per ->label(500,280,'Volume preleve');           $per ->txt(600,280,'VP',32,450);  
$per ->label(500,310,'Temps prelevement');        $per ->txt(600,310,'TEDP',32,10);
$per ->label(500,340,'Incidents');                $per ->combov(600,340,'INCIDENTS',array("Sans","Choc vagal","Choc hypovolemique"));
$per ->hide(600,310,'id',32,$id);
$per ->f1();
$per -> sautligne (15);   
}//fin if 
?>  
