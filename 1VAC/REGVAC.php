<?php
include('./SESSION/SESSION.php');

//and AVN='$avn'
$avn=$_SESSION["AVN"];
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>
<H2 align="center">REGISTRE DE VACCINATION Dr: <?php echo $_SESSION["USER"] ;?></H2>
<?php
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
// if($result[16]!=0 or $result[17]!=0 or $result[18]!=0 or $result[19]!=0 or $result[20]!=0 or $result[21]!=0 ) 
   // {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$per ->nbrtocom('vacccinvet','com',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "</tr>\n" );
   // }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>

</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>


