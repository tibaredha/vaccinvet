<?php 
include('./SESSION/SESSION.php');

$per ->h(3,50,180,'CERTIFICAT DE SALUBRITE/SAISIE  DES VIANDES ROUGES Dr: '.$_SESSION["USER"]."  AVN: ".$_SESSION["AVN"]);
$per -> sautligne (2);
$per ->f0('./1abt/AJBAT1.php','post','formGCS');
$per ->submit(1150,200,' IMPRIMER CERTIFICAT ');
?>
<hr />	
<table width="100%" border="1" cellpadding="1" cellspacing="0"align="center">
	            
		<tr bgcolor="white">
				  <td colspan="5" width="12%"   >Atelier D'abattage</td>
			      <td>
		            <div align="center">
					<input READONLY  name=""  size="20" value="     "      type="text" > 
					<input READONLY  name=""  size="12" value="BOUCHER"    type="text" >
					<input           name="NBOUCHER"  size="15" value="     "      type="text" > 
					<input           name="PBOUCHER"  size="15" value="     "      type="text" > 
					<input           name="ADRESSE"  size="15" value="     "      type="text" > 
					<input           name=""  size="12" value=""           type="date" > 
					<input           name=""  size="12" value="<?php $datejour=date("H:i");echo"$datejour";?> "       type="text" > 
					</div>
				  </td>				  
	    </tr>		
				
				
</table>
</BR>				
<table width="100%" border="1" cellpadding="1" cellspacing="0"align="center">				
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="12%"   > VIANDES ROUGES</td>
			      <td>
		            <div align="center">
					<input READONLY  name=""  size="5" value="VEAUX"           type="text" >
					<input READONLY  name=""  size="5" value="BOEUFS"          type="text" >
					<input READONLY  name=""  size="7" value="TAUREAUX"        type="text" >
					<input READONLY  name=""  size="5" value="VACHES"          type="text" > 
					<input READONLY  name=""  size="7" value="GENISSES"        type="text" > 
					<input READONLY  name=""  size="4" value="BELIERS"         type="text" > 
					<input READONLY  name=""  size="6" value="AGNEAUX"         type="text" > 
					<input READONLY  name=""  size="3" value="BREBIS"          type="text" > 
					<input READONLY  name=""  size="6" value="CHEVRES"         type="text" > 
					<input READONLY  name=""  size="8" value="CHEVREAUX"       type="text" > 
					<input READONLY  name=""  size="7" value="CHAMEAUX"       type="text" > 
					<input READONLY  name=""  size="6" value="CHAMELLES"      type="text" > 
					<input READONLY  name=""  size="5" value="CHEVEAUX"       type="text" > 
					<input READONLY  name=""  size="5" value="POULINS"        type="text" > 
					</div>
				  </td>  				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2"> NOMBRE </td>
			      <td>
		            <div     align="center">
					<input   name="NVEAUX"      size="5" value="00"       type="text" >
					<input   name="NBOEUFS"     size="5" value="00"       type="text" >
					<input   name="NTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="NVACHES"     size="5" value="00"       type="text" > 
					<input   name="NGENISSES"   size="7" value="00"       type="text" > 
					<input   name="NBELIERS"    size="4" value="00"       type="text" > 
					<input   name="NAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="NBREBIS"     size="3" value="00"       type="text" > 
					<input   name="NCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="NCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="NCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="NCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="NCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="NPOULINS"    size="5" value="00"       type="text" >
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2"> VIANDE FORRAINE </td>
			      <td>
		            <div align="center">
					<input   name="NFVEAUX"      size="5" value="00"       type="text" >
					<input   name="NFBOEUFS"     size="5" value="00"       type="text" >
					<input   name="NFTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="NFVACHES"     size="5" value="00"       type="text" > 
					<input   name="NFGENISSES"   size="7" value="00"       type="text" > 
					<input   name="NFBELIERS"    size="4" value="00"       type="text" > 
					<input   name="NFAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="NFBREBIS"     size="3" value="00"       type="text" > 
					<input   name="NFCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="NFCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="NFCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="NFCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="NFCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="NFPOULINS"    size="5" value="00"       type="text" >
					</div>
				  </td>  
			    </tr>
</table>
</BR>					
<table width="100%" border="1" cellpadding="1" cellspacing="0"align="center">					
				<tr bgcolor="YELLOW">
				  <td colspan="2" width="12%"    > Saisies Totales</td>
			      <td>
		            <div align="center">
					<input READONLY  name=""  size="5" value="VEAUX"           type="text" >
					<input READONLY  name=""  size="5" value="BOEUFS"          type="text" >
					<input READONLY  name=""  size="7" value="TAUREAUX"        type="text" >
					<input READONLY  name=""  size="5" value="VACHES"          type="text" > 
					<input READONLY  name=""  size="7" value="GENISSES"        type="text" > 
					
					<input READONLY  name=""  size="4" value="BELIERS"         type="text" > 
					<input READONLY  name=""  size="6" value="AGNEAUX"         type="text" > 
					<input READONLY  name=""  size="3" value="BREBIS"          type="text" > 
					
					<input READONLY  name=""  size="6" value="CHEVRES"         type="text" > 
					<input READONLY  name=""  size="8" value="CHEVREAUX"       type="text" > 
					
					<input READONLY  name=""  size="7" value="CHAMEAUX"        type="text" > 
					<input READONLY  name=""  size="6" value="CHAMELLES"       type="text" > 
					
					<input READONLY  name=""  size="5" value="CHEVEAUX"        type="text" > 
					<input READONLY  name=""  size="5" value="POULINS"         type="text" > 
					
					</div>
				  </td> 				  
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Tuberculose:</td>
			      <td>
		            <div align="center">
                    <input   name="TVEAUX"      size="5" value="00"       type="text" >
					<input   name="TBOEUFS"     size="5" value="00"       type="text" >
					<input   name="TTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="TVACHES"     size="5" value="00"       type="text" > 
					<input   name="TGENISSES"   size="7" value="00"       type="text" > 
					<input   name="TBELIERS"    size="4" value="00"       type="text" > 
					<input   name="TAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="TBREBIS"     size="3" value="00"       type="text" > 
					<input   name="TCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="TCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="TCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="TCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="TCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="TPOULINS"    size="5" value="00"       type="text" >
		                
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Viandes ictériques:</td>
			      <td>
		            <div align="center">
					<input   name="IVEAUX"      size="5" value="00"       type="text" >
					<input   name="IBOEUFS"     size="5" value="00"       type="text" >
					<input   name="ITAUREAUX"   size="7" value="00"       type="text" >
					<input   name="IVACHES"     size="5" value="00"       type="text" > 
					<input   name="IGENISSES"   size="7" value="00"       type="text" > 
					<input   name="IBELIERS"    size="4" value="00"       type="text" > 
					<input   name="IAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="IBREBIS"     size="3" value="00"       type="text" > 
					<input   name="ICHEVRES"    size="6" value="00"       type="text" > 
					<input   name="ICHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="ICHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="ICHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="ICHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="IPOULINS"    size="5" value="00"       type="text" >
		                
					</div>
				  </td> 
			    </tr>
				
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Pneumonies:</td>
			      <td>
		            <div align="center">
					<input   name="PVEAUX"      size="5" value="00"       type="text" >
					<input   name="PBOEUFS"     size="5" value="00"       type="text" >
					<input   name="PTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="PVACHES"     size="5" value="00"       type="text" > 
					<input   name="PGENISSES"   size="7" value="00"       type="text" > 
					<input   name="PBELIERS"    size="4" value="00"       type="text" > 
					<input   name="PAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="PBREBIS"     size="3" value="00"       type="text" > 
					<input   name="PCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="PCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="PCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="PCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="PCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="PPOULINS"    size="5" value="00"       type="text" >
		               
					</div>
				  </td> 
			    </tr>
				
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Ladrerie:</td>
			      <td>
		            <div align="center">
					<input   name="LVEAUX"      size="5" value="00"       type="text" >
					<input   name="LBOEUFS"     size="5" value="00"       type="text" >
					<input   name="LTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="LVACHES"     size="5" value="00"       type="text" > 
					<input   name="LGENISSES"   size="7" value="00"       type="text" > 
					<input   name="LBELIERS"    size="4" value="00"       type="text" > 
					<input   name="LAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="LBREBIS"     size="3" value="00"       type="text" > 
					<input   name="LCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="LCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="LCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="LCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="LCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="LPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Septicémie:</td>
			      <td>
		            <div align="center">
					<input   name="SVEAUX"      size="5" value="00"       type="text" >
					<input   name="SBOEUFS"     size="5" value="00"       type="text" >
					<input   name="STAUREAUX"   size="7" value="00"       type="text" >
					<input   name="SVACHES"     size="5" value="00"       type="text" > 
					<input   name="SGENISSES"   size="7" value="00"       type="text" > 
					<input   name="SBELIERS"    size="4" value="00"       type="text" > 
					<input   name="SAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="SBREBIS"     size="3" value="00"       type="text" > 
					<input   name="SCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="SCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="SCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="SCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="SCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="SPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td>  
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Etat cadavérique:</td>
			      <td>
		            <div align="center">
					<input   name="CVEAUX"      size="5" value="00"       type="text" >
					<input   name="CBOEUFS"     size="5" value="00"       type="text" >
					<input   name="CTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="CVACHES"     size="5" value="00"       type="text" > 
					<input   name="CGENISSES"   size="7" value="00"       type="text" > 
					<input   name="CBELIERS"    size="4" value="00"       type="text" > 
					<input   name="CAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="CBREBIS"     size="3" value="00"       type="text" > 
					<input   name="CCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="CPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				
				
                <tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Viande fiévreuse:</td>
			      <td>
		            <div align="center">
					<input   name="FVEAUX"      size="5" value="00"       type="text" >
					<input   name="FBOEUFS"     size="5" value="00"       type="text" >
					<input   name="FTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="FVACHES"     size="5" value="00"       type="text" > 
					<input   name="FGENISSES"   size="7" value="00"       type="text" > 
					<input   name="FBELIERS"    size="4" value="00"       type="text" > 
					<input   name="FAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="FBREBIS"     size="3" value="00"       type="text" > 
					<input   name="FCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="FCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="FCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="FCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="FCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="FPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Viande cachectique:</td>
			      <td>
		            <div align="center">
					<input   name="CHVEAUX"      size="5" value="00"       type="text" >
					<input   name="CHBOEUFS"     size="5" value="00"       type="text" >
					<input   name="CHTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="CHVACHES"     size="5" value="00"       type="text" > 
					<input   name="CHGENISSES"   size="7" value="00"       type="text" > 
					<input   name="CHBELIERS"    size="4" value="00"       type="text" > 
					<input   name="CHAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="CHBREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="CHPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Mélanose:</td>
			      <td>
		            <div align="center">
					<input   name="MVEAUX"      size="5" value="00"       type="text" >
					<input   name="MBOEUFS"     size="5" value="00"       type="text" >
					<input   name="MTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="MVACHES"     size="5" value="00"       type="text" > 
					<input   name="MGENISSES"   size="7" value="00"       type="text" > 
					<input   name="MBELIERS"    size="4" value="00"       type="text" > 
					<input   name="MAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="MBREBIS"     size="3" value="00"       type="text" > 
					<input   name="MCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="MCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="MCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="MCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="MCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="MPOULINS"    size="5" value="00"       type="text" >
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Viande traumatique:</td>
			      <td>
		            <div align="center">
					<input   name="TRVEAUX"      size="5" value="00"       type="text" >
					<input   name="TRBOEUFS"     size="5" value="00"       type="text" >
					<input   name="TRTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="TRVACHES"     size="5" value="00"       type="text" > 
					<input   name="TRGENISSES"   size="7" value="00"       type="text" > 
					<input   name="TRBELIERS"    size="4" value="00"       type="text" > 
					<input   name="TRAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="TRBREBIS"     size="3" value="00"       type="text" > 
					<input   name="TRCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="TRCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="TRCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="TRCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="TRCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="TRPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Autre à préciser:</td>
			     <td>
		            <div align="center">
					<input   name="APVEAUX"      size="5" value="00"       type="text" >
					<input   name="APBOEUFS"     size="5" value="00"       type="text" >
					<input   name="APTAUREAUX"   size="7" value="00"       type="text" >
					<input   name="APVACHES"     size="5" value="00"       type="text" > 
					<input   name="APGENISSES"   size="7" value="00"       type="text" > 
					<input   name="APBELIERS"    size="4" value="00"       type="text" > 
					<input   name="APAGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="APBREBIS"     size="3" value="00"       type="text" > 
					<input   name="APCHEVRES"    size="6" value="00"       type="text" > 
					<input   name="APCHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="APCHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="APCHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="APCHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="APPOULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>


				
</table>
</BR>				
<table width="100%" border="1" cellpadding="1" cellspacing="0"align="center">					
				<tr bgcolor="YELLOW">
				
				  <td colspan="2"width="12%"    >Saisies D'organes </td>
			      <td>
		            <div align="center">
					<input READONLY  name=""  size="5" value="VEAUX"         type="text" >
					<input READONLY  name=""  size="5" value="BOEUFS"          type="text" >
					<input READONLY  name=""  size="7" value="TAUREAUX"        type="text" >
					<input READONLY  name=""  size="5" value="VACHES"         type="text" > 
					<input READONLY  name=""  size="7" value="GENISSES"       type="text" > 
					
					<input READONLY  name=""  size="4" value="BELIERS"       type="text" > 
					<input READONLY  name=""  size="6" value="AGNEAUX"       type="text" > 
					<input READONLY  name=""  size="3" value="BREBIS"       type="text" > 
					
					<input READONLY  name=""  size="6" value="CHEVRES"       type="text" > 
					<input READONLY  name=""  size="8" value="CHEVREAUX"       type="text" > 
					
					<input READONLY  name=""  size="7" value="CHAMEAUX"       type="text" > 
					<input READONLY  name=""  size="6" value="CHAMELLES"       type="text" > 
					
					<input READONLY  name=""  size="5" value="CHEVEAUX"       type="text" > 
					<input READONLY  name=""  size="5" value="POULINS"       type="text" > 
					
					
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Hydatidose:foie</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Hydatidose:pms</td>
			      <td>
		            <div align="center">
					 <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Tuberculose:foie</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Tuberculose:pms</td>
			      <td>
		           <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Fasciolose:foie</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Fasciolose:pms</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Autres :foie</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				
				<tr bgcolor="#E5F0F0">
				
				  <td colspan="2">Autres :pms</td>
			      <td>
		            <div align="center">
					  <input   name="VEAUX"      size="5" value="00"       type="text" >
					<input   name="BOEUFS"     size="5" value="00"       type="text" >
					<input   name="TAUREAUX"   size="7" value="00"       type="text" >
					<input   name="VACHES"     size="5" value="00"       type="text" > 
					<input   name="GENISSES"   size="7" value="00"       type="text" > 
					<input   name="BELIERS"    size="4" value="00"       type="text" > 
					<input   name="AGNEAUX"    size="6" value="00"       type="text" > 
					<input   name="BREBIS"     size="3" value="00"       type="text" > 
					<input   name="CHEVRES"    size="6" value="00"       type="text" > 
					<input   name="CHEVREAUX"  size="8" value="00"       type="text" > 
					<input   name="CHAMEAUX"   size="7" value="00"       type="text" > 
					<input   name="CHAMELLES"  size="6" value="00"       type="text" > 
					<input   name="CHEVEAUX"   size="5" value="00"       type="text" > 
					<input   name="POULINS"    size="5" value="00"       type="text" >
		              
		              
					</div>
				  </td> 
			    </tr>
				
			<tr bgcolor="GREEN">
				
				  <td colspan="2">
				  <div align="center">
				 
				  </td>
			      </div>
				  <td>
		            <div align="center"> 
					  <input type="reset"  name="VALIDER" id="VALIDER" value="initialiser" />  
                    </div>
				  </td> 
			 </tr>		
				
</table>
 <?php 
$per ->f1();
echo"NB:(*) champ obligatoire ";
?>