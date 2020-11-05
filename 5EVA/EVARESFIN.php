<?php //include('./SESSION/SESSION.php'); ?>
<!-- execute les instruction venant  par methode post  ++ -->
<?php
//VERIFICATION DES ENTREES remaque (PETIT Y=annee 2 en chifres grand y annee en 4 chifre) 
if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}

$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];

//condition si date1 ET SUP A DATE2  pose probleme
if ($datejour1>$datejour2)
{
header("Location:Evapts.php") ;
}
//*********************************************statistique de l'unite collecte********************************* 
//dans le cadre  de l'opptimisation du code cette fonction qui a ete cree a fin de redure le code qui marche bien ,elle a remplace 8cases du tableau unite donneur 
function collecte($colone1,$colone2,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select TDNR,STR,datedon from tdon where tdnr='$colone1'and str='$colone2'and datedon >='$datejour1'and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $collecte=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $collecte;
}
//*********************************************statistique UNITE PREPARATION********************************* 
function PREPARATION($colone,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone='on'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $PREPARATION=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $PREPARATION;
}
//création de la requête SQL SerologiePositive ***HIV HVB HVC TPHA  POSE PROBLEME DE CALCULE??????????????????????????????????????
// $sqlSerologiePositive = " select HIV,HVB,HVC,TPHA,datedon from tdon where HIV='Positif'OR HVB='Positif'OR HVC='Positif'OR TPHA='Positif' ";
// $reqSerologiePositive = @mysql_query($sqlSerologiePositive, $cnx) or die($sql."<br>".mysql_error());
// $SerologiePositive=mysql_num_rows($reqSerologiePositive);
// mysql_free_result($reqSerologiePositive);
//*********************************************statistique UNITE qualification***** HIV HVB HVC TPHA  Positif  douteux negatif
//1-don serotype
function qualification($colone,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $qualification=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualification;
}
function qualificationdp($colone,$dp,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select $colone,datedon from tdon where $colone='$dp'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $qualificationdp=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $qualificationdp;
}
//HEMATOLOGIE immunologie
function immunologie($datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select GROUPAGE,datedon from tdon where GROUPAGE!=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $immunologie=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $immunologie;
}
function immunologie1($datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select GROUPAGE,datedon from tdon where GROUPAGE=''and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $immunologie1=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $immunologie1;
}
//*********************************************statistique de l unite  distribution CHIRURGIE FEMME*********************************   
function distribution($service,$PSL,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql= "select service,PSL from tdis1 where PSL='$PSL' and service ='$service' and condate >='$datejour1' and condate <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $distribution=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $distribution;
}
?>