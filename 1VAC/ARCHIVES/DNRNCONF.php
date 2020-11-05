<?php include('./SESSION/SESSION.php'); ?>
<?php
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,IND,GROUPAGE,RHESUS,DATENAISSANCE FROM tdon where IDP=0 ";
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>

<p align= "center">LA LISTE NOMINATIVE DES DONNEURS NON CONFIRMES </p>
 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table bgcolor=\"white\"  bordercolor=\"green\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td bgcolor=\"#cccccc\"><div align=\"center\">indi</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">iddon</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">nomdnr</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">prenomdnr</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">sexe</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">date don</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">NDP</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">M</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">S</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">F</div></td>
<td bgcolor=\"#cccccc\"><div align=\"center\">C</div></td>
</tr>" );
 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td><div align=\"left\">".$result["IND"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["idon"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["nomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["prenomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["sexe"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["datedon"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["IDP"]."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"modification\" href=\"MODDNR.php?idon=".$result["idon"]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"suppression\" href=\"SUPDNR4.php?idon=".$result["idon"]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"fiche don\" href=\"fdon.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>F</a>"."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"carte donneur\" href=\"FCART1.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>C</a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "</table><br>\n" );
mysql_free_result($requete);
?>

