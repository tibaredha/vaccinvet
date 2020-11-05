<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'Pathologie Aviaire Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=BAMAV1','post','formGCS');
$per ->submit(1110,250,'Pathologie Aviaire');
$per ->label(80,250,'* Date/Heure');              $per ->datetime (200,250,'DATEBAM');//$per ->txt(740,250,'a2',2,date("H:i"));
$per ->label(80,280,'* Nom Eleveur');              $per ->txt(200,280,'NOM',29,'');
$per ->label(450,280,'* Prenom Eleveur');          $per ->txt(580,280,'PRENOM',29,'');
$per ->label(80,310,'* Wilaya ');                  $per ->WILAYA1(200,310,'WILAYAR','vaccinvet','wil'); 
$per ->label(450,310,'* Daira ');                  $per ->DAIRA2(580,310,'DAIRA'); 
$per ->label(800,310,'* Commune ');                $per ->COMMUNE3(880,310,'COMMUNER');                 
$per ->label(1000,310,'* Adresse ');               $per ->txt(1065,310,'ADRESSE',29,'');           
$per ->hide(10,10,'WIL',20,$_SESSION["WILAYA"]);
$per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
$per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
$per ->hide(10,10,'AVN',20,$_SESSION["AVN"]);
$per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
$per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
function entete($pathologie) 
{
echo  "<tr bgcolor=\"YELLOW\"> ";             
echo  "<td colspan=\"2\" align=\"center\"  >$pathologie</td>";
echo  "<td>";
echo  "<div align=\"center\">";		            
echo  "<input readonly name=\"\"   size=\"25\" value=\"Type de pathologie\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"25\" value=\"Effectif traité\"    type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"25\" value=\"Effectif Vacciné- \" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"25\" value=\"Type de vaccin\"     type=\"text\" > ";
echo  "<input readonly name=\"\"   size=\"25\" value=\"Observations \"      type=\"text\" > ";		
echo  "</div>";					 
echo  "</td>"; 
echo  "</tr>"; 
}
function ligne($pathologie,$N1,$N2,$N3,$N4,$N5) 
{
echo  "<tr bgcolor=\"#E5F0F0\"> ";             
echo  "<td colspan=\"2\">$pathologie</td>";
echo  "<td>";
echo  "<div align=\"center\">";		            
echo  "<input name=\"$N1\"   size=\"25\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N2\"   size=\"25\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N3\"   size=\"25\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N4\"   size=\"25\" value=\"00\" type=\"text\" > ";
echo  "<input name=\"$N5\"   size=\"25\" value=\"00\" type=\"text\" > ";	
echo  "</div>";					 
echo  "</td>"; 
echo  "</tr>"; 
}
echo  "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\"align=\"center\">"; 
entete("Pathologie Aviaire") ;
ligne("Poulet chair             ","A1","A2","A3","A4","A5") ;
ligne("Poule pondeuse           ","B1","B2","B3","B4","B5") ;
ligne("Repro-chair              ","C1","C2","C3","C4","C5") ;
ligne("Repro- ponte             ","D1","D2","D3","D4","D5") ;
ligne("Couvoir                  ","E1","E2","E3","E4","E5") ;
ligne("Dindes                   ","F1","F2","F3","F4","F5") ;
entete("Pathologie Aviaire") ;
echo  "</table>"; 
echo  "</BR>";
$per ->f1();
$per ->label(80,1380,'(*)champ obligatoire'); 

?>