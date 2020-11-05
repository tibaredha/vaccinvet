<?php 
if ($_POST["WILAYAR"] !=1 and $_POST["DAIRA"] !=''  and $_POST["COMMUNER"] !=''  and $_POST["ADRESSE"] !='' and $_POST["DATEBAM"] !='' and $_POST["NOM"] !='' and $_POST["PRENOM"] !='') {

include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'Pathologie Cunicole: Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=BAMAC','post','formGCS');
$per ->submit(1110,250,'Pathologie Cunicole:');
$per ->label(80,250,'* Date/Heure :'.$_POST["DATEBAM"]);               
$per ->label(80,280,'* Nom Eleveur :'.$_POST["NOM"]);              
$per ->label(450,280,'* Prenom Eleveur :'.$_POST["PRENOM"]);          
$per ->label(80,310,'* Wilaya :'.$_POST["WILAYAR"]);                  
$per ->label(450,310,'* Daira :'.$_POST["DAIRA"]);                 
$per ->label(800,310,'* Commune :'.$_POST["COMMUNER"]);                            
$per ->label(1000,310,'* Adresse :'.$_POST["ADRESSE"]);                
$per ->f1();
$sql = "INSERT INTO BAMAC (
DATEBAM,NOM,PRENOM,WILAYAR,DAIRA,COMMUNER,ADRESSE,AVN,AVND,AVNW,WIL,DAI,COM,
A1,A2,A3
) 
VALUES (
'".$_POST["DATEBAM"]."','".$_POST["NOM"]."','".$_POST["PRENOM"]."','".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNER"]."','".$_POST["ADRESSE"]."','".$_POST["AVN"]."','".$_POST["AVND"]."','".$_POST["AVNW"]."','".$_POST["WIL"]."','".$_POST["DAI"]."','".$_POST["COM"]."',
'".$_POST["A1"]."','".$_POST["A2"]."','".$_POST["A3"]."'
)";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
}
else
{
header("Location: ./index.php?uc=BAMAC") ;
}

?>