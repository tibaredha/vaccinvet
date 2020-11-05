<?php 
$IDVAC=$_GET["IDVAC"];
$query_liste = "SELECT * FROM regvac where idregvac=$IDVAC ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
$row = mysql_fetch_array($requete); 

include('./SESSION/SESSION.php'); 
$per ->h(2,80,180,'CERTIFICAT DE VACCINATION Dr:'.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (8);
$per ->f0('index.php?uc=MODVAC1','post','formGCS');
$per ->submit(1110,250,'MODIFICATION ACTE VACCINATION');
$per ->label(80,250,'* BILAN N°:');                $per ->txt(200,250,'BILAN',10,$row['NBILAN']);
$per ->label(300,250,'* N°:');                     $per ->txt(338,250,'N',6,$row['NCERTIFICAT']);
$per ->label(450,250,'* Date');                    $per ->txt(580,250,'a1',29,$row['datevac']);
$per ->label(80,280,'* Nom Eleveur');              $per ->txt(200,280,'a3',29,$row['nomeleveur']);
// $per ->label(450,280,'* Prenom Eleveur');          $per ->txt(580,280,'a4',29,'');
$per ->label(1000,280,'* Fils De');                $per ->txt(1065,280,'a5',29,$row['FILSDE']);
$per ->label(80,310,'* N°CIN/PC');                 $per ->txt(200,310,'a6',29,$row['CINPC']);
$per ->label(450,310,'* Delivre Le');              $per ->txt(580,310,'a7',29,$row['DELE']);
$per ->label(800,310,'* Daira De');                $per ->txt(880,310,'a8',15,$row['DAIRADE']);
$per ->label(1020,310,'CFN');                      $per ->txt(1065,310,'a9',29,$row['CFN']);
// $per ->label(80,340,'* Wilaya ');                  $per ->WILAYA1(200,340,'WILAYAR','vaccinvet','wil'); 
// $per ->label(450,340,'* Daira ');                  $per ->DAIRA2(580,340,'DAIRA'); 
// $per ->label(800,340,'* Commune ');                $per ->COMMUNE3(880,340,'COMMUNER');                 
$per ->label(1000,340,'* Adresse ');               $per ->txt(1065,340,'ADRESSE',29,$row['adresse']);           
$per ->hide(10,10,'IDVAC',20,$IDVAC);
// $per ->hide(10,10,'DAI',20,$_SESSION["DAIRA"]);
// $per ->hide(10,10,'COM',20,$_SESSION["COMMUNE"]);
// $per ->hide(10,10,'AVND',20,$_SESSION["AVND"]);
// $per ->hide(10,10,'AVNW',20,$_SESSION["AVNW"]);
?>
<BR>
<table width="90%" border="1" cellpadding="1" cellspacing="0"align="center">				
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="22%"align="center"   >TYPE VACCIN</td>
			      <td>
		            <div align="center">
					<input class="entetevet"READONLY  name=""  size="10" value="Brebis"         type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Béliers"        type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Antenais"       type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Antenaisses"    type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Agneaux"        type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Agnelles"       type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Caprins"        type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Total"          type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Doses Perdues"          type="text" > 
					</div>
				  </td>  				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2">ANTI-CLAVELEUSE</td>
			      <td>
		            <div align="center">
					  <input name="b1"   size="10" value="<?php echo$row['vacb1'];?>" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b2"   size="10" value="<?php echo$row['vacb2'];?>" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b3"   size="10" value="<?php echo$row['vacb3'];?>" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b4"   size="10" value="<?php echo$row['vacb4'];?>" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b5"   size="10" value="<?php echo$row['vacb5'];?>" type="text" onblur="CLAVELEUSE()" ;>
					  <input name="b6"   size="10" value="<?php echo$row['vacb6'];?>" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b7"   size="10" value="<?php echo$row['vacb7'];?>" type="text" READONLY onblur="CLAVELEUSE()" ;>
		              <input name="b8"   size="10" value="00" type="text" READONLY >
					  <input name="DPb"  size="10" value="<?php echo$row['DPVAC'];?>" type="text"  > 
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2"> ANTI-BRUCELLIQUE </td>
			      <td>
		            <div align="center">
					  <input name="c1"   size="10" value="<?php echo$row['vabc1'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c2"   size="10" value="<?php echo$row['vabc2'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c3"   size="10" value="<?php echo$row['vabc3'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c4"   size="10" value="<?php echo$row['vabc4'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c5"   size="10" value="<?php echo$row['vabc5'];?>" type="text" onblur="BRUCELLIQUE()" ;>
					  <input name="c6"   size="10" value="<?php echo$row['vabc6'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c7"   size="10" value="<?php echo$row['vabc7'];?>" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c8"   size="10" value="00" type="text" READONLY> 
					  <input name="DPc"  size="10" value="<?php echo$row['DPVAB'];?>" type="text"  > 
					</div>
				  </td>  
			    </tr>
</table>
</BR>
<table width="90%" border="1" cellpadding="1" cellspacing="0"align="center">				
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="22%" align="center"   >TYPE VACCIN</td>
			      <td>
		            <div align="center">
					<input class="entetevet"READONLY  name=""  size="10" value="Vaches Laitières"  type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Génisses"          type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Taureaux"          type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Taurillons"        type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Veaux"             type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Velles"            type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Total"             type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Doses Perdues"     type="text" >  
					</div>
				  </td>  				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2">ANTI-APHTEUSE </td>
			      <td>
		            <div align="center">
					  <input name="d1"   size="10" value="<?php echo$row['vaad1'];?>" type="text" onblur="APHTEUSE()" ; >
		              <input name="d2"   size="10" value="<?php echo$row['vaad2'];?>" type="text" onblur="APHTEUSE()" ;>
		              <input name="d3"   size="10" value="<?php echo$row['vaad3'];?>" type="text" onblur="APHTEUSE()" ;>
		              <input name="d4"   size="10" value="<?php echo$row['vaad4'];?>" type="text" onblur="APHTEUSE()" ;>
		              <input name="d5"   size="10" value="<?php echo$row['vaad5'];?>" type="text" onblur="APHTEUSE()" ;>
					  <input name="d6"   size="10" value="<?php echo$row['vaad6'];?>" type="text" onblur="APHTEUSE()" ;>
		              <input name="d7"   size="10" value="00" type="text" READONLY>
					  <input name="DPd"  size="10" value="<?php echo$row['DPVAA'];?>" type="text"  > 
		             
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2"> ANTI-RABIQUE </td>
			      <td>
		            <div align="center">
					  <input name="e1"   size="10" value="<?php echo$row['vare1'];?>" type="text" onblur="RABIQUE()" ;>
		              <input name="e2"   size="10" value="<?php echo$row['vare2'];?>" type="text" onblur="RABIQUE()" ;>
		              <input name="e3"   size="10" value="<?php echo$row['vare3'];?>" type="text" onblur="RABIQUE()" ;>
		              <input name="e4"   size="10" value="<?php echo$row['vare4'];?>" type="text" onblur="RABIQUE()" ;>
		              <input name="e5"   size="10" value="<?php echo$row['vare5'];?>" type="text" onblur="RABIQUE()" ;>
					  <input name="e6"   size="10" value="<?php echo$row['vare6'];?>" type="text" onblur="RABIQUE()" ;>
		              <input name="e7"   size="10" value="00" type="text" READONLY>
					  <input name="DPe"  size="10" value="<?php echo$row['DPVAR'];?>" type="text"  > 
		              
					</div>
				  </td>  
			    </tr>
</table>
 <?php 
$per ->f1();
$per ->label(80,575,'(*)champ obligatoire'); 

?>