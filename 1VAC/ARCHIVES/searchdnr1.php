<?php include('./SESSION/SESSION.php'); ?>
<p align=center>liste des donneurs trouves avec le critere choisi :</p>
<?php 
$colone=$_POST['colone'];
$word=$_POST['search'];
$colone1=$_POST['colone1'];
$word1=$_POST['search1'];
$sql="select datedon,idon,iddnr,nomdnr,prenomdnr,sexe,idp,DATENAISSANCE,RHESUS,GROUPAGE from tdon where $colone like '$word%' and $colone1 like '$word1%'   ORDER BY nomdnr "; //% %will search form 0-9,a-z
$query=mysql_query($sql);

echo "<table width=\"85%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" align=\"center\">
<tr>
<th bgcolor=\"#cccccc\" >Date Du Don </th>
<th bgcolor=\"#cccccc\" >idon</th>
<th bgcolor=\"#cccccc\">Num De Poche</th>
<th bgcolor=\"#cccccc\">Code Donneur</th>
<th bgcolor=\"#cccccc\">Nom Donneur</th>
<th bgcolor=\"#cccccc\">Prenom Donneur</th>
<th bgcolor=\"#cccccc\">Sexe </th>
<th bgcolor=\"#cccccc\">ABO</th>
<th bgcolor=\"#cccccc\">RH</th>

<th bgcolor=\"#cccccc\">Fiche Don</th>
<th bgcolor=\"#cccccc\">Carte Donneur</th>
<th bgcolor=\"#cccccc\">Carte Groupage</th>
</tr>";

while($row=mysql_fetch_array($query))
  {
  echo( "<tr bgcolor=\"#E6E6E6\" >\n" );
  echo "<td align=\"CENTER\" >" . $row['datedon']. "</td>";
  echo "<td align=\"CENTER\">" . $row['idon']. "</td>";
  echo "<td bgcolor=\"#cccccc\" align=\"CENTER\" >" . $row['idp']. "</td>";
  echo "<td align=\"CENTER\" >" . $row['iddnr']. "</td>";
  echo "<td >" . $row['nomdnr']. "</td>";
  echo "<td >" . $row['prenomdnr']. "</td>";
  echo "<td align=\"CENTER\">" . $row['sexe']. "</td>";
  echo "<td align=\"CENTER\">" . $row['GROUPAGE']. "</td>";
  echo "<td align=\"CENTER\">" . $row['RHESUS']. "</td>";
  //echo( "<td><div align=\"left\">"."<a title=\"modification\" href=\"index.php?uc=MODDNR&idon=".$row["idon"]."\"><img src='./images/e.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
 // echo( "<td><div align=\"left\">"."<a title=\"suppression\" href=\"index.php?uc=SUPDNR3&idon=".$row["idon"]."\"><img src='./images/s.png' width='16' height='16' border='0' alt=''/></a>"."</div></td>\n" );
  echo "<td><div align=\"CENTER\">" ."<a title=\"fiche don\" href=\"./1dnr/FDON.php?"."iddnr=".$row["iddnr"]."&"."nomdnr=".$row["nomdnr"]."&"."prenomdnr=".$row["prenomdnr"]."&"."sexe=".$row["sexe"]."&"."GROUPAGE=".$row["GROUPAGE"]."&"."RHESUS=".$row["RHESUS"]."&"."DATENAISSANCE=".$row["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>F</a>". "</div></td>";
  echo "<td><div align=\"CENTER\">" ."<a title=\"carte donneur\"href=\"./1dnr/FCART1.php?"."iddnr=".$row["iddnr"]."&"."nomdnr=".$row["nomdnr"]."&"."prenomdnr=".$row["prenomdnr"]."&"."sexe=".$row["sexe"]."&"."GROUPAGE=".$row["GROUPAGE"]."&"."RHESUS=".$row["RHESUS"]."&"."DATENAISSANCE=".$row["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>C</a>". "</div></td>";
  echo "<td><div align=\"CENTER\">"."<a title=\"carte groupage\" href=\"./1dnr/FABOR1.php?"."iddnr=".$row["iddnr"]."&"."nomdnr=".$row["nomdnr"]."&"."prenomdnr=".$row["prenomdnr"]."&"."sexe=".$row["sexe"]."&"."GROUPAGE=".$row["GROUPAGE"]."&"."RHESUS=".$row["RHESUS"]."&"."DATENAISSANCE=".$row["DATENAISSANCE"]."\"><img src='./images/print.png' width='16' height='16' border='0' alt=''/>CG</a>"."</div></td>\n" ;
  echo "</tr>";
  }
echo "</table>";
echo "<p align=center>fin de la recherche ... </p>"

?>
<form action="./1DNR/LISTDNRPDF1.PHP" method="post">
<input type="HIDDEN" name="colone" value="<?php echo $colone ;  ?>" />
<input type="HIDDEN" name="search" value="<?php echo $word; ?>" />
<input type="HIDDEN" name="colone1" value="<?php echo $colone1; ?>" />
<input type="HIDDEN" name="search1" value="<?php echo $word1; ?>" />
<input type="submit" name="submit" value="imprimer liste" />
</form>