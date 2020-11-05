 <div class="footer">
    <p><strong>INSPECTION VETERINAIRE DE LA WILAYA DE DJELFA</strong><a href="mailto:ivwdjelfa17@gmail.com"> E-MAIL </a>
	<?php 
if(!isset($_SESSION["USER"]) || $_SESSION["USER"] == "")
{	 
  echo( "Vous etes Deconnecté" ); 
}
else
{
  echo( "Vous etes Connecté"." ".$_SESSION["USER"]." "."" ); 
}
?>
</p>   

	
</div>       
