
<?php
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $datejour1="2012-01-01";
  $datejour2="2012-12-31";
  //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
  $db  = mysql_select_db($db_name,$cnx) ;
$query_liste = "SELECT AGE,idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,IND,GROUPAGE,RHESUS,DATENAISSANCE FROM tdon where IDP !=''and IDP !='0' and datedon >='$datejour1'and datedon <='$datejour2' order by AGE asc ";
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>
<H1 align= "center">Centre De Depistage  Volantaire  </H1> 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table bgcolor=\"white\"  bordercolor=\"green\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td bgcolor=\"#cccccc\"><div align=\"center\">Code Donneur</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">iddon</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Nom Donneur</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Prenom Donneur</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Sexe </div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Date De Naissance</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">AGE</div></td>
</tr>" );
 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td><div align=\"left\">".$result["iddnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["IND"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["idon"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["nomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["prenomdnr"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["sexe"]."</div></td>\n" );
echo( "<td align=\"CENTER\"><div >".$result["DATENAISSANCE"]."</div></td>\n" );
echo( "<td align=\"CENTER\"><div >".$result["AGE"]."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "</table><br>\n" );
mysql_free_result($requete);
function cdv($colone1,$colone2,$colone3,$datejour1,$datejour2)
{
  $db_host="localhost";
  $db_name="gpts2012"; 
  $db_user="root";
  $db_pass="";
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  $db  = mysql_select_db($db_name,$cnx) ;
  $sql = " select SEXE,AGE,datedon from tdon where SEXE='$colone1' and AGE >=$colone2  and AGE <=$colone3    and datedon >='$datejour1'and datedon <='$datejour2'";
  $requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
  $collecte=mysql_num_rows($requete);
  mysql_free_result($requete);
  return $collecte;
}
$datejour1="2010-01-01";
$datejour2="2014-01-01";

ECHO cdv('M',0,14,$datejour1,$datejour2);echo"</br>";
ECHO cdv('M',15,24,$datejour1,$datejour2);echo"</br>";
ECHO cdv('M',25,49,$datejour1,$datejour2);echo"</br>";
ECHO cdv('M',50,100,$datejour1,$datejour2);echo"</br>";
ECHO cdv('F',0,14,$datejour1,$datejour2);echo"</br>";
ECHO cdv('F',15,24,$datejour1,$datejour2);echo"</br>";
ECHO cdv('F',25,49,$datejour1,$datejour2);echo"</br>";
ECHO cdv('F',50,100,$datejour1,$datejour2);echo"</br>";
?>

