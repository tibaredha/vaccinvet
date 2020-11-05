<?php
include('./SESSION/SESSION.php'); 
$avnd=$_SESSION["AVN"];
$USER=$_SESSION["USER"];
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM users where AVND=$avnd ORDER BY USER";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H1 ALIGN=\"CENTER\">Liste Des Veterinaires Inscrits Dr : $USER</H1>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">IDVET</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">VETERINAIRE</td>

<td class=\"ligne\">ADMIN</td>
<td class=\"ligne\">A</td>
<td class=\"ligne\">DA</td>
<td class=\"ligne\">DATE INSC</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">AVND</td>
<td class=\"ligne\">AVNW</td>
<td class=\"ligne\">A</td>
<td class=\"ligne\">DA</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
$num=$result[4];

echo( "<tr class=\"resultat\"  >\n" );
echo "<td><div align=\"center\"><img src='./images/photos/$num.jpg'  width='100' height='100' border='0' alt='vet'/></div></td>\n" ;
echo( "<td><div align=\"center\">".$result[0]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[1]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "<td><div align=\"LEFT\">".$result[5]."</div></td>\n" );
//echo( "<td><div align=\"center\">".$result[6]."</div></td>\n" );//<td class=\"ligne\">MDP</td>
echo( "<td><div align=\"center\">".$result[7]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"activer coordinateur\" href=\"index.php?uc=ACTCOO&IDP=".$result[0]."&Nom=".$result[5]."\"><img src='./images/s_okay.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"désactiver coordinateur\" href=\"index.php?uc=DCONFC&IDP=".$result[0]."&Nom=".$result[5]."\"><img src='./images/s_error.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[8]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[9]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[11]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[12]."</div></td>\n" );//MOD SUP
echo( "<td><div align=\"center\">"."<a title=\"activer compte\" href=\"index.php?uc=CONFD&IDP=".$result[0]."&Nom=".$result[5]."\"><img src='./images/s_okay.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"désactiver compte\" href=\"index.php?uc=DCONF&IDP=".$result[0]."&Nom=".$result[5]."\"><img src='./images/s_error.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"modification désactiver\" href=\"index.php?uc=MOD&IDP=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"suppression  désactiver\" href=\"index.php?uc=SUP&IDP=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">IDVET</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">VETERINAIRE</td>

<td class=\"ligne\">ADMIN</td>
<td class=\"ligne\">A</td>
<td class=\"ligne\">DA</td>
<td class=\"ligne\">DATE INSC</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">AVND</td>
<td class=\"ligne\">AVNW</td>
<td class=\"ligne\">A</td>
<td class=\"ligne\">DA</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
