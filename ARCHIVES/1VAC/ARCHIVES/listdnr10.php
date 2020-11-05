<?php include('./SESSION/SESSION.php'); ?>
<?php //la connection a la base de donnes 
  $db_host="localhost";
  $db_name="dnr10"; 
  $db_user="root";
  $db_pass="";
  //la connection a la base de donnes par le biais de la commande mysql_connect qui a pour parametre (serveur, login, mdp)
  $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
  //sélection de la base de données par le biais de la commande mysql_select_db qui a pour parametre (nom de la base, la chaine de connection) 
  $db  = mysql_select_db($db_name,$cnx) ; ?>
<?php
$colone=$_POST['colone'];
$word=$_POST['search'];
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM dnr10 where $colone like '$word'";//jai enleve le % apres $word pour rafiner la recherche
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>

<p align="center">LA LISTE NOMINATIVE DES DONNEUR  10 ANS</p>
 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table bgcolor=\"white\"  bordercolor=\"green\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td bgcolor=\"#cccccc\"><div align=\"center\">N</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">DATE</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">NOM</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">PRENOM</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">SEX</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">AGE</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">COMMUNE</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">ADRESSE</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">ABO</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">RH</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Cd</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">Cg</div></td>
</tr>" );
 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td bgcolor=\"#cccccc\" ><div align=\"left\">".$result["N"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["DATE"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["NOM"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["PRENOM"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["SEX"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["AGE"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["COMMUNE"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["ADRESSE"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["GRABO"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["GRRH"]."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"carte donneur\"href=\"./1dnr/FCART10.php?"."N=".$result["N"]."&"."NOM=".$result["NOM"]."&"."PRENOM=".$result["PRENOM"]."&"."SEX=".$result["SEX"]."&"."AGE=".$result["AGE"]."&"."GRABO=".$result["GRABO"]."&"."GRRH=".$result["GRRH"]."&"."COMMUNE=".$result["COMMUNE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>Cd</a>"."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"carte groupage\"href=\"./1dnr/FABOR10.php?"."N=".$result["N"]."&"."NOM=".$result["NOM"]."&"."PRENOM=".$result["PRENOM"]."&"."SEX=".$result["SEX"]."&"."AGE=".$result["AGE"]."&"."GRABO=".$result["GRABO"]."&"."GRRH=".$result["GRRH"]."&"."COMMUNE=".$result["COMMUNE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>Cg</a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "</table><br>\n" );
mysql_free_result($requete);
?>

