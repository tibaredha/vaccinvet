<?php
include('./SESSION/SESSION.php'); 
$avnd=$_SESSION["AVN"];

mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM dpcv   ORDER BY DATEDEMANDE";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr1=mysql_num_rows($requete);
?>
<H1 ALIGN="CENTER"> List des demandes de participation aux campagnes de vaccination <?php  echo $totalmbr1.' Veterinaires'?></H1>
 <?php
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">ANNEE</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">NOM</td>
<td class=\"ligne\">PRENOM</td>
<td class=\"ligne\">DATE DEMANDE</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\"  >\n" );
echo( "<td><div align=\"center\">".$result[8]."</div></td>\n" );
echo( "<td><div align=\"center\">".$per->nbrtowil1('vaccinvet','wil',$result[1])."</div></td>\n" );
echo( "<td><div align=\"center\">".$per->nbrtodai('vaccinvet','dai',$result[2])."</div></td>\n" );
echo( "<td><div align=\"center\">".$per->nbrtocom3('vaccinvet','comm',$result[3])."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "<td><div align=\"LEFT\">".$result[5]."</div></td>\n" );
echo( "<td><div align=\"LEFT\">".$result[6]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[7]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"OK pour participation\" href=\"index.php?uc=OKDEM&IDP=".$result[0]."&AVN=".$result[4]." &NOM=".$result[5]." &PRENOM=".$result[6]."   &DATE=".$result[7]."  &WIL=".$result[1]." &DAI=".$result[2]." &COM=".$result[3]." &ANNEE=".$result[8]." &ADRESSE=".$result[9]."\">    <img src='./images/Button Refresh.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"modification \" href=\"index.php?uc=***&IDP=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"suppression  \" href=\"index.php?uc=***&IDP=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">ANNEE</td>
<td class=\"ligne\">WILAYA</td>
<td class=\"ligne\">DAIRA</td>
<td class=\"ligne\">COMMUNE</td>
<td class=\"ligne\">AVN</div></td>
<td class=\"ligne\">NOM</td>
<td class=\"ligne\">PRENOM</td>
<td class=\"ligne\">DATE DEMANDE</td>
<td class=\"ligne\">OK</td>
<td class=\"ligne\">M</td>
<td class=\"ligne\">S</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
