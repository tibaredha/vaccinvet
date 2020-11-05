<?php include('./SESSION/SESSION.php');  ?>
<?php
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");limit 70
$query_liste = "SELECT * FROM PRODUIT ";
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>
<p align="center">LA LISTE NOMINATIVE DES PRODUITS PHARMACEUTIQUE  </p>
 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">idprod</td>
<td class=\"ligne\">produit</td>
<td class=\"ligne\">qte</td>
<td class=\"ligne\">qts</td>
<td class=\"ligne\">prix</td>
<td class=\"ligne\">MODIFIER</td>
<td class=\"ligne\">SUPPRIMER</td>
</tr>" );
 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\" >\n" );
echo( "<td><div align=\"center\">".$result[0]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result[1]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result[2]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=****&idon=".$result[0]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=***&idon=".$result[0]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">idprod</td>
<td class=\"ligne\">produit</td>
<td class=\"ligne\">qte</td>
<td class=\"ligne\">qts</td>
<td class=\"ligne\">prix</td>
<td class=\"ligne\">MODIFIER</td>
<td class=\"ligne\">SUPPRIMER</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
?>


