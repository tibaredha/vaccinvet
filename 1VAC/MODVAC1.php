<?php 
include('./SESSION/SESSION.php'); 
$IDVAC       =$_POST["IDVAC"];         
$BILAN       = $_POST["BILAN"] ;//NBILAN
$N           = $_POST["N"] ;//NCERTIFICAT 
$a1          = $_POST["a1"] ;//datevac
$a3          = $_POST["a3"] ;//nomeleveur
$a5          = $_POST["a5"] ;//FILSDE
$a6          = $_POST["a6"] ;//CINPC
$a7          = $_POST["a7"] ;//DELE
$a8          = $_POST["a8"] ;//DAIRADE
$a9          = $_POST["a9"] ;//CFN
$ADRESSE     = $_POST["ADRESSE"] ;//adresse
//ANTI-CLAVELEUSE
$b1     = $_POST["b1"];
$b2     = $_POST["b2"];
$b3     = $_POST["b3"];
$b4     = $_POST["b4"];
$b5     = $_POST["b5"];
$b6     = $_POST["b6"];
$b7     = $_POST["b7"];
$DPb    = $_POST["DPb"];
//ANTI-BRUCELLIQUE
$c1     = $_POST["c1"];
$c2     = $_POST["c2"];
$c3     = $_POST["c3"];
$c4     = $_POST["c4"];
$c5     = $_POST["c5"];
$c6     = $_POST["c6"];
$c7     = $_POST["c7"];
$DPc    = $_POST["DPc"];
//ANTI-APHTEUSE
$d1     = $_POST["d1"];
$d2     = $_POST["d2"];
$d3     = $_POST["d3"];
$d4     = $_POST["d4"];
$d5     = $_POST["d5"];
$d6     = $_POST["d6"];
$DPd    = $_POST["DPd"];
//ANTI-RABIQUE
$e1     = $_POST["e1"];
$e2     = $_POST["e2"];
$e3     = $_POST["e3"];
$e4     = $_POST["e4"];
$e5     = $_POST["e5"];
$e6     = $_POST["e6"];
$DPe    = $_POST["DPe"];
$sql = "UPDATE regvac SET	
 NBILAN          = '$BILAN',
 NCERTIFICAT     = '$N',
 datevac         = '$a1',
 nomeleveur      = '$a3',
 FILSDE          = '$a5',
 CINPC           = '$a6',
 DELE            = '$a7',
 DAIRADE         = '$a8',
 CFN             = '$a9',
 adresse         = '$ADRESSE',  
 vacb1           = '$b1',
 vacb2           = '$b2',
 vacb3           = '$b3',
 vacb4           = '$b4',
 vacb5           = '$b5',
 vacb6           = '$b6',
 vacb7           = '$b7',
 DPVAC           = '$DPb', 
 vabc1           = '$c1',
 vabc2           = '$c2',
 vabc3           = '$c3',
 vabc4           = '$c4',
 vabc5           = '$c5',
 vabc6           = '$c6',
 vabc7           = '$c7',
 DPVAB           = '$DPc',
 vaad1           = '$d1',
 vaad2           = '$d2',
 vaad3           = '$d3',
 vaad4           = '$d4',
 vaad5           = '$d5',
 vaad6           = '$d6',
 DPVAA           = '$DPd',
 vare1           = '$e1',
 vare2           = '$e2',
 vare3           = '$e3',
 vare4           = '$e4',
 vare5           = '$e5',
 vare6           = '$e6',
 DPVAR           = '$DPe'
 WHERE idregvac  = '$IDVAC'" ;
$requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
if($requete)
{
	header("Location: index.php?uc=REGVAC0") ;
}
else
{
	header("Location: index.php?uc=MODVAC&IDVAC=$IDVAC") ;
}
?>