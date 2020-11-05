<?php 
include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'PATHOLOGIE ANIMALE Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=BAMAN1','post','formGCS');
$per ->submit(1110,250,'PATHOLOGIE ANIMALE');
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

function ligne($pathologie,$N1,$N2,$N3,$N4,$N5,$N6,$N7,$N8,$N9) 
{
echo  "<tr bgcolor=\"#E5F0F0\"> ";             
echo  "<td colspan=\"2\">$pathologie</td>";
echo  "<td>";
echo  "<div align=\"center\">";		            
echo  "<input name=\"$N1\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N2\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N3\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N4\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N5\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N6\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N7\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N8\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "<input name=\"$N9\"   size=\"10\" value=\"00\" type=\"text\" > ";	
echo  "</div>";					 
echo  "</td>"; 
echo  "</tr>"; 
}

function entete($pathologie) 
{
echo  "<tr bgcolor=\"YELLOW\"> ";             
echo  "<td colspan=\"2\" align=\"center\"  >$pathologie</td>";
echo  "<td>";
echo  "<div align=\"center\">";		            
echo  "<input readonly name=\"\"   size=\"10\" value=\"bovins\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"ovins\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"caprins\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"équins\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"camelins\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"cas positif\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"Têtes traitées\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"TRT utilisé\" type=\"text\" > ";	
echo  "<input readonly name=\"\"   size=\"10\" value=\"observations\" type=\"text\" > ";	
echo  "</div>";					 
echo  "</td>"; 
echo  "</tr>"; 
}
echo  "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\"align=\"center\">"; 

 entete("Pathologies animales") ;
 ligne("Bronchite aigue             ","A1","A2","A3","A4","A5","A6","A7","A8","A9") ;
 ligne("Bronchite chronque          ","B1","B2","B3","B4","B5","B6","B7","B8","B9") ;
 ligne("Pneumonies                  ","C1","C2","C3","C4","C5","C6","C7","C8","C9") ;
 ligne("Entérite bactérienne        ","D1","D2","D3","D4","D5","D6","D7","D8","D9") ;
 ligne("Colibacillose               ","E1","E2","E3","E4","E5","E6","E7","E8","E9") ;
 ligne("Dysenterie                  ","F1","F2","F3","F4","F5","F6","F7","F8","F9") ;
 ligne("Piétin                      ","G1","G2","G3","G4","G5","G6","G7","G8","G9") ;
 ligne("Arthrite                    ","H1","H2","H3","H4","H5","H6","H7","H8","H9") ;
 ligne("Polyarthrite                ","I1","I2","I3","I4","I5","I6","I7","I8","I9") ;
 ligne("boiterie                    ","J1","J2","J3","J4","J5","J6","J7","J8","J9") ;
 ligne("P.Externe Gale              ","K1","K2","K3","K4","K5","K6","K7","K8","K9") ;
 ligne("P.Externe Poux              ","L1","L2","L3","L4","L5","L6","L7","L8","L9") ;
 ligne("P.Externe Tiques            ","M1","M2","M3","M4","M5","M6","M7","M8","M9") ;
 ligne("P.Douve                     ","N1","N2","N3","N4","N5","N6","N7","N8","N9") ;
 ligne("G.Douve                     ","O1","O2","O3","O4","O5","O6","O7","O8","O9") ;
 ligne("S.Pulmonaire                ","P1","P2","P3","P4","P5","P6","P7","P8","P9") ;
 ligne("S.Gastro-intestinale        ","Q1","Q2","Q3","Q4","Q5","Q6","Q7","Q8","Q9") ;
 ligne("Vêlages dystociques         ","R1","R2","R3","R4","R5","R6","R7","R8","R9") ;
 ligne("Prolapsus utérins           ","S1","S2","S3","S4","S5","S6","S7","S8","S9") ;
 ligne("Rétention placentaire       ","T1","T2","T3","T4","T5","T6","T7","T8","T9") ;
 ligne("Avortement infectieux       ","U1","U2","U3","U4","U5","U6","U7","U8","U9") ;
 ligne("Avortement traumatique      ","V1","V2","V3","V4","V5","V6","V7","V8","V9") ;
 ligne("Hypocalcémie                ","W1","W2","W3","W4","W5","W6","W7","W8","W9") ;
 ligne("Acidose métabolique         ","X1","X2","X3","X4","X5","X6","X7","X8","X9") ;
 ligne("Acétonie                    ","Y1","Y2","Y3","Y4","Y5","Y6","Y7","Y8","Y9") ;
 ligne("Syndrome de vache couchée   ","Z1","Z2","Z3","Z4","Z5","Z6","Z7","Z8","Z9") ;
 ligne("Météorisation gazeuse       ","SA1","SA2","SA3","SA4","SA5","SA6","SA7","SA8","SA9") ;
 ligne("Ruminotomie                 ","SB1","SB2","SB3","SB4","SB5","SB6","SB7","SB8","SB9") ;
 ligne("Exerese des abcès et tumeurs","SC1","SC2","SC3","SC4","SC5","SC6","SC7","SC8","SC9") ;
 ligne("Césarienne                  ","SD1","SD2","SD3","SD4","SD5","SD6","SD7","SD8","SD9") ;
 ligne("Mammite                     ","SE1","SE2","SE3","SE4","SE5","SE6","SE7","SE8","SE9") ;
 ligne("Autres pathologies          ","SF1","SF2","SF3","SF4","SF5","SF6","SF7","SF8","SF9") ;
 entete("Pathologies animales") ;
 
echo  "</table>"; 
echo  "</BR>";
$per ->f1();
$per ->label(80,1380,'(*)champ obligatoire'); 


//exemple tableau avec boucle for 


function tableau ($l,$c) 
{
echo  "<table width=\"90%\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\"align=\"center\">"; 
FOR ($y=1 ; $y<=$l ; $y++ ) // ligne 
{
echo "<tr>"; 
		FOR ($x=1 ; $x<=$c  ; $x++ ) //colone
		{
		echo  "<td  align=\"center\"><input name=\"".$y.$x." \"   size=\"10\" value=\"".$y.$x."\" type=\"text\" ></td>";
		}
echo "</tr>";
 
}
 echo  "</table>";
}

// tableau (30,9) ;



?>