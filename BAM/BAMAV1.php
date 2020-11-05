<?php 
if ($_POST["WILAYAR"] !=1 and $_POST["DAIRA"] !=''  and $_POST["COMMUNER"] !=''  and $_POST["ADRESSE"] !='' and $_POST["DATEBAM"] !='' and $_POST["NOM"] !='' and $_POST["PRENOM"] !='') {

include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'Pathologie Aviaire Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=BAMAV','post','formGCS');
$per ->submit(1110,250,'Pathologie Aviaire');
$per ->label(80,250,'* Date/Heure :'.$_POST["DATEBAM"]);               
$per ->label(80,280,'* Nom Eleveur :'.$_POST["NOM"]);              
$per ->label(450,280,'* Prenom Eleveur :'.$_POST["PRENOM"]);          
$per ->label(80,310,'* Wilaya :'.$_POST["WILAYAR"]);                  
$per ->label(450,310,'* Daira :'.$_POST["DAIRA"]);                 
$per ->label(800,310,'* Commune :'.$_POST["COMMUNER"]);                            
$per ->label(1000,310,'* Adresse :'.$_POST["ADRESSE"]);                
$per ->f1();
$sql = "INSERT INTO BAMAV (
DATEBAM,NOM,PRENOM,WILAYAR,DAIRA,COMMUNER,ADRESSE,AVN,AVND,AVNW,WIL,DAI,COM,
A1,A2,A3,A4,A5,
B1,B2,B3,B4,B5,
C1,C2,C3,C4,C5,
D1,D2,D3,D4,D5,
E1,E2,E3,E4,E5,
F1,F2,F3,F4,F5
) 
VALUES (
'".$_POST["DATEBAM"]."','".$_POST["NOM"]."','".$_POST["PRENOM"]."','".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNER"]."','".$_POST["ADRESSE"]."','".$_POST["AVN"]."','".$_POST["AVND"]."','".$_POST["AVNW"]."','".$_POST["WIL"]."','".$_POST["DAI"]."','".$_POST["COM"]."',
'".$_POST["A1"]."','".$_POST["A2"]."','".$_POST["A3"]."','".$_POST["A4"]."','".$_POST["A5"]."',
'".$_POST["B1"]."','".$_POST["B2"]."','".$_POST["B3"]."','".$_POST["B4"]."','".$_POST["B5"]."',
'".$_POST["C1"]."','".$_POST["C2"]."','".$_POST["C3"]."','".$_POST["C4"]."','".$_POST["C5"]."',
'".$_POST["D1"]."','".$_POST["D2"]."','".$_POST["D3"]."','".$_POST["D4"]."','".$_POST["D5"]."',
'".$_POST["E1"]."','".$_POST["E2"]."','".$_POST["E3"]."','".$_POST["E4"]."','".$_POST["E5"]."',
'".$_POST["F1"]."','".$_POST["F2"]."','".$_POST["F3"]."','".$_POST["F4"]."','".$_POST["F5"]."'
)";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
}
else
{
header("Location: ./index.php?uc=BAMAV") ;
}

?>