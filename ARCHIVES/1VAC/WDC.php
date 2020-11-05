<?php
include('./SESSION/SESSION.php');

//and AVN='$avn'
$avn=$_SESSION["AVN"];
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
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
	echo( "<td><div align=\"center\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$per ->nbrtocom('vacccinvet','com',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[16]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[17]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[18]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[19]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[20]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[21]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
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
?>


