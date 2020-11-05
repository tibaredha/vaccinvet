<?php
include('./SESSION/SESSION.php'); 
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM users ORDER BY USER";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>
<H1 ALIGN="CENTER">Liste Des Veterinaires Inscrits</H1>
 <?php
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">IDVET</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">VETERINAIRE</td>
<td class=\"ligne\">MDP</td>
<td class=\"ligne\">ADMIN</td>
<td class=\"ligne\">DATE INSC</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">AVND</td>
<td class=\"ligne\">AVNW</td>
<td class=\"ligne\">C</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\"  >\n" );
echo( "<td><div align=\"center\">".$result[0]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[1]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "<td><div align=\"LEFT\">".$result[5]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[6]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[7]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[8]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[9]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[11]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[12]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"confirmer\" href=\"index.php?uc=CONF&IDP=".$result[0]."\"><img src='./images/s_okay.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MOD&IDP=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUP&IDP=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">IDVET</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">VETERINAIRE</td>
<td class=\"ligne\">MDP</td>
<td class=\"ligne\">ADMIN</td>
<td class=\"ligne\">DATE INSC</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">AVND</td>
<td class=\"ligne\">AVNW</td>
<td class=\"ligne\">C</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
