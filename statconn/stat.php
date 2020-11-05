<?php 
//création de la requête SQL
$sql = " select * from tconn where pageconn='/GRH2013/index.php'";
//exécution de la requête SQL
$requete = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error());
//si la requête s'est bien passé, on affiche un message de succès
//mysql_close(); 
$totalmbr=mysql_num_rows($requete);
mysql_free_result($requete);
?>
 	<h5 ALIGN = "center">la liste des membres</h5>
<?php
$sql = "SELECT * FROM  users ";
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td><div align=\"center\">id</div></td>
<td><div align=\"center\">nom</div></td>
<td><div align=\"center\">mdp</div></td>
<td><div align=\"center\">OK</div></td>
<td><div align=\"center\">DATEINSC</div></td>
</tr>" );
// il existe 04 methode pour afficher les resultats mysql_fetch_(array/assoc/objet/row)
// array  .$result["id"]. 
// assoc  .$result["id"].
// objet  .$result->id.
// row    .$result[1]. 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td><div align=\"left\">".$result["IDP"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["USER"]."</div></td>\n" );
echo( "<td><div align=\"CENTER\">".$result["MDP"]."</div></td>\n" );
echo( "<td><div align=\"CENTER\">".$result["OK"]."</div></td>\n" );
echo( "<td><div align=\"CENTER\">".$result["DATEINSC"]."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
<h5 ALIGN = "center">NBR D ACCE PAR IP </h5>
<?php
$sql = "SELECT IP, count(*) FROM `tconn` group by IP";
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td><div align=\"center\">IP</div></td>
<td><div align=\"center\">count</div></td>
</tr>" );
// il existe 04 methode pour afficher les resultats mysql_fetch_(array/assoc/objet/row)
// array  .$result["id"]. 
// assoc  .$result["id"].
// objet  .$result->id.
// row    .$result[1]. 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td><div align=\"left\">".$result["IP"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["count(*)"]."</div></td>\n" );
echo( "</tr>\n" );
}
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
 
 <h5 ALIGN = "center">NBR D ACCE PAR PAGE </h5>
<?php
$sql = "SELECT pageconn, count(*) FROM `tconn` group by pageconn";
//exécution de notre requête SQL:
$requete = mysql_query( $sql, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td><div align=\"center\">pageconn</div></td>
<td><div align=\"center\">count</div></td>
</tr>" );
// il existe 04 methode pour afficher les resultats mysql_fetch_(array/assoc/objet/row)
// array  .$result["id"]. 
// assoc  .$result["id"].
// objet  .$result->id.
// row    .$result[1]. 
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr>\n" );
echo( "<td><div align=\"left\">".$result["pageconn"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["count(*)"]."</div></td>\n" );
echo( "</tr>\n" );
}
echo( "</table><br>\n" );
mysql_free_result($requete);
?>
 

 
 