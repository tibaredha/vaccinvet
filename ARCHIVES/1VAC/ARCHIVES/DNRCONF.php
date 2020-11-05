<?php include('./SESSION/SESSION.php'); ?>
<?php
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");

$query_liste = "SELECT idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,IND,GROUPAGE,RHESUS,DATENAISSANCE FROM tdon where IDP !=''and IDP !='0'order by idp asc ";
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>
<p align= "center">LA LISTE NOMINATIVE DES DONNEURS CONFIRMES </p> 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table width=\"75%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >iddon</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Nom Donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Prenom Donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Sexe</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Date Du Don</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Num De Poche</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >M</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >S</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Fiche Don</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >carte donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >carte groupage</div></td>
</tr>" );
 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr bgcolor=\"#E6E6E6\" >\n" );
echo( "<td><div align=\"left\">".$result["idon"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["nomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["prenomdnr"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["sexe"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["datedon"]."</div></td>\n" );
echo( "<td bgcolor=\"#cccccc\" align=\"CENTER\"  ><div >".$result["IDP"]."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"modification\" href=\"index.php?uc=MODDNR&idon=".$result["idon"]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"left\">"."<a title=\"suppression\" href=\"index.php?uc=SUPDNR3&idon=".$result["idon"]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"fiche donneur\" href=\"./1dnr/FDON.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>F</a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"carte donneur\" href=\"./1dnr/FCART1.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>C</a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"carte groupage\" href=\"./1dnr/FABOR1.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>CG</a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >iddon</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Nom Donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Prenom Donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Sexe</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Date Du Don</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Num De Poche</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >M</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >S</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >Fiche Don</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >carte donneur</div></td>
<td bgcolor=\"#993333\"><div align=\"center\"><font  color=\"#FFFFFF\" >carte groupage</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>

