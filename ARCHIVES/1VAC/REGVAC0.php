<?php 
include('./SESSION/SESSION.php');

 ?>
<div class="content">
  <H1 ALIGN = "center">REGISTRE DE VACCINATION Dr :<?php echo "   ".$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"] ;?></H1>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <form ALIGN="center" action="index.php?uc=VAC" method="post">
    <p> DU
	<select name="jour">
     <?php $per->jours(); ?>
    </select>
	<select name="mois">
     <?php $per->mois(); ?>
    </select>
	<select name="annee">
    <?php $per->anee(); ?>
    </select>
	</p>
	
	<p> AU
	<select name="jour1">
     <?php $per->jours(); ?>
    </select>
	<select name="mois1">
     <?php $per->mois(); ?>
    </select>
	<select name="annee1">
    <?php $per->anee(); ?>
    </select>
	</p>
	<hr size=8 width="700" COLOR="#C0C0C0">
	<p>VACCIN
    <select name="vaccin"  > 
	<option selected="selected">_______________________</option>
	<option value="0" >REGISTRE VACCINATION</option>
	<option value="1" >ANTI-CLAVELEUSE</option>
	<option value="2" >ANTI-BRUCELLIQUE</option>
	<option value="3" >ANTI-APHTEUX</option>
	<option value="4" >ANTI-RABIQUE</option>
	</select></p>
<hr size=8 width="700" COLOR="#C0C0C0">
<p><input type="submit" value=" AFFICHER REGISTRE DE VACCINATION" /></p>
 </form>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <br> 


  
  
<!-- fait appele a dateeva.php ++ -->