<?php 
include('./SESSION/SESSION.php');
include('./fonction.php');
 ?>
 <div class="content">
  <H1 ALIGN = "center">DATE D'EVALUATION</H1>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <form ALIGN="center" action="index.php?uc=EVAPTSRES" method="post">
    <p> du
	<select name="jour">
    <?php jours(); ?>
    </select>
	<select name="mois">
     <?php mois(); ?>
    </select>
	<select name="annee">
	<?php anee(); ?>
    </select>
	</p>
	<p> au
	<select name="jour1">
     <?php jours(); ?>
    </select>
	<select name="mois1">
     <?php mois(); ?>
    </select>
	<select name="annee1">
	<?php anee(); ?>
    </select>
	</p>
	<hr size=8 width="700" COLOR="#C0C0C0"> 
	<p><input type="submit" value="calculer" /></p>
  </form>
  <hr size=8 width="700" COLOR="#C0C0C0">
  <br> 
<br>
<br>

  
  
<!-- fait appele a dateeva.php ++ -->