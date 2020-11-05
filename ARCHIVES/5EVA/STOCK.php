<?php 
include('./SESSION/SESSION.php'); 
$avn=$_SESSION["AVN"]; 
$query_liste = "SELECT * FROM produit where AVN=$avn ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$per ->h(2,240,180,'Bon de commande du Dr:'.$_SESSION["USER"]."  ".$avn);
$per -> sautligne (2);
// $per -> photos(1000,250);
$per ->f0('./5EVA/FSTOCK.PHP','post','');
$per ->submit(920,200,'Imprimer Bon de commande');
$x=500;
$dateeuro=date('d/m/Y');
$y=220;
echo( "<table width=\"65%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">N°</div></td>
<td class=\"ligne\"><input type=\"text\" name=\"N\" value=\"0\" size=\"10\" /></td>
<td COLSPAN=2 class=\"ligne\">Date</div></td>
<td class=\"ligne\"><input   type=\"text\" name=\"DATE\" value=\"$dateeuro\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">idpro</div></td>
<td class=\"ligne\">nom produit</td>
<td class=\"ligne\">quantite stock</div></td>
<td class=\"ligne\">quantite seuil</div></td>
<td class=\"ligne\">quantite demande</div></td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr class=\"resultat\" >\n" );
echo( "<td><div align=\"center\">".$result["idprod"]."</div></td>\n" );
echo( "<td><div align=\"LEFT\">".$result["produit"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["qte"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["qts"]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<input   type=\"txt\" name=\"".$result["produit"]."\" value=\"0\" size=\"10\" />"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne\">idpro</div></td>
<td class=\"ligne\">nom produit</td>
<td class=\"ligne\">quantite stock</div></td>
<td class=\"ligne\">quantite seuil</div></td>
<td class=\"ligne\">quantite demande</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
$per ->f1();
 ?>
 

