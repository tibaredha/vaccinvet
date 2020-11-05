<?php 
$IDVAC=$_GET["IDVAC"];
include('./SESSION/SESSION.php'); 

$per ->h(2,150,200,'MODIFICATION ACTE VACCINATION');
$per -> sautligne (8);
$per ->f0('index.php?uc=MODVAC1','post','formGCS');
$per ->submit(995,240,' MODIFICATION ACTE VACCINATION');
$per ->hide(100,100,'idregvac',20,$IDVAC);
$query_liste = "SELECT * FROM regvac where idregvac=$IDVAC ";
$requete = mysql_query( $query_liste, $cnx ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );	
while( $result = mysql_fetch_array( $requete ) )
{
$per ->label(100,250,'BILAN N°:');               $per ->txt(260,250,'bilan',10,'');
$per ->label(500,250,'Date/Heure');              $per ->datetime (670,250,'a1');$per ->txt(820,250,'a2',4,date("H:i"));
$per ->label(100,280,'Nom Eleveur');             $per ->txt(260,280,'a3',29,'');
$per ->label(500,280,'Prenom Eleveur');          $per ->txt(670,280,'a4',29,'');
$per ->label(900,280,'Fils De');                 $per ->txt(1065,280,'a5',29,'');
$per ->label(100,310,'N°CIN/PC');                $per ->txt(260,310,'a6',29,'');
$per ->label(500,310,'Delivre Le');              $per ->datetime(670,310,'a7');
$per ->label(830,310,'Daira De');                $per ->txt(890,310,'a8',15,'');
$per ->label(1020,310,'CFN');                    $per ->txt(1065,310,'a9',29,'');
$per ->label(100,340,'Wilaya de residence');     $per ->WILAYAR(260,340,'WILAYAR','grh','wil'); 
$per ->label(500,340,'Commune de residence');    $per ->COMMUNER(670,340,'COMMUNER');           
$per ->label(900,340,'Adresse de residence');    $per ->txt(1065,340,'ADRESSE',29,'');








} 

?>
<BR>
<table width="90%" border="1" cellpadding="1" cellspacing="0"align="center">				
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="22%"></td>
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
					</div>
				  </td>  				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2">ANTI-CLAVELEUSE </td>
			      <td>
		            <div align="center">
					  <input name="b1"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b2"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b3"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b4"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b5"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
					  <input name="b6"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b7"   size="10" value="00" type="text" onblur="CLAVELEUSE()" ;>
		              <input name="b8"   size="10" value="00" type="text" READONLY > 
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2"> ANTI-BRUCELLIQUE </td>
			      <td>
		            <div align="center">
					 <input name="c1"   size="10" value="00" type="text"  onblur="BRUCELLIQUE()" ;>
		              <input name="c2"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c3"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c4"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c5"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
					  <input name="c6"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c7"   size="10" value="00" type="text" onblur="BRUCELLIQUE()" ;>
		              <input name="c8"   size="10" value="00" type="text" READONLY> 
					</div>
				  </td>  
			    </tr>
</table>
<BR>
<table width="90%" border="1" cellpadding="1" cellspacing="0"align="center">				
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="22%"></td>
			      <td>
		            <div align="center">
					<input class="entetevet"READONLY  name=""  size="10" value="Vaches Laitières"  type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Génisses"          type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Taureaux"          type="text" >
					<input class="entetevet"READONLY  name=""  size="10" value="Taurillons"        type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Veaux"             type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Velles"            type="text" > 
					<input class="entetevet"READONLY  name=""  size="10" value="Total"             type="text" > 
					 
					</div>
				  </td>  				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2">ANTI-APHTEUSE </td>
			      <td>
		            <div align="center">
					  <input name="d1"   size="10" value="00" type="text" onblur="APHTEUSE()" ; >
		              <input name="d2"   size="10" value="00" type="text" onblur="APHTEUSE()" ;>
		              <input name="d3"   size="10" value="00" type="text" onblur="APHTEUSE()" ;>
		              <input name="d4"   size="10" value="00" type="text" onblur="APHTEUSE()" ;>
		              <input name="d5"   size="10" value="00" type="text" onblur="APHTEUSE()" ;>
					  <input name="d6"   size="10" value="00" type="text" onblur="APHTEUSE()" ;>
		              <input name="d7"   size="10" value="00" type="text" READONLY>
		             
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				  <td colspan="2"> ANTI-RABIQUE </td>
			      <td>
		            <div align="center">
					  <input name="e1"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
		              <input name="e2"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
		              <input name="e3"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
		              <input name="e4"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
		              <input name="e5"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
					  <input name="e6"   size="10" value="00" type="text" onblur="RABIQUE()" ;>
		              <input name="e7"   size="10" value="00" type="text" READONLY>  
					</div>
				  </td>  
			    </tr>
</table>
 <?php 
$per ->f1();

?>