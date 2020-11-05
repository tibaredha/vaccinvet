<?php
//registre de vaccination en foction du vaccin sans   where date
include('./SESSION/SESSION.php');

//VERIFICATION DES DATES
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
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
//condition si date1 ET SUP A DATE2  pose probleme
if ($datejour1>$datejour2)
{
header("Location:./index.php?uc=REGVAC0") ;
}
$vaccin=$_POST['vaccin']; //pour utiliser un seul fichier pour plusieur vaccin  avec un switche 
$avn=$_SESSION["AVN"];
//******************************************************************************************************//

switch($vaccin)
{
case '0'://registre de vaccination
{
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">Nom éleveur</td>
<td class=\"ligne\">zonne/lieu</td>
<td class=\"ligne\">ANTI-CLAVELEUSE</td>
<td class=\"ligne\">ANTI-BRUCELLIQUE</td>
<td class=\"ligne\">ANTI-APHTEUSE</td>
<td class=\"ligne\">ANTI-RABIQUE</td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" ); 
while( $result = mysql_fetch_array( $requete ) )
{
 if($result[2]!=0 or $result[3]!=0 or $result[4]!=0 or $result[5]!=0 or $result[6]!=0 or $result[7]!=0 or $result[8]!=0) 
  {
  $totalantic=$result[2]+$result[3]+$result[4]+$result[5]+$result[6]+$result[7]+$result[8];
  $totalantib=$result[9]+$result[10]+$result[11]+$result[12]+$result[13]+$result[14]+$result[15];
  $totalantia=$result[16]+$result[17]+$result[18]+$result[19]+$result[20]+$result[21];
  $totalantir=$result[22]+$result[23]+$result[24]+$result[25]+$result[26]+$result[27];
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"left\">".$per ->nbrtocom3('vacccinvet','comm',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$totalantic."</div></td>\n" );
	echo( "<td><div align=\"center\">".$totalantib."</div></td>\n" );
	echo( "<td><div align=\"center\">".$totalantia."</div></td>\n" );
	echo( "<td><div align=\"center\">".$totalantir."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "</tr>\n" );
  }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">Nom éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">ANTI-CLAVELEUSE</td>
<td class=\"ligne\">ANTI-BRUCELLIQUE</td>
<td class=\"ligne\">ANTI-APHTEUSE</td>
<td class=\"ligne\">ANTI-RABIQUE</td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
break;
};
case '1'://ANTI-CLAVELEUSE
{
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION ANTI-CLAVELEUSE Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaises</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" ); 
while( $result = mysql_fetch_array( $requete ) )
{
 if($result[2]!=0 or $result[3]!=0 or $result[4]!=0 or $result[5]!=0 or $result[6]!=0 or $result[7]!=0 or $result[8]!=0) 
  {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"left\">".$per ->nbrtocom3('vacccinvet','comm',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[5]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[6]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[7]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[8]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "</tr>\n" );
  }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaises</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
break;
};
case '2'://ANTI-BRUCELLIQUE
{
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION ANTI-BRUCELLIQUE Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaises</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" ); 
while( $result = mysql_fetch_array( $requete ) )
{
 if($result[9]!=0 or $result[10]!=0 or $result[11]!=0 or $result[12]!=0 or $result[13]!=0 or $result[14]!=0 or $result[15]!=0 ) 
   {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"left\">".$per ->nbrtocom3('vacccinvet','comm',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[9]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[10]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[11]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[12]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[13]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[14]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[15]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "</tr>\n" );
   }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaises</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
break;
};
case '3'://ANTI-APHTEUX
{
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION ANTI-APHTEUX Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Vaches Laitières</div></td>
<td class=\"ligne\">Génisses</div></td>
<td class=\"ligne\">Taureaux</div></td>
<td class=\"ligne\">Taurillons</div></td>
<td class=\"ligne\">Veaux</div></td>
<td class=\"ligne\">Velles</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
if($result[16]!=0 or $result[17]!=0 or $result[18]!=0 or $result[19]!=0 or $result[20]!=0 or $result[21]!=0 ) 
   {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"left\">".$per ->nbrtocom3('vacccinvet','comm',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[16]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[17]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[18]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[19]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[20]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[21]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "</tr>\n" );
   }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Vaches Laitières</div></td>
<td class=\"ligne\">Génisses</div></td>
<td class=\"ligne\">Taureaux</div></td>
<td class=\"ligne\">Taurillons</div></td>
<td class=\"ligne\">Veaux</div></td>
<td class=\"ligne\">Velles</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>

</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
break;
};

case '4'://ANTI-RABIQUE
{
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION ANTI-RABIQUE Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Vaches Laitières</div></td>
<td class=\"ligne\">Génisses</div></td>
<td class=\"ligne\">Taureaux</div></td>
<td class=\"ligne\">Taurillons</div></td>
<td class=\"ligne\">Veaux</div></td>
<td class=\"ligne\">Velles</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" ); 
while( $result = mysql_fetch_array( $requete ) )
{
if($result[22]!=0 or $result[23]!=0 or $result[24]!=0 or $result[25]!=0 or $result[26]!=0 or $result[27]!=0 ) 
   {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"left\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"left\">".$per ->nbrtocom3('vacccinvet','comm',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[22]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[23]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[24]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[25]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[26]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[27]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODVAC&IDVAC=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPVAC&IDVAC=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "</tr>\n" );
   }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Vaches Laitières</div></td>
<td class=\"ligne\">Génisses</div></td>
<td class=\"ligne\">Taureaux</div></td>
<td class=\"ligne\">Taurillons</div></td>
<td class=\"ligne\">Veaux</div></td>
<td class=\"ligne\">Velles</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
break;
};


} 
?>


