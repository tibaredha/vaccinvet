<?php
include('./SESSION/SESSION.php');

//and AVN='$avn'
$avn=$_SESSION["AVN"];
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
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
	echo( "<td><div align=\"center\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$per ->nbrtocom('vacccinvet','com',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[22]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[23]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[24]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[25]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[26]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[27]."</div></td>\n" );
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


