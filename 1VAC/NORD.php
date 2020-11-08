<?php
include('./SESSION/SESSION.php'); 
$IDP = $_GET["IDP"] ; 
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql = "SELECT * FROM elev WHERE idelev = ".$IDP ;
$requete = mysql_query( $sql ) ; 
if( $result = mysql_fetch_object( $requete ) )
{
$per ->h(2,80,180,'ORDONNANCE  Dr : '.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (10);
// $per ->f0('./1VAC/FORD.php','post','formGCS');
// $per ->submit(1150,250,'IMPRIMER ORDONNANCE');
$per ->f0('index.php?uc=NORD1','post','formGCS');
$per ->submit(1150,250,'Ajouter ordonnance');
$per ->label(680,200,'(*)champ obligatoire'); 
$per ->label(80,250,'* Ordonnance N° : ');                                              $per ->txt(210,250,'bilan',10,'0');                                                      
$per ->label(450,250,'* Date/Heure');                                                   $per ->txt(580,250,'a1',20,date('Y-m-d')); $per ->txt(740,250,'a2',2,date("H:i"));
$per ->label(80,280,'Nom Eleveur :<strong> '.$result->nomelev.'</strong>');             $per ->hide(200,280,'a3',29,$result->nomelev);
$per ->label(450,280,'Prenom Eleveur : <strong> '.$result->prenomelev.'</strong>');     $per ->hide(580,280,'a4',29,$result->prenomelev);
$per ->label(1000,280,'Fils De : <strong> '.$result->filsde.'</strong>' );              $per ->hide(1065,280,'a5',29,$result->filsde);
$per ->label(80,310,'N°CIN/PC : <strong> '.$result->nicnpc .'</strong>');               $per ->hide(200,310,'a6',29,$result->nicnpc);
$per ->label(450,310,'Delivre Le : <strong> '.$per->dateUS2FR($result->delivre).'</strong>');                   $per ->hide(580,310,'a7',20,$result->delivre);
$per ->label(800,310,'Daira De : <strong> '.$result->dairade.'</strong>');                                      $per ->hide(880,310,'a8',15,$result->dairade);
$per ->label(1000,310,'CFN: <strong> '.$result->CFN.'</strong>');                                               $per ->hide(1065,310,'a9',29,$result->CFN);
$per ->label(80,340,'Wilaya : <strong> '.$per->nbrtowil1('vaccinvet','wil',$result->WILAYAR).'</strong>');      $per ->hide(200,340,'WILAYAR',10,$result->WILAYAR);
$per ->label(450,340,'Daira : <strong> '.$per->nbrtodai('vaccinvet','dai',$result->DAIRA).'</strong>');         $per ->hide(580,340,'DAIRA',10,$result->DAIRA);
$per ->label(800,340,'Commune : <strong> '.$per->nbrtocom3('vaccinvet','comm',$result->COMMUNER).'</strong>');  $per ->hide(880,340,'COMMUNER',10,$result->COMMUNER);                
$per ->label(1000,340,'Adresse : <strong> '.$result->ADRESSE);                                                  $per ->hide(1065,340,'ADRESSE',29,$result->ADRESSE);           
echo"<hr>";echo"<BR>";
$ESPECE=array("Bovine","Canine","Caprine","Cameline","Dinde","Equine","Feline","Lapin","Oiseaux","Ovine","Pondeuse","Poulet_Chair","Pigeons","Poisson","Repro_Chair","Repro_Ponte","Repro_Dinde","Autre");
$per ->label(80,340+40,'* Espèce : ');$per ->combov(150,340+40,'ESPECE',$ESPECE)  ;
$per ->label(450,380,'* Nbr:');$per ->txt(450+50,380,'NBR',10,'1');
$TNBR=array("Tete(s)","Sujet(s)");$per ->combov(450+155,382,'TNBR',$TNBR);
$per ->label(800,380,'* AGE:');$per ->txt(855,380,'AGE',2,'0');
$tage=array("Jours","Semaines","Mois","Ans");$per ->combov(910,340+42,'TAGE',$tage);
$Sexe=array("M","F","A");$per ->label(1000,340+40,'* Sexe');$per ->combov(1050,340+40,'SEXE',$Sexe);
echo"<BR>";echo"<hr>";
$per ->hide(10,10,'IDELEV',20,$result->idelev);
$per ->hide(10,10,'WIL',20,$_SESSION["WILAYA"]);
$per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
$per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
$per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
$per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
$per ->f1();

$per ->list_ord_eleveur ('Liste des ordonnances ','AVN',$_SESSION["AVN"],$result->idelev);

//**************************************************************************************//
// $per ->f0('','post','comment_form');
// $per ->label(80,430,'Nom du Médicament vétérinaire:');$per ->txtid(310,430,'MD',10,'MD');  
// $per ->label(80,460,'Posologie:');                    $per ->txtid(310,460,'PS',10,'PS');  
// $per ->label(80,490,'voie:');                         $per ->txtid(310,490,'VA',10,'VA');  
// $per ->label(80,520,"Rythme d'administration:");      $per ->txtid(310,520,'RA',10,'RA');  
// $per ->label(80,550,"Délai d'attente:");              $per ->txtid(310,550,'DA',10,'DA');  
// echo '<input type="hidden" name="IDELEV" id="IDELEV"  value="'.$result->idelev.'">';
// $per ->button(80,580,'Ajouter Nom du Médicament vétérinaire');
// $per ->f1();
//**************************************************************************************//
// echo '<table  id="listmed" width="70%" border="1" cellpadding="1" cellspacing="0" align="right">';
// $db_host="localhost"; 
// $db_user="root";
// $db_pass="";
// $db_name="vaccinvet";
// $IDELEV = $result->idelev;
// $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
// $db  = mysql_select_db($db_name,$cnx) ;
// mysql_query("SET NAMES 'UTF8' ");
// $result = mysql_query("SELECT * FROM medvet where IDELEV = $IDELEV " );
// echo'<tr>
// <th>id</th>
// <th>MD</th>
// <th>PS</th>
// <th>VA</th>
// <th>RA</th>
// <th>DA</th>
// <th>-</th>
// </tr>';
// while($data =  mysql_fetch_array($result))
// {	
// echo'<tr>
// <td>'.$data['id'].'</td>
// <td>'.$data['MD'].'</td>
// <td>'.$data['PS'].'</td>
// <td>'.$data['VA'].'</td>
// <td>'.$data['RA'].'</td>
// <td>'.$data['DA'].'</td>
// <td><a href="" id="del" >dd</a><button type="button" id="submit_btnx" value="'.$data['id'].'"    >x</button></td>
// </tr>';	
// }
// echo "</table>";    


}
$per->sautligne (10);
?>