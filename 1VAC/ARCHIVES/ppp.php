<?php include('./SESSION/SESSION.php'); ?>
<?php //echo $_SERVER["REMOTE_ADDR"];
//utiliser cette commande pour afficher la langue arabe avant toute 
//mysql_query("SET NAMES 'UTF8' ");
$query_liste = "SELECT * FROM tdon" ;
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$nb_total=mysql_num_rows($requete);
mysql_free_result($requete);
?>
<p align= "center">LA LISTE NOMINATIVE DES DONNEURS CONFIRMES </p>
<?php 
echo '<p  align= "center"  >'.'le nombre total'.'...'.$nb_total.' </p>';
if (!isset($_GET['debut']) )$_GET['debut']=0;
$nb_affichage_par_page=10; 
$query_liste = "SELECT str,idon,nomdnr,prenomdnr,iddnr,sexe,IDP,datedon,IND,GROUPAGE,RHESUS,DATENAISSANCE FROM tdon where IDP !=''and IDP !='0'order by idp asc limit ".$_GET['debut'].",".$nb_affichage_par_page ;
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$nbrrec=mysql_num_rows($requete);
//récupération avec mysql_fetch_array(), et affichage de nos résultats :
echo( "<table width=\"75%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">\n" );
echo( "<tr>
<td class=\"ligne\">STRUCTURE</div></td>
<td class=\"ligne\">iddon</div></td>
<td class=\"ligne\">Nom Donneur</div></td>
<td class=\"ligne\">Prenom Donneur</div></td>
<td class=\"ligne\">Sexe</div></td>
<td class=\"ligne\">Date Du Don</div></td>
<td class=\"ligne\">Num De Poche</div></td>
<td class=\"ligne\">M</div></td>
<td class=\"ligne\">S</div></td>
<td class=\"ligne\">Fiche Don</div></td>
<td class=\"ligne\">carte donneur</div></td>
<td class=\"ligne\">carte groupage</div></td>
</tr>" );
while( $result = mysql_fetch_array( $requete ) )
{
echo( "<tr bgcolor=\"#E6E6E6\" >\n" );
echo( "<td><div align=\"center\">".$result["str"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["idon"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["nomdnr"]."</div></td>\n" );
echo( "<td><div align=\"left\">".$result["prenomdnr"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["sexe"]."</div></td>\n" );
echo( "<td><div align=\"center\">".$result["datedon"]."</div></td>\n" );
echo( "<td bgcolor=\"#cccccc\" align=\"CENTER\"  ><div >".$result["IDP"]."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"modification\" href=\"index.php?uc=MODDNR&idon=".$result["idon"]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"suppression\" href=\"index.php?uc=SUPDNR3&idon=".$result["idon"]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"fiche donneur\" href=\"./1dnr/FDON.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>F</a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"carte donneur\" href=\"./1dnr/FCART1.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>C</a>"."</div></td>\n" );
echo( "<td><div align=\"center\">"."<a title=\"carte groupage\" href=\"./1dnr/FABOR1.php?"."iddnr=".$result["iddnr"]."&"."nomdnr=".$result["nomdnr"]."&"."prenomdnr=".$result["prenomdnr"]."&"."sexe=".$result["sexe"]."&"."GROUPAGE=".$result["GROUPAGE"]."&"."RHESUS=".$result["RHESUS"]."&"."DATENAISSANCE=".$result["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>CG</a>"."</div></td>\n" );
echo( "</tr>\n" );
} 
echo( "<tr>
<td class=\"ligne1\">STRUCTURE</div></td>
<td class=\"ligne1\">iddon</div></td>
<td class=\"ligne1\">Nom Donneur</div></td>
<td class=\"ligne1\">Prenom Donneur</div></td>
<td class=\"ligne1\">Sexe</div></td>
<td class=\"ligne1\">Date Du Don</div></td>
<td class=\"ligne1\">Num De Poche</div></td>
<td class=\"ligne1\">M</div></td>
<td class=\"ligne1\">S</div></td>
<td class=\"ligne1\">Fiche Don</div></td>
<td class=\"ligne1\">carte donneur</div></td>
<td class=\"ligne1\">carte groupage</div></td>
</tr>" );
echo( "</table><br>\n" );
//*************
include('BNAV.php'); 
//*************** barre_navigation ($nb_total,$nb_affichage_par_page,$debut,$nb_liens_dans_la_barre)

echo '<p align= "center"  >'. barre_navigation ($nb_total,$nb_affichage_par_page,$_GET['debut'],5).' </p>';
mysql_free_result($requete);
?>

