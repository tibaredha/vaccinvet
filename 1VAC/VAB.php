<?php
include('./SESSION/SESSION.php'); 

//and AVN='$avn'
$avn=$_SESSION["AVN"];
$query_liste = "SELECT * FROM regvac where AVN='$avn'";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL num�ro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo "<H2 align=\"center\">REGISTRE DE VACCINATION ANTI-BRUCELLIQUE Dr:".$_SESSION["USER"]." </H2>";
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaises</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" ); 
while( $result = mysql_fetch_array( $requete ) )
{
 if($result[9]!=0 or $result[10]!=0 or $result[11]!=0 or $result[12]!=0 or $result[13]!=0 or $result[14]!=0 or $result[15]!=0 ) 
   {
	echo( "<tr class=\"resultat\" >\n" );
	echo( "<td><div align=\"center\">".$per->dateUS2FR($result[1])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[28]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$per ->nbrtocom('vacccinvet','com',$result[29])."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[9]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[10]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[11]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[12]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[13]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[14]."</div></td>\n" );
	echo( "<td><div align=\"center\">".$result[15]."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
	echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
    echo( "</tr>\n" );
   }
} 
echo( "<tr>
<td class=\"ligne\">date vaccination</div></td>
<td class=\"ligne\">éleveur</div></td>
<td class=\"ligne\">zonne/lieu</div></td>
<td class=\"ligne\">Brebis</div></td>
<td class=\"ligne\">Béliers</div></td>
<td class=\"ligne\">Antenais</div></td>
<td class=\"ligne\">Antenaisses</div></td>
<td class=\"ligne\">Agneaux</div></td>
<td class=\"ligne\">Agnelles</div></td>
<td class=\"ligne\">Caprins</div></td>
<td class=\"ligne\">Mod</div></td>
<td class=\"ligne\">Sup</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>


