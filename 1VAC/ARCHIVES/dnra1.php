<?php include('../SESSION/SESSION.php'); ?>
<?php
//code region departement  100 p100 javascript qui marche aussi bien  
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "gpts2012";
$sql = "SELECT IDCOM AS idd, COMMUNE AS dept, wil.idwil AS idr, wilayas FROM com, wil WHERE com.idwil = wil.idwil ORDER BY wil.idwil";
$connexion = mysql_pconnect($serveur, $admin, $mdp);
$choixbase = mysql_select_db($base, $connexion);
$recherche = mysql_query($sql, $connexion);
$temoin_r = 0;   
$regions = array();    
$id = 0;
 while($ligne = mysql_fetch_assoc($recherche))
    {
        $r = $ligne['idr'];
        $d = $ligne['idd'];      
        if($temoin_r != $r)
        {
            $regions[$r] = array();         
            $regions[$r][0] = $ligne['wilayas'];
            $regions[$r][1] = array();
            $regions[$r][2] = array();
            $temoin_r = $r;
            $id = 0;
        }       
        $regions[$r][1][$id] = $d;
        $regions[$r][2][$id] = $ligne['dept'];
        $id++;
    }   
    $chaine = htmlspecialchars(serialize($regions), ENT_QUOTES);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
<title>Liste déroulantes dynamiques liées</title>
<link href="../CSS/style.css"	title="Défaut" rel="stylesheet" type="text/css" media="screen" />
<script language="JavaScript1.2" src="../javs/masks.js"></script>
<script type="text/javascript"  src="../javs/arrayPHP2JS.js" charset="iso_8859-1"></script>
<script type="text/javascript"  src="../javs/changeDept.js" charset="iso_8859-1"></script>
<script type="text/javascript">
var tableau = new PhpArray2Js('<?php echo $chaine; ?>');
var tab = tableau.retour();
</script>
<script language="JavaScript1.2">
function init()
{	
	oStringMask = null;
	oStringMask = new Mask("##.##.##.##.##", "string");
	oStringMask.attach(document.form1.TELEPHONE);
    
	oStringMask1 = null;
	oStringMask1 = new Mask("##/##/####", "string");
	oStringMask1.attach(document.form1.DATENAISSANCE);	
   
    oStringMask2 = null;
	oStringMask2 = new Mask("##", "string");
	oStringMask2.attach(document.form1.POIDS);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("##/#", "string");
	oStringMask3.attach(document.form1.TA);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("xxxxxxxxxxxxxxxxx", "string");
	oStringMask3.attach(document.form1.ADRESSE);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("xxxxxxxxxxxxxxxxxxxxxxxxxxxxx", "string");
	oStringMask3.attach(document.form1.NOMDNR);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("xxxxxxxxxxxxxxxxxxxxxxxxxxxxx", "string");
	oStringMask3.attach(document.form1.PRENOMDNR);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("xxxxxxxxxxxxxxxxxxxxxxxxxxxxx", "string");
	oStringMask3.attach(document.form1.COMMUNE);
	
	oStringMask3 = null;
	oStringMask3 = new Mask("xxxxxxxxxxxxxxxxxxxxxxxxxxxxx", "string");
	oStringMask3.attach(document.form1.COMMUNER);
	
}

</script>
</head>
<body onload="init();"  >
<?php include('../includes/entete.php'); ?>  
<?php include('../includes/SMDNR.php'); ?> 
<h1 ALIGN=center >SAISIRE LE NOM DU DONNEUR</h1>

<form action="FDNR.php" method="post" name="form1" id="form1">
<table bgcolor="white"  bordercolor="green" align="center" border="1"><hr />
<tr valign="baseline">
      <td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">Structure </td>
      <td bgcolor="green"><select name="STR" >
          <option>FIXE</option>
          <option>MOBILE</option>
        </select>
	  </td>
	  <td bgcolor="#cccccc" nowrap="nowrap" align="left">Date </td>
      <td bgcolor="green" ><input type="text" name="DATE" value="<?php $datejour=date("Y-m-d");echo"$datejour";?>  " size="32" /></td>
</tr>
 <tr valign="baseline">
      <td bgcolor="#cccccc" nowrap="nowrap" align="left">Nom</td>
      <td bgcolor="red" ><input type="text" name="NOMDNR" value="" size="32" /></td>
	  <td bgcolor="#cccccc" nowrap="nowrap" align="left">Prénom</td>
      <td bgcolor="red"><input type="text" name="PRENOMDNR" value="" size="32" /></td>
    </tr>
<tr valign="baseline">
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Sexe </td>
	<td bgcolor="red"><select name="SEXE" id="SEXE">
          <option>M</option>
          <option>F</option>
        </select>
	</td>
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Né(e) Le</td>
    <td bgcolor="red"><input type="text" name="DATENAISSANCE" value="" size="32" /></td>
	</tr>	

<tr valign="baseline">
<td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">wilaya</td>
<td bgcolor="green">
<select name="WILAYA" id="region" onchange="changeDept(tab,this.value);">
    <option value="vide">- - - Choisissez une wilaya - - -</option>
    <?php
    /* Construction de la première liste : on se sert du tableau PHP */
    $nbr = count($regions);
    foreach($regions as $nr=>$nom)
    {
	echo "<option value=\"$nr\" > $nom[0]</option>";
    }
    ?>
</select> </td>
<!-- ICI, le secret : on met un bloc avec un id ou va s'insérer le code dela seconde liste déroulande -->             
<td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">commune </td>
<td bgcolor="green">

<span  id="blocDepartements" ><input type="text" name="COMMUNE" value="" size="32" />
</span>
</td>
</tr>
<tr valign="baseline">
	<td  bgcolor="#cccccc" nowrap="nowrap" align="left">Wilaya de residence</td>
	<td>
	 <?php
    echo '<select size=1 name="WILAYAR">'."\n";
    echo '<option value="-1">Wilaya de residence</option>'."\n";
    $result = mysql_query("SELECT WILAYAS FROM WIL order by WILAYAS " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.$data['WILAYAS'];
    echo '</option>'."\n";
    }
    echo '</select>'."\n";
   
    ?>
	</td>
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Commune de residence</td>
	<td ><input type="text" name="COMMUNER" value="" size="32" />
    </tr> 
<tr valign="baseline">
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Adresse de residence</td>
	<td><input type="text" name="ADRESSE" value="" size="32" /></td>
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Telephone</td>
      <td><input type="text" name="TELEPHONE" value="" size="32" /></td>
	</tr>
	<tr valign="baseline">
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Type donneur </td>
	<td bgcolor="green">
	<select name="TDNR" value="OCCASIONNEL" >
          <option>OCCASIONNEL</option>
          <option>REGULIER</option>
        </select>
	</td>
	<td bgcolor="#cccccc" nowrap="nowrap" align="left">Type don</td>
	<td bgcolor="green" >
    <select name="TDON" >
          <option>NORMAL</option>
          <option>APHERESE</option>
        </select>
	</td>
	</tr>
	<tr valign="baseline">
      <td bgcolor="#cccccc" nowrap="nowrap" align="left">Poids</td>
      <td><input type="text" name="POIDS" value="" size="11" />TA<input type="text" name="TA" value="" size="11" /></td>
	  <td bgcolor="#cccccc" nowrap="nowrap" align="left">Heur de prélèvement</td>
      <td><input type="text" name="HDP" value="<?php $datejour=date("H:i");echo"$datejour";?> " size="32" /></td>
    </tr>
</table>
<table align="center"   border="2">
	<tr valign="baseline">
      <td><input type="submit" name="VALIDER" id="VALIDER" value="Envoyer" onClick="this.form.submit();this.disabled=true;this.value='Patientez...'"  /><a href="DNR.php">RETOUR UNITE DNR</a></td>
    </tr><BR>
</table> 
</form>
<?php include('../includes/pied.php'); // ?>
</body>
</html>