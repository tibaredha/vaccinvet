<?php
$avn=$_POST["AVN"];
$N=$_POST["N"];
$date=$_POST["DATE"];
$dateeuro=date('Y/m/d');
$SVAC=$_POST["SVAC"];
$SVAA=$_POST["SVAA"];
$SVAR=$_POST["SVAR"];
$SVAB=$_POST["SVAB"];

$EVAC=$_POST["EVAC"];
$EVAA=$_POST["EVAA"];
$EVAR=$_POST["EVAR"];
$EVAB=$_POST["EVAB"];




$MVAC=$_POST["SVAC"]-$_POST["EVAC"];
$MVAA=$_POST["SVAA"]-$_POST["EVAA"];
$MVAR=$_POST["SVAR"]-$_POST["EVAR"];
$MVAB=$_POST["SVAB"]-$_POST["EVAB"];
//********************************************************************************************//
$db_host="localhost";
$db_name="vaccinvet"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "UPDATE USERS  set  VACQE=$MVAC,VAAQE=$MVAA,VARQE=$MVAR,VABQE=$MVAB  where AVN=$avn ";
$requete = @mysql_query($query_liste, $cnx) or die($query_liste."<br>".mysql_error());
//insertion dans table stock des sorties  
$sqli = "INSERT INTO stock (date,AVN,SVAC,RVAC,SVAA,RVAA,SVAR,RVAR,SVAB,RVAB) VALUES ('".$dateeuro."','".$avn."','".$EVAC."','".$MVAC."','".$EVAA."','".$MVAA."','".$EVAR."','".$MVAR."','".$EVAB."','".$MVAB."')";
$requete = @mysql_query($sqli, $cnx) or die($sql."<br>".mysql_error());
header("Location: ../index.php?uc=SORCOM") ;
?>


