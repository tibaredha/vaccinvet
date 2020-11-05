<?php 
include('./SESSION/SESSION.php'); 
$avn=$_SESSION["AVN"]; 
$per ->h(2,240,180,'Fiche de stock du Dr:'.$_SESSION["USER"]."  ".$avn);
$per -> sautligne (4);
$per ->f0('./5EVA/REGFSTOCK.PHP','post','');
$per ->submit(1000,200,'Imprimer Fiche de stock');

$per ->f1();
$dateeuro=date('d/m/Y');
$query_liste = "SELECT * FROM stock where AVN=$avn";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">idstock</td>
<td class=\"ligne\">date</td>
<td class=\"ligne\">EVAC</td>
<td class=\"ligne\">SVAC</td>
<td class=\"ligne\">RVAC</div></td>
<td class=\"ligne\">EVAA</td>
<td class=\"ligne\">SVAA</td>
<td class=\"ligne\">RVAA</td>
<td class=\"ligne\">EVAR</td>
<td class=\"ligne\">SVAR</td>
<td class=\"ligne\">RVAR</td>
<td class=\"ligne\">EVAB</td>
<td class=\"ligne\">SVAB</td>
<td class=\"ligne\">RVAB</td>
<td class=\"ligne\">AVNW</td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\"  >\n" );
echo( "<td><div align=\"center\">".$result[0]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[1]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "<td><div align=\"LEFT  \">".$result[5]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[6]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[7]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[8]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[9]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[10]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[11]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[12]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[13]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[14]."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">idstock</td>
<td class=\"ligne\">date</td>
<td class=\"ligne\">EVAC</td>
<td class=\"ligne\">SVAC</td>
<td class=\"ligne\">RVAC</div></td>
<td class=\"ligne\">EVAA</td>
<td class=\"ligne\">SVAA</td>
<td class=\"ligne\">RVAA</td>
<td class=\"ligne\">EVAR</td>
<td class=\"ligne\">SVAR</td>
<td class=\"ligne\">RVAR</td>
<td class=\"ligne\">EVAB</td>
<td class=\"ligne\">SVAB</td>
<td class=\"ligne\">RVAB</td>
<td class=\"ligne\">AVNW</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);








?>

