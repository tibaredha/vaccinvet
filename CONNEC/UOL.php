<?php
header('Refresh: 5');
// if over 5 minute, delete user 
$time=time();
$time_check=$time-300;
$sql4="DELETE FROM user_online WHERE time<$time_check";
$result4=mysql_query($sql4);

////affichage  des user online 
mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM user_online  ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr1=mysql_num_rows($requete);
?>
<H1 ALIGN="CENTER">Liste Des Veterinaires_Online  :<?php  echo $totalmbr1.' Veterinaires'?></H1>
 <?php
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">Nom_Prenom </td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\"  >\n" );
echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">Nom_Prenom</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
