<?php 
include('./SESSION/SESSION.php');

 ?>
<div class="content">
  <H1 ALIGN = "center">REGISTRE DE VACCINATION PAR COMMUNE </H1>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <form ALIGN="center" action="index.php?uc=VACC" method="post">
     <p>COMMUNE
	 <select name="COMMUNE" class="C">
	    <option value="170301">Aïn Chouhada</option> 
		<option value="170302">Aïn El Ibel</option>
		<option value="170303">Aïn Feka</option>
		<option value="170304">Aïn Maabed</option>
		<option selected="selected" value="170305">Aïn Oussara</option>
		<option value="170306">Amourah</option>
		<option value="170307">Benhar</option>
		<option value="170308">Beni Yagoub</option>
		<option value="170309">Birine</option>
		<option value="170310">Bouira Lahdab</option>
		<option value="170311">Charef</option>
		<option value="170312">Dar Chioukh</option>
		<option value="170313">Deldoul</option>
		<option value="170314">Djelfa</option>
		<option value="170315">Douis</option>
		<option value="170316">El Guedid</option>
		<option value="170317">El Idrissia</option>
		<option value="170318">El Khemis</option>
		<option value="170319">Faidh El Botma</option>
		<option value="170320">Guernini</option>
		<option value="170321">Guettara</option>
		<option value="170322">Had-Sahary</option>
		<option value="170323">Hassi Bahbah</option>
		<option value="170324">Hassi El Euch</option>
		<option value="170325">Hassi Fedoul</option>
		<option value="170326">Messaad</option>
		<option value="170327">M'Liliha</option>
		<option value="170328">Moudjebara</option>
		<option value="170329">Oum Laadham</option>
		<option value="170330">Sed Rahal</option>
		<option value="170331">Selmana</option>
		<option value="170332">Sidi Baizid</option>
		<option value="170333">Sidi Ladjel</option>
		<option value="170334">Tadmit</option>
		<option value="170335">Zaafrane</option>
		<option value="170336">Zaccar</option>
       </select> </p>
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