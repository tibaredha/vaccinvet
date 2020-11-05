<?php 
include('./SESSION/SESSION.php');

 ?>
<div class="content">
  <H1 ALIGN = "center">REGISTRE DE VACCINATION PAR WILAYA</H1>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <form ALIGN="center" action="index.php?uc=VACW" method="post">
   <select name="WILAYA" class="W">
          <option value="17" >DJELFA</option> 
		  <option value="26" >MEDEA</option> 
       </select>
   <hr size=8 width="700" COLOR="#C0C0C0">
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
	<option selected="selected">__________________</option>
	<option value="1" >ANTI-CLAVELEUSE</option>
	<option value="2" >ANTI-BRUCELLIQUE</option>
	<option value="3" >ANTI-APHTEUX</option>
	<option value="4" >ANTI-RABIQUE</option>
	</select></p>
<hr size=8 width="700" COLOR="#C0C0C0">
<p><input type="submit" value=" AFFICHER REGISTRE DE VACCINATION" /></p>
 </form>
  

  
  
<!-- fait appele a dateeva.php ++ -->