<?php 
include('./SESSION/SESSION.php');
$avn=$_SESSION["AVN"]; 
$query_liste = "SELECT * FROM USERS where AVN=$avn";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$row = mysql_fetch_array($requete); 
$per ->h(2,240,180,'Sortie de Produit du Dr:'.$_SESSION["USER"]."  ".$avn);
$per -> sautligne (2);
// $per -> photos(1000,250);
$per ->f0('./5EVA/BSORCOM.PHP','post','formGCS');
$per ->submit(1015,200,'Sortie Produit');
$x=500;
$dateeuro=date('d/m/Y');
$y=220;
echo( "<table width=\"65%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">N°</div></td>
<td class=\"ligne\"><input type=\"text\" name=\"N\" value=\"0\" size=\"10\" /></td>
<td COLSPAN=2 class=\"ligne\">Date</div></td>
<td class=\"ligne\"><input type=\"text\" name=\"DATE\" value=\"$dateeuro\" size=\"10\" /><input   type=\"hidden\" name=\"AVN\" value=\"$avn\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">idpro</div></td>
<td class=\"ligne\">nom produit</td>
<td class=\"ligne\">quantite stock</div></td>
<td class=\"ligne\">quantite seuil</div></td>
<td class=\"ligne\">quantite sortie</div></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">1</div></td>
<td class=\"ligne1\">Vaccin_anti-claveleux</td>
<td class=\"ligne1\"><input readonly type=\"hidden\" name=\"SVAC\" value=\"".$row['VACQE']."\" size=\"10\" />".$row['VACQE']."</div></td>
<td class=\"ligne1\">***</div></td>
<td class=\"ligne1\"><input type=\"txt\" name=\"EVAC\" value=\" 0\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">2</div></td>
<td class=\"ligne1\">Vaccin_anti-aphteux</td>
<td class=\"ligne1\"><input readonly type=\"hidden\" name=\"SVAA\" value=\"".$row['VAAQE']."\" size=\"10\" />".$row['VAAQE']."</div></td>
<td class=\"ligne1\">***</div></td>
<td class=\"ligne1\"><input type=\"txt\" name=\"EVAA\" value=\" 0\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">3</div></td>
<td class=\"ligne1\">Vaccin_anti-rabique</td>
<td class=\"ligne1\"><input readonly type=\"hidden\" name=\"SVAR\" value=\"".$row['VARQE']."\" size=\"10\" />".$row['VARQE']."</div></td>
<td class=\"ligne1\">***</div></td>
<td class=\"ligne1\"><input type=\"txt\" name=\"EVAR\" value=\" 0\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">4</div></td>
<td class=\"ligne1\">Vaccin_anti-brucellique</td>
<td class=\"ligne1\"><input readonly type=\"hidden\" name=\"SVAB\" value=\"".$row['VABQE']."\" size=\"10\" />".$row['VABQE']."</div></td>
<td class=\"ligne1\">***</div></td>
<td class=\"ligne1\"><input type=\"txt\" name=\"EVAB\" value=\" 0\" size=\"10\" /></td>
</tr>" );
echo( "<tr>
<td class=\"ligne\">idpro</div></td>
<td class=\"ligne\">nom produit</td>
<td class=\"ligne\">quantite stock</div></td>
<td class=\"ligne\">quantite seuil</div></td>
<td class=\"ligne\">quantite sortie</div></td>
</tr>" );
echo( "</table><br>\n" );
mysql_free_result($requete);
$per ->f1();

 ?>
 

