<?php include('./SESSION/SESSION.php');
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,ind FROM tdon WHERE IDP =''  order by nomdnr";
//exécution de notre requête SQL:
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
?>


<h3 align= "center">LA LISTE NOMINATIVE DES DONNEURS NON CONFIRMES </h3>
 
<?php
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table width=\"75%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">iddon</td>
<td class=\"ligne\">Nom Donneur</td>
<td class=\"ligne\">Prenom Donneur</td>
<td class=\"ligne\">Sexe </div></td>
<td class=\"ligne\">date don</td>
<td class=\"ligne\">confirmation</td>
<td class=\"ligne\">suppression</td>
</tr>" );

while( $result = mysql_fetch_array( $requete ) )
{

echo( "<tr class=\"resultat\" >\n" );
echo( "<td>".$result["idon"]."</td>\n" );
echo( "<td><div align=\"left\">".$result["nomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["prenomdnr"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["sexe"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["datedon"]."</div></td>\n" );
echo( "<td><div align=\"CENTER\">"."<a title=\"confirmation\" href=\"INDEX.php?uc=CONFDNR2&idon=".$result["idon"]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"CENTER\">"."<a title=\"suppression\"href=\"INDEX.php?uc=SUPDNR2&idon=".$result["idon"]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "</tr>\n" );

}

echo( "<tr>
<td class=\"ligne1\">iddon</td>
<td class=\"ligne1\">Nom Donneur</td>
<td class=\"ligne1\">Prenom Donneur</td>
<td class=\"ligne1\">Sexe </div></td>
<td class=\"ligne1\">date don</td>
<td class=\"ligne1\">confirmation</td>
<td class=\"ligne1\">suppression</td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
echo "<h4 align=center>fin de la liste ... </h4>"
?>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
