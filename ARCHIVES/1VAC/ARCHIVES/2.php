<?php 
//CODE AVE LISTE DEROULANTE 100%PHP QUI MARCHE EN COUR DE REALISATION 
//il ya un probleme si en choisi un wilaya en perd la saisie des autre s
include('../SESSION/SESSION.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FICHE DE PRELEVEMENT</title>
<link href="../CSS/style.css"	title="D�faut" rel="stylesheet" type="text/css" media="screen" />
<script language="JavaScript1.2" src="../javs/masks.js"></script>
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
<body onload="init();" >
  <?php include('../includes/entete.php'); ?>  
  <?php include('../includes/SMDNR.php'); ?> 
<?php
//code commune wilaya qui marche tres bien 
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "GPTS2012";
$idr = isset($_POST['wilaya'])?$_POST['wilaya']:null; 
    if(isset($_POST['ok']) && isset($_POST['COMMUNE']) && $_POST['COMMUNE'] != "")
    {
    $region_selectionnee = $_POST['WILAYA'];
    $dept_selectionne = $_POST['COMMUNE'];
    }
    $connexion = mysql_pconnect($serveur, $admin, $mdp);
    $choixbase = mysql_select_db($base, $connexion);
    $sql1 = "SELECT idwil, wilayas FROM wil ORDER BY idwil";
    $rech_regions = mysql_query($sql1);
    $code_region = array(); //idwil 
    $region = array();      //wilayas
    $nb_regions = 0;
	if($rech_regions != false)
	{
        while($ligne = mysql_fetch_assoc($rech_regions))
        {
            array_push($code_region, $ligne['idwil']);
            array_push($region, $ligne['wilayas']);
            $nb_regions++;
        }
    }
?>
<form action="" method="post" name="form1"id="wca">
<table bgcolor="white"  bordercolor="green" align="center" border="1">
<hr />
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
<td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">WILAYA </td>
<td bgcolor="green">

<select name="wilaya" id="wilaya" onchange="document.forms['wca'].submit();">
  <option value="-1">Choisissez une wilaya</option>
    <?php
    for($i = 0; $i < $nb_regions; $i++)
    {
    ?>
  <option value="<?php echo($code_region[$i]); ?>"<?php echo((isset($idr) && $idr == $code_region[$i])?" selected=\"selected\"":null); ?>><?php echo($region[$i]); ?></option>
    <?php
    }
	mysql_free_result($rech_regions);
    ?>
</select>
</td>
<?php 
   if(isset($idr) && $idr != -1)
   {
    $sql2 = "SELECT idcom,commune FROM com WHERE idwil=$idr  ORDER BY idcom ";   
    $rech_dept = mysql_query($sql2, $connexion);    
    $nd = 0;
    $code_dept = array();//idcom
    $nom_dept = array();//commune
    while($ligne_dept = mysql_fetch_assoc($rech_dept))
            {
                array_push($code_dept, $ligne_dept['idcom']);
                array_push($nom_dept, $ligne_dept['commune']);
                $nd++;
            }    
?>
<td bgcolor="#cccccc" nowrap="nowrap" align="left" value="FIXE">WILAYA </td>
<td bgcolor="green">
<select name="departement" id="departement"  >
<?php  
       for($d=0; $d<$nd; $d++)
      {
?>
      <option value="<?php echo($code_dept[$d]); ?>"<?php echo((isset($dept_selectionne) && $dept_selectionne == $code_dept[$d])?" selected=\"selected\"":null); ?>><?php echo($nom_dept[$d]); ?></option>
<?php
      }  
     mysql_free_result($rech_dept);
     //mysql_close($connexion);
?>
</select>
</td>
<?php
   }
?>
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