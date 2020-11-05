<?php
//******************************************************************************************************//
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
//AFFECTATION de la date de selection dans lancien exemple sans condition 
//$datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
//$datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];


//condition si date1 ET SUP A DATE2  pose probleme
if ($datejour1>$datejour2)
{
header("Location:Evapts.php") ;
}
//****************************************statistique de l'unite collecte **********************************//
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  //la connection a la base de donnes 
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  //sélection de la base de données
  $db  = mysql_select_db($db_name,$cnx) ;
  //création de la requête SQL occasionnel fixe
  $sql = " select TDNR,STR,datedon from tdon where tdnr='Occasionnel'and str='fixe'and ind='ind'and datedon >='$datejour1'and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $occfix=mysql_num_rows($requete);
  mysql_free_result($requete);
  //création de la requête SQL regulier fixe
  $sql1 = " select TDNR,STR,datedon from tdon where tdnr='regulier'and str='fixe'and ind='ind'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete1 = @mysql_query($sql1, $cnx) or die($sql."<br>".mysql_error());
  $regfix=mysql_num_rows($requete1);
  mysql_free_result($requete1);
  //création de la requête SQL occasionnel mobile
  $sql2 = " select TDNR,STR,datedon from tdon where tdnr='Occasionnel'and str='mobile'and ind='ind'and datedon >='$datejour1'and datedon <='$datejour2' ";
  $requete2 = @mysql_query($sql2, $cnx) or die($sql."<br>".mysql_error());
  $occmob=mysql_num_rows($requete2);
  mysql_free_result($requete2);
  //création de la requête SQL regulier mobile
  $sql3 = " select TDNR,STR,datedon from tdon where tdnr='regulier'and str='mobile'and ind='ind'and datedon >='$datejour1' and datedon <='$datejour2'";
  $requete3 = @mysql_query($sql3, $cnx) or die($sql."<br>".mysql_error());
  $regmob=mysql_num_rows($requete3);
  mysql_free_result($requete3);
  //total reg total occ  total fixe total mob 
  $tr= $regfix+ $regmob;
  $to= $occfix+ $occmob;
  $tf= $regfix+ $occfix;
  $tm= $regmob+ $occmob;
  $tt= $tf+ $tm;
 

 //donneur contre indique tempo 
  $sql3 = " select IND,datedon from tdon where  ind ='CIDT' and datedon >='$datejour1' and datedon <='$datejour2'";
  $requete3 = @mysql_query($sql3, $cnx) or die($sql."<br>".mysql_error());
  $cidt=mysql_num_rows($requete3);
  //donneur contre indique definitive
  $sql3 = " select IND,datedon from tdon where  ind='CIDD' and datedon >='$datejour1' and datedon <='$datejour2'";
  $requete3 = @mysql_query($sql3, $cnx) or die($sql."<br>".mysql_error());
  $cidd=mysql_num_rows($requete3);
  $NDCI= $cidt+ $cidd;

  
  
  
  //*************************************statistique de l'unite  qualification*******************************// 
//création de la requête SQL groupage
$sqlabo= " select GROUPAGE,RHESUS,HVB,HVC,HVC,TPHA from tdon where GROUPAGE !='' and RHESUS !=''and datedon >='$datejour1' and datedon <='$datejour2'  ";
$requeteabo = @mysql_query($sqlabo, $cnx) or die($sql."<br>".mysql_error());
$abo=mysql_num_rows($requeteabo);
mysql_free_result($requeteabo);
//*************************************statistique de l'unite  distribution*******************************//
//création de la requête SQL CHIRURGIE HOMME ST 
$sqlST= "select service,PSL from tdis1 where PSL='ST' and service ='CHIRURGIE HOMME' and condate >='$datejour1' and condate <='$datejour2'";
$requeteST = @mysql_query($sqlST, $cnx) or die($sql."<br>".mysql_error());
$ST=mysql_num_rows($requeteST);
mysql_free_result($requeteST);
//création de la requête SQL CHIRURGIE HOMME CGR
$sqlCGR = " select service,PSL from tdis1 where PSL='CGR' and service ='CHIRURGIE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR = @mysql_query($sqlCGR, $cnx) or die($sql."<br>".mysql_error());
$CGR=mysql_num_rows($requeteCGR);
mysql_free_result($requeteCGR);
//création de la requête SQL CHIRURGIE HOMME PFC
$sqlPFC= " select service,PSL from tdis1 where PSL='PFC' and service ='CHIRURGIE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC= @mysql_query($sqlPFC, $cnx) or die($sql."<br>".mysql_error());
$PFC=mysql_num_rows($requetePFC);
mysql_free_result($requetePFC);
//création de la requête SQL CHIRURGIE HOMME CPS
$sqlCPS = " select service,PSL from tdis1 where PSL='PFC' and service ='CHIRURGIE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS= @mysql_query($sqlCPS, $cnx) or die($sql."<br>".mysql_error());
$CPS=mysql_num_rows($requeteCPS);
mysql_free_result($requeteCPS);
//création de la requête SQL CHIRURGIE FEMME ST 
$sqlST1= " select service,PSL from tdis1 where PSL='ST' and service ='CHIRURGIE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST1 = @mysql_query($sqlST1, $cnx) or die($sql."<br>".mysql_error());
$ST1=mysql_num_rows($requeteST1);
mysql_free_result($requeteST1);
//création de la requête SQL CHIRURGIE FEMME CGR
$sqlCGR1 = " select service,PSL from tdis1 where PSL='CGR' and service ='CHIRURGIE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR1 = @mysql_query($sqlCGR1, $cnx) or die($sql."<br>".mysql_error());
$CGR1=mysql_num_rows($requeteCGR1);
mysql_free_result($requeteCGR1);
//création de la requête SQL CHIRURGIE FEMME PFC
$sqlPFC1= " select service,PSL from tdis1 where PSL='PFC' and service ='CHIRURGIE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC1= @mysql_query($sqlPFC1, $cnx) or die($sql."<br>".mysql_error());
$PFC1=mysql_num_rows($requetePFC1);
mysql_free_result($requetePFC1);
//création de la requête SQL CHIRURGIE FEMME CPS
$sqlCPS1 = " select service,PSL from tdis1 where PSL='PFC' and service ='CHIRURGIE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS1= @mysql_query($sqlCPS1, $cnx) or die($sql."<br>".mysql_error());
$CPS1=mysql_num_rows($requeteCPS1);
mysql_free_result($requeteCPS1);
//MEDECINE HOMME
//création de la requête SQL MEDECINE HOMME ST 
$sqlST11= " select service,PSL from tdis1 where PSL='ST' and service ='MEDECINE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST11 = @mysql_query($sqlST11, $cnx) or die($sql."<br>".mysql_error());
$ST11=mysql_num_rows($requeteST11);
mysql_free_result($requeteST11);
//création de la requête SQL MEDECINE HOMME CGR
$sqlCGR11 = " select service,PSL from tdis1 where PSL='CGR' and service ='MEDECINE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR11 = @mysql_query($sqlCGR11, $cnx) or die($sql."<br>".mysql_error());
$CGR11=mysql_num_rows($requeteCGR11);
mysql_free_result($requeteCGR11);
//création de la requête SQL MEDECINE HOMME PFC
$sqlPFC11= "select service,PSL from tdis1 where PSL='PFC' and service ='MEDECINE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC11= @mysql_query($sqlPFC11, $cnx) or die($sql."<br>".mysql_error());
$PFC11=mysql_num_rows($requetePFC11);
mysql_free_result($requetePFC11);
//création de la requête SQL MEDECINE HOMME CPS
$sqlCPS11 = " select service,PSL from tdis1 where PSL='PFC' and service ='MEDECINE HOMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS11= @mysql_query($sqlCPS11, $cnx) or die($sql."<br>".mysql_error());
$CPS11=mysql_num_rows($requeteCPS11);
mysql_free_result($requeteCPS11);
//MEDECINE FEMME
//création de la requête SQL MEDECINE FEMME ST 
$sqlST111= " select service,PSL from tdis1 where PSL='ST'and service ='MEDECINE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST111 = @mysql_query($sqlST111, $cnx) or die($sql."<br>".mysql_error());
$ST111=mysql_num_rows($requeteST111);
mysql_free_result($requeteST111);
//création de la requête SQL MEDECINE FEMME CGR
$sqlCGR111 = " select service,PSL from tdis1 where PSL='CGR' and service ='MEDECINE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR111 = @mysql_query($sqlCGR111, $cnx) or die($sql."<br>".mysql_error());
$CGR111=mysql_num_rows($requeteCGR111);
mysql_free_result($requeteCGR111);
//création de la requête SQL MEDECINE FEMME PFC
$sqlPFC111= "select service,PSL from tdis1 where PSL='PFC' and service ='MEDECINE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC111= @mysql_query($sqlPFC111, $cnx) or die($sql."<br>".mysql_error());
$PFC111=mysql_num_rows($requetePFC111);
mysql_free_result($requetePFC111);
//création de la requête SQL MEDECINE FEMME CPS
$sqlCPS111 = " select service,PSL from tdis1 where PSL='PFC' and service ='MEDECINE FEMME'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS111= @mysql_query($sqlCPS111, $cnx) or die($sql."<br>".mysql_error());
$CPS111=mysql_num_rows($requeteCPS111);
mysql_free_result($requeteCPS111);
//GYNECO
//création de la requête SQL GYNECO ST 
$sqlST2= "select service,PSL from tdis1 where PSL='ST' and service ='GYNECO'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST2 = @mysql_query($sqlST2, $cnx) or die($sql."<br>".mysql_error());
$ST2=mysql_num_rows($requeteST2);
mysql_free_result($requeteST2);
//création de la requête SQL GYNECO CGR
$sqlCGR2 = " select service,PSL from tdis1 where PSL='CGR' and service ='GYNECO'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR2 = @mysql_query($sqlCGR2, $cnx) or die($sql."<br>".mysql_error());
$CGR2=mysql_num_rows($requeteCGR2);
mysql_free_result($requeteCGR2);
//création de la requête SQL GYNECO PFC
$sqlPFC2= "select service,PSL from tdis1 where PSL='PFC' and service ='GYNECO'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC2= @mysql_query($sqlPFC2, $cnx) or die($sql."<br>".mysql_error());
$PFC2=mysql_num_rows($requetePFC2);
mysql_free_result($requetePFC2);
//création de la requête SQL GYNECO CPS
$sqlCPS2 = " select service,PSL from tdis1 where PSL='PFC' and service ='GYNECO'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS2= @mysql_query($sqlCPS2, $cnx) or die($sql."<br>".mysql_error());
$CPS2=mysql_num_rows($requeteCPS2);
mysql_free_result($requeteCPS2);
//MATERNITE
//création de la requête SQL MATERNITE ST 
$sqlST22= " select service,PSL from tdis1 where PSL='ST'and service ='MATERNITE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST22 = @mysql_query($sqlST22, $cnx) or die($sql."<br>".mysql_error());
$ST22=mysql_num_rows($requeteST22);
mysql_free_result($requeteST22);
//création de la requête SQL MATERNITE CGR
$sqlCGR22 = " select service,PSL from tdis1 where PSL='CGR' and service ='MATERNITE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR22 = @mysql_query($sqlCGR22, $cnx) or die($sql."<br>".mysql_error());
$CGR22=mysql_num_rows($requeteCGR22);
mysql_free_result($requeteCGR22);
//création de la requête SQL MATERNITE PFC
$sqlPFC22= "select service,PSL from tdis1 where PSL='PFC' and service ='MATERNITE'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC22= @mysql_query($sqlPFC22, $cnx) or die($sql."<br>".mysql_error());
$PFC22=mysql_num_rows($requetePFC22);
mysql_free_result($requetePFC22);
//création de la requête SQL MATERNITE CPS
$sqlCPS22 = " select service,PSL from tdis1 where PSL='PFC'and service ='MATERNITE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS22= @mysql_query($sqlCPS22, $cnx) or die($sql."<br>".mysql_error());
$CPS22=mysql_num_rows($requeteCPS22);
mysql_free_result($requeteCPS22);
//PEDIATRIE
//création de la requête SQL PEDIATRIE ST 
$sqlST222= " select service,PSL from tdis1 where PSL='ST'and service ='PEDIATRIE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteST222 = @mysql_query($sqlST222, $cnx) or die($sql."<br>".mysql_error());
$ST222=mysql_num_rows($requeteST222);
mysql_free_result($requeteST222);
//création de la requête SQL PEDIATRIE CGR
$sqlCGR222 = " select service,PSL from tdis1 where PSL='CGR' and service ='PEDIATRIE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGR222 = @mysql_query($sqlCGR222, $cnx) or die($sql."<br>".mysql_error());
$CGR222=mysql_num_rows($requeteCGR222);
mysql_free_result($requeteCGR222);
//création de la requête SQL PEDIATRIE PFC
$sqlPFC222= "select service,PSL from tdis1 where PSL='PFC'and service ='PEDIATRIE'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFC222= @mysql_query($sqlPFC222, $cnx) or die($sql."<br>".mysql_error());
$PFC222=mysql_num_rows($requetePFC222);
mysql_free_result($requetePFC222);
//création de la requête SQL PEDIATRIE CPS
$sqlCPS222 = " select service,PSL from tdis1 where PSL='PFC' and service ='PEDIATRIE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPS222= @mysql_query($sqlCPS222, $cnx) or die($sql."<br>".mysql_error());
$CPS222=mysql_num_rows($requeteCPS222);
mysql_free_result($requeteCPS222);
//BLOC OPP A
//création de la requête SQL BLOC OPP A ST 
$sqlSTA= " select service,PSL from tdis1 where PSL='ST' and service ='BLOC OPP A'and condate >='$datejour1' and condate <='$datejour2'";
$requeteSTA = @mysql_query($sqlSTA, $cnx) or die($sql."<br>".mysql_error());
$STA=mysql_num_rows($requeteSTA);
mysql_free_result($requeteSTA);
//création de la requête SQL BLOC OPP A CGR
$sqlCGRA = " select service,PSL from tdis1 where PSL='CGR' and service ='BLOC OPP A'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGRA = @mysql_query($sqlCGRA, $cnx) or die($sql."<br>".mysql_error());
$CGRA=mysql_num_rows($requeteCGRA);
mysql_free_result($requeteCGRA);
//création de la requête SQL BLOC OPP A PFC
$sqlPFCA= "select service,PSL from tdis1 where PSL='PFC' and service ='BLOC OPP A'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFCA= @mysql_query($sqlPFCA, $cnx) or die($sql."<br>".mysql_error());
$PFCA=mysql_num_rows($requetePFCA);
mysql_free_result($requetePFCA);
//création de la requête SQL BLOC OPP A CPS
$sqlCPSA = " select service,PSL from tdis1 where PSL='PFC' and service ='BLOC OPP A'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPSA= @mysql_query($sqlCPSA, $cnx) or die($sql."<br>".mysql_error());
$CPSA=mysql_num_rows($requeteCPSA);
mysql_free_result($requeteCPSA);
//BLOC OPP B
//création de la requête SQL BLOC OPP B ST 
$sqlSTB= " select service,PSL from tdis1 where PSL='ST'and service ='BLOC OPP B'and condate >='$datejour1' and condate <='$datejour2'";
$requeteSTB = @mysql_query($sqlSTB, $cnx) or die($sql."<br>".mysql_error());
$STB=mysql_num_rows($requeteSTB);
mysql_free_result($requeteSTB);
//création de la requête SQL BLOC OPP B CGR
$sqlCGRB = " select service,PSL from tdis1 where PSL='CGR' and service ='BLOC OPP B'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGRB = @mysql_query($sqlCGRB, $cnx) or die($sql."<br>".mysql_error());
$CGRB=mysql_num_rows($requeteCGRB);
mysql_free_result($requeteCGRB);
//création de la requête SQL BLOC OPP B PFC
$sqlPFCB= "select service,PSL from tdis1 where PSL='PFC' and service ='BLOC OPP B'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFCB= @mysql_query($sqlPFCB, $cnx) or die($sql."<br>".mysql_error());
$PFCB=mysql_num_rows($requetePFCB);
mysql_free_result($requetePFCB);
//création de la requête SQL BLOC OPP A CPS
$sqlCPSB = " select service,PSL from tdis1 where PSL='PFC' and service ='BLOC OPP B'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPSB= @mysql_query($sqlCPSB, $cnx) or die($sql."<br>".mysql_error());
$CPSB=mysql_num_rows($requeteCPSB);
mysql_free_result($requeteCPSB);
//UMC
//création de la requête SQL UMC ST 
$sqlSTUMC= " select service,PSL from tdis1 where PSL='ST' and service ='UMC'and condate >='$datejour1' and condate <='$datejour2'";
$requeteSTUMC = @mysql_query($sqlSTUMC, $cnx) or die($sql."<br>".mysql_error());
$STUMC=mysql_num_rows($requeteSTUMC);
mysql_free_result($requeteSTUMC);
//création de la requête SQL UMC CGR
$sqlCGRUMC = " select service,PSL from tdis1 where PSL='CGR' and service ='UMC'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGRUMC = @mysql_query($sqlCGRUMC, $cnx) or die($sql."<br>".mysql_error());
$CGRUMC=mysql_num_rows($requeteCGRUMC);
mysql_free_result($requeteCGRUMC);
//création de la requête SQL UMC PFC
$sqlPFCUMC= "select service,PSL from tdis1 where PSL='PFC' and service ='UMC'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFCUMC= @mysql_query($sqlPFCUMC, $cnx) or die($sql."<br>".mysql_error());
$PFCUMC=mysql_num_rows($requetePFCUMC);
mysql_free_result($requetePFCUMC);
//création de la requête SQL UMC CPS
$sqlCPSUMC = " select service,PSL from tdis1 where PSL='PFC' and service ='UMC'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPSUMC= @mysql_query($sqlCPSUMC, $cnx) or die($sql."<br>".mysql_error());
$CPSUMC=mysql_num_rows($requeteCPSUMC);
mysql_free_result($requeteCPSUMC);
//HEMODIALYSE
//création de la requête SQL HEMODIALYSE ST 
$sqlSTH= "select service,PSL from tdis1 where PSL='ST' and service ='HEMODIALYSE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteSTH = @mysql_query($sqlSTH, $cnx) or die($sql."<br>".mysql_error());
$STH=mysql_num_rows($requeteSTH);
mysql_free_result($requeteSTH);
//création de la requête SQL HEMODIALYSE CGR
$sqlCGRH = " select service,PSL from tdis1 where PSL='CGR' and service ='HEMODIALYSE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCGRH = @mysql_query($sqlCGRH, $cnx) or die($sql."<br>".mysql_error());
$CGRH=mysql_num_rows($requeteCGRH);
mysql_free_result($requeteCGRH);
//création de la requête SQL HEMODIALYSE PFC
$sqlPFCH= "select service,PSL from tdis1 where PSL='PFC' and service ='HEMODIALYSE'and condate >='$datejour1' and condate <='$datejour2'";
$requetePFCH= @mysql_query($sqlPFCH, $cnx) or die($sql."<br>".mysql_error());
$PFCH=mysql_num_rows($requetePFCH);
mysql_free_result($requetePFCH);
//création de la requête SQL HEMODIALYSE CPS
$sqlCPSH = " select service,PSL from tdis1 where PSL='PFC' and service ='HEMODIALYSE'and condate >='$datejour1' and condate <='$datejour2'";
$requeteCPSH= @mysql_query($sqlCPSH, $cnx) or die($sql."<br>".mysql_error());
$CPSH=mysql_num_rows($requeteCPSH);
mysql_free_result($requeteCPSH);




?>


