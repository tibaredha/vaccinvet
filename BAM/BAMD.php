<?php 
include('./SESSION/SESSION.php');

 ?>
<div class="content">
  <H1 ALIGN = "center">BILAN ACTIVITES VETERINAIRES Dr :<?php echo "   ".$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"] ;?></H1>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <form ALIGN="center" action="./BAM/BAM.PHP" method="post">
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
	</br>
<hr size=8 width="700" COLOR="#C0C0C0">
<p><input type="submit" value="imprimer bilan activite veterinaire" /></p>
 </form>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <br> 


  
  
<!-- fait appele a dateeva.php ++ -->