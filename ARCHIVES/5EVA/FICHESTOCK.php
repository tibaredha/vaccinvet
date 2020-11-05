<?php 
include('./SESSION/SESSION.php'); 
$avn=$_SESSION["AVN"]; 
$per ->h(2,240,180,'Fiche de stock du Dr:'.$_SESSION["USER"]."  ".$avn);
$per -> sautligne (4);
$per ->f0('index.php?uc=FSTOCK','post','');
$per ->submit(920,200,'chercher Fiche de stock');
$per ->comboprodtuit(240,240,'produit','vaccinvet');
$per ->f1();

$dateeuro=date('d/m/Y');
if (isset($_POST["produit"]) and $_POST["produit"]!="" )
{
$pro=$_POST["produit"];
$query_liste = "SELECT * FROM stock where idproduit=$pro and AVN=$avn";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
echo( "<table width=\"65%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">CODE PRODUIT</div></td>
<td class=\"ligne\"><input type=\"text\" name=\"N\" value=\"$pro\" size=\"10\" /></td>
<td COLSPAN=2 class=\"ligne\">Date</div></td>
<td class=\"ligne\"><input   type=\"text\" name=\"DATE\" value=\"$dateeuro\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">idstock</div></td>
<td class=\"ligne\">date opperation</td>
<td class=\"ligne\">quantite entree</div></td>
<td class=\"ligne\">quantite sortie</div></td>
<td class=\"ligne\">quantite en stock</div></td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\" >\n" );
echo( "<td><div align=\"center\">".$result[0]."</div></td>\n" );
echo( "<td><div align=\"center\">".$per ->dateUS2FR($result[1])."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[2]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[3]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result[4]."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">idpro</div></td>
<td class=\"ligne\">nom produit</td>
<td class=\"ligne\">quantite stock</div></td>
<td class=\"ligne\">quantite seuil</div></td>
<td class=\"ligne\">quantite entree</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
}
?>

