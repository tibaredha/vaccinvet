<?php 
if ($_POST["WILAYAR"] !=1 and $_POST["DAIRA"] !=''  and $_POST["COMMUNER"] !=''  and $_POST["ADRESSE"] !='' and $_POST["DATEBAM"] !='' and $_POST["NOM"] !='' and $_POST["PRENOM"] !='') {

include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'PATHOLOGIE ANIMALE Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=BAMAN','post','formGCS');
$per ->submit(1110,250,'PATHOLOGIE ANIMALE');
$per ->label(80,250,'* Date/Heure :'.$_POST["DATEBAM"]);               
$per ->label(80,280,'* Nom Eleveur :'.$_POST["NOM"]);              
$per ->label(450,280,'* Prenom Eleveur :'.$_POST["PRENOM"]);          
$per ->label(80,310,'* Wilaya :'.$_POST["WILAYAR"]);                  
$per ->label(450,310,'* Daira :'.$_POST["DAIRA"]);                 
$per ->label(800,310,'* Commune :'.$_POST["COMMUNER"]);                            
$per ->label(1000,310,'* Adresse :'.$_POST["ADRESSE"]);                
$per ->f1();
$sql = "INSERT INTO BAM (
DATEBAM,NOM,PRENOM,WILAYAR,DAIRA,COMMUNER,ADRESSE,AVN,AVND,AVNW,WIL,DAI,COM,
A1,A2,A3,A4,A5,A6,A7,A8,A9,
B1,B2,B3,B4,B5,B6,B7,B8,B9,
C1,C2,C3,C4,C5,C6,C7,C8,C9,
D1,D2,D3,D4,D5,D6,D7,D8,D9,
E1,E2,E3,E4,E5,E6,E7,E8,E9,
F1,F2,F3,F4,F5,F6,F7,F8,F9,
G1,G2,G3,G4,G5,G6,G7,G8,G9,
H1,H2,H3,H4,H5,H6,H7,H8,H9,
I1,I2,I3,I4,I5,I6,I7,I8,I9,
J1,J2,J3,J4,J5,J6,J7,J8,J9,
K1,K2,K3,K4,K5,K6,K7,K8,K9,
L1,L2,L3,L4,L5,L6,L7,L8,L9,
M1,M2,M3,M4,M5,M6,M7,M8,M9,
N1,N2,N3,N4,N5,N6,N7,N8,N9,
O1,O2,O3,O4,O5,O6,O7,O8,O9,
P1,P2,P3,P4,P5,P6,P7,P8,P9,
Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,
R1,R2,R3,R4,R5,R6,R7,R8,R9,
S1,S2,S3,S4,S5,S6,S7,S8,S9,
T1,T2,T3,T4,T5,T6,T7,T8,T9,
U1,U2,U3,U4,U5,U6,U7,U8,U9,
V1,V2,V3,V4,V5,V6,V7,V8,V9,
W1,W2,W3,W4,W5,W6,W7,W8,W9,
X1,X2,X3,X4,X5,X6,X7,X8,X9,
Y1,Y2,Y3,Y4,Y5,Y6,Y7,Y8,Y9,
Z1,Z2,Z3,Z4,Z5,Z6,Z7,Z8,Z9,
SA1,SA2,SA3,SA4,SA5,SA6,SA7,SA8,SA9,
SB1,SB2,SB3,SB4,SB5,SB6,SB7,SB8,SB9,
SC1,SC2,SC3,SC4,SC5,SC6,SC7,SC8,SC9,
SD1,SD2,SD3,SD4,SD5,SD6,SD7,SD8,SD9,
SE1,SE2,SE3,SE4,SE5,SE6,SE7,SE8,SE9,
SF1,SF2,SF3,SF4,SF5,SF6,SF7,SF8,SF9
) 
VALUES (
'".$_POST["DATEBAM"]."','".$_POST["NOM"]."','".$_POST["PRENOM"]."','".$_POST["WILAYAR"]."','".$_POST["DAIRA"]."','".$_POST["COMMUNER"]."','".$_POST["ADRESSE"]."','".$_POST["AVN"]."','".$_POST["AVND"]."','".$_POST["AVNW"]."','".$_POST["WIL"]."','".$_POST["DAI"]."','".$_POST["COM"]."',
'".$_POST["A1"]."','".$_POST["A2"]."','".$_POST["A3"]."','".$_POST["A4"]."','".$_POST["A5"]."','".$_POST["A6"]."','".$_POST["A7"]."','".$_POST["A8"]."','".$_POST["A9"]."',
'".$_POST["B1"]."','".$_POST["B2"]."','".$_POST["B3"]."','".$_POST["B4"]."','".$_POST["B5"]."','".$_POST["B6"]."','".$_POST["B7"]."','".$_POST["B8"]."','".$_POST["B9"]."',
'".$_POST["C1"]."','".$_POST["C2"]."','".$_POST["C3"]."','".$_POST["C4"]."','".$_POST["C5"]."','".$_POST["C6"]."','".$_POST["C7"]."','".$_POST["C8"]."','".$_POST["C9"]."',
'".$_POST["D1"]."','".$_POST["D2"]."','".$_POST["D3"]."','".$_POST["D4"]."','".$_POST["D5"]."','".$_POST["D6"]."','".$_POST["D7"]."','".$_POST["D8"]."','".$_POST["D9"]."',
'".$_POST["E1"]."','".$_POST["E2"]."','".$_POST["E3"]."','".$_POST["E4"]."','".$_POST["E5"]."','".$_POST["E6"]."','".$_POST["E7"]."','".$_POST["E8"]."','".$_POST["E9"]."',
'".$_POST["F1"]."','".$_POST["F2"]."','".$_POST["F3"]."','".$_POST["F4"]."','".$_POST["F5"]."','".$_POST["F6"]."','".$_POST["F7"]."','".$_POST["F8"]."','".$_POST["F9"]."',
'".$_POST["G1"]."','".$_POST["G2"]."','".$_POST["G3"]."','".$_POST["G4"]."','".$_POST["G5"]."','".$_POST["G6"]."','".$_POST["G7"]."','".$_POST["G8"]."','".$_POST["G9"]."',
'".$_POST["H1"]."','".$_POST["H2"]."','".$_POST["H3"]."','".$_POST["H4"]."','".$_POST["H5"]."','".$_POST["H6"]."','".$_POST["H7"]."','".$_POST["H8"]."','".$_POST["H9"]."',
'".$_POST["I1"]."','".$_POST["I2"]."','".$_POST["I3"]."','".$_POST["I4"]."','".$_POST["I5"]."','".$_POST["I6"]."','".$_POST["I7"]."','".$_POST["I8"]."','".$_POST["I9"]."',
'".$_POST["J1"]."','".$_POST["J2"]."','".$_POST["J3"]."','".$_POST["J4"]."','".$_POST["J5"]."','".$_POST["J6"]."','".$_POST["J7"]."','".$_POST["J8"]."','".$_POST["J9"]."',
'".$_POST["K1"]."','".$_POST["K2"]."','".$_POST["K3"]."','".$_POST["K4"]."','".$_POST["K5"]."','".$_POST["K6"]."','".$_POST["K7"]."','".$_POST["K8"]."','".$_POST["K9"]."',
'".$_POST["L1"]."','".$_POST["L2"]."','".$_POST["L3"]."','".$_POST["L4"]."','".$_POST["L5"]."','".$_POST["L6"]."','".$_POST["L7"]."','".$_POST["L8"]."','".$_POST["L9"]."',
'".$_POST["M1"]."','".$_POST["M2"]."','".$_POST["M3"]."','".$_POST["M4"]."','".$_POST["M5"]."','".$_POST["M6"]."','".$_POST["M7"]."','".$_POST["M8"]."','".$_POST["M9"]."',
'".$_POST["N1"]."','".$_POST["N2"]."','".$_POST["N3"]."','".$_POST["N4"]."','".$_POST["N5"]."','".$_POST["N6"]."','".$_POST["N7"]."','".$_POST["N8"]."','".$_POST["N9"]."',
'".$_POST["O1"]."','".$_POST["O2"]."','".$_POST["O3"]."','".$_POST["O4"]."','".$_POST["O5"]."','".$_POST["O6"]."','".$_POST["O7"]."','".$_POST["O8"]."','".$_POST["O9"]."',
'".$_POST["P1"]."','".$_POST["P2"]."','".$_POST["P3"]."','".$_POST["P4"]."','".$_POST["P5"]."','".$_POST["P6"]."','".$_POST["P7"]."','".$_POST["P8"]."','".$_POST["P9"]."',
'".$_POST["Q1"]."','".$_POST["Q2"]."','".$_POST["Q3"]."','".$_POST["Q4"]."','".$_POST["Q5"]."','".$_POST["Q6"]."','".$_POST["Q7"]."','".$_POST["Q8"]."','".$_POST["Q9"]."',
'".$_POST["R1"]."','".$_POST["R2"]."','".$_POST["R3"]."','".$_POST["R4"]."','".$_POST["R5"]."','".$_POST["R6"]."','".$_POST["R7"]."','".$_POST["R8"]."','".$_POST["R9"]."',
'".$_POST["S1"]."','".$_POST["S2"]."','".$_POST["S3"]."','".$_POST["S4"]."','".$_POST["S5"]."','".$_POST["S6"]."','".$_POST["S7"]."','".$_POST["S8"]."','".$_POST["S9"]."',
'".$_POST["T1"]."','".$_POST["T2"]."','".$_POST["T3"]."','".$_POST["T4"]."','".$_POST["T5"]."','".$_POST["T6"]."','".$_POST["T7"]."','".$_POST["T8"]."','".$_POST["T9"]."',
'".$_POST["U1"]."','".$_POST["U2"]."','".$_POST["U3"]."','".$_POST["U4"]."','".$_POST["U5"]."','".$_POST["U6"]."','".$_POST["U7"]."','".$_POST["U8"]."','".$_POST["U9"]."',
'".$_POST["V1"]."','".$_POST["V2"]."','".$_POST["V3"]."','".$_POST["V4"]."','".$_POST["V5"]."','".$_POST["V6"]."','".$_POST["V7"]."','".$_POST["V8"]."','".$_POST["V9"]."',
'".$_POST["W1"]."','".$_POST["W2"]."','".$_POST["W3"]."','".$_POST["W4"]."','".$_POST["W5"]."','".$_POST["W6"]."','".$_POST["W7"]."','".$_POST["W8"]."','".$_POST["W9"]."',
'".$_POST["X1"]."','".$_POST["X2"]."','".$_POST["X3"]."','".$_POST["X4"]."','".$_POST["X5"]."','".$_POST["X6"]."','".$_POST["X7"]."','".$_POST["X8"]."','".$_POST["X9"]."',
'".$_POST["Y1"]."','".$_POST["Y2"]."','".$_POST["Y3"]."','".$_POST["Y4"]."','".$_POST["Y5"]."','".$_POST["Y6"]."','".$_POST["Y7"]."','".$_POST["Y8"]."','".$_POST["Y9"]."',
'".$_POST["Z1"]."','".$_POST["Z2"]."','".$_POST["Z3"]."','".$_POST["Z4"]."','".$_POST["Z5"]."','".$_POST["Z6"]."','".$_POST["Z7"]."','".$_POST["Z8"]."','".$_POST["Z9"]."',
'".$_POST["SA1"]."','".$_POST["SA2"]."','".$_POST["SA3"]."','".$_POST["SA4"]."','".$_POST["SA5"]."','".$_POST["SA6"]."','".$_POST["SA7"]."','".$_POST["SA8"]."','".$_POST["SA9"]."',
'".$_POST["SB1"]."','".$_POST["SB2"]."','".$_POST["SB3"]."','".$_POST["SB4"]."','".$_POST["SB5"]."','".$_POST["SB6"]."','".$_POST["SB7"]."','".$_POST["SB8"]."','".$_POST["SB9"]."',
'".$_POST["SC1"]."','".$_POST["SC2"]."','".$_POST["SC3"]."','".$_POST["SC4"]."','".$_POST["SC5"]."','".$_POST["SC6"]."','".$_POST["SC7"]."','".$_POST["SC8"]."','".$_POST["SC9"]."',
'".$_POST["SD1"]."','".$_POST["SD2"]."','".$_POST["SD3"]."','".$_POST["SD4"]."','".$_POST["SD5"]."','".$_POST["SD6"]."','".$_POST["SD7"]."','".$_POST["SD8"]."','".$_POST["SD9"]."',
'".$_POST["SE1"]."','".$_POST["SE2"]."','".$_POST["SE3"]."','".$_POST["SE4"]."','".$_POST["SE5"]."','".$_POST["SE6"]."','".$_POST["SE7"]."','".$_POST["SE8"]."','".$_POST["SE9"]."',
'".$_POST["SF1"]."','".$_POST["SF2"]."','".$_POST["SF3"]."','".$_POST["SF4"]."','".$_POST["SF5"]."','".$_POST["SF6"]."','".$_POST["SF7"]."','".$_POST["SF8"]."','".$_POST["SF9"]."'
)";
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
}
else
{
header("Location: ./index.php?uc=BAMAN") ;
}

?>