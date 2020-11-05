<!-- fait appele a EVARESFIN.php par include ++ -->
<?php include('EVARESFIN.php');


?>    
<div class="content">
  <H1 ALIGN = "center">EVALUATION </H1>
  <H3 ALIGN = "center">Resultat&nbspdu&nbsp;<?php echo $datejour11; ?>&nbsp;au&nbsp;<?php echo $datejour22 ; ?></a></H3>
  <hr size=8 width="700" COLOR="#C0C0C0">  
 <table ALIGN = "center" width="700"  BORDERCOLOR="red" BACKGROUND="" border="1" cellspacing="1" cellpadding="2">
  <CAPTION>UNITE COLLECTE</CAPTION>
    <tr><TH>Nbr Don Sang Total</TH><TH>       Fixe                                                                      </TH><TH>     Mobile                                                                           </TH><TH>Total </TH></tr>
    <tr><td>Don Regulier    </td><td ALIGN = "center"><?php echo collecte('regulier','fixe',$datejour1,$datejour2);    ?></td><td ALIGN = "center"><?php echo collecte('regulier','mobile',$datejour1,$datejour2);   ?></td><td ALIGN = "center"><?php echo collecte('regulier','mobile',$datejour1,$datejour2)+collecte('regulier','fixe',$datejour1,$datejour2);  ?></td></tr>
    <tr><td>Don Occasionnels</td><td ALIGN = "center"><?php echo collecte('Occasionnel','fixe',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo collecte('Occasionnel','mobile',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo collecte('Occasionnel','mobile',$datejour1,$datejour2)+collecte('Occasionnel','fixe',$datejour1,$datejour2); ?></td></tr>
    <tr><td>Total Don       </td><td ALIGN = "center"><?php echo collecte('Occasionnel','fixe',$datejour1,$datejour2)+collecte('regulier','fixe',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo collecte('regulier','mobile',$datejour1,$datejour2)+collecte('Occasionnel','mobile',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo "total"  ?></td></tr>
  </table> 
  <hr size=8 width="700" COLOR="#C0C0C0">
  
  <table ALIGN = "center" width="700" BGCOLOR="#C0C0C0" border="1" cellspacing="1" cellpadding="2">
  <CAPTION>UNITE PREPARATION</CAPTION>
   
   <tr><td BGCOLOR="yellow">Psl Preparer</td>   <td><?php echo PREPARATION('CGR',$datejour1,$datejour2)+PREPARATION('PFC',$datejour1,$datejour2)+PREPARATION('CPS',$datejour1,$datejour2);?></td><td>Psl Non Etiquete</td><td><?php echo PREPARATION('VI',$datejour1,$datejour2)+PREPARATION('FDS',$datejour1,$datejour2)+ PREPARATION('AC',$datejour1,$datejour2)+PREPARATION('PCC',$datejour1,$datejour2)+PREPARATION('PL',$datejour1,$datejour2) ; ?></td></tr> 
   <tr><td>Sang Total</td>                      <td><?php echo PREPARATION('null',$datejour1,$datejour2) ;?></td><td>Volume Insufisant</td>   <td><?php echo PREPARATION('VI',$datejour1,$datejour2) ;   ?></td></tr>
   <tr><td>Cencentre Globulaire </td>           <td><?php echo PREPARATION('CGR',$datejour1,$datejour2) ; ?></td><td>Fuite Defaut Soudure</td><td><?php echo PREPARATION('FDS',$datejour1,$datejour2) ;  ?></td></tr>
   <tr><td>Plasma frai Congele</td>             <td><?php echo PREPARATION('PFC',$datejour1,$datejour2) ; ?></td><td>Aspect Coagule</td>      <td><?php echo PREPARATION('AC',$datejour1,$datejour2) ;   ?></td></tr>
   <tr><td>Concentre Standard Slaquetaire</td>  <td><?php echo PREPARATION('CPS',$datejour1,$datejour2) ; ?></td><td>Pfc Cp Contamine </td>   <td><?php echo PREPARATION('PCC',$datejour1,$datejour2) ;  ?></td></tr>  
   <tr><td>Concentre Plaquetaire D apherese</td><td><?php echo PREPARATION('null',$datejour1,$datejour2) ;?></td><td>pfc lipemique </td>      <td><?php echo PREPARATION('PL',$datejour1,$datejour2) ;   ?></td></tr>  
   <tr><td>Cryoprecipite</td>                   <td><?php echo PREPARATION('null',$datejour1,$datejour2) ;?></td><td>Serologie Positive</td>  <td><?php echo PREPARATION('null',$datejour1,$datejour2) ; ?></td></tr>  
   <tr><td>&nbsp;</td><td>&nbsp;</td>                                                                            <td>Autres</td>              <td><?php echo PREPARATION('null',$datejour1,$datejour2) ; ?></td></tr>   
  </table>
  <hr size=8 width="700" COLOR="#C0C0C0">
  
  <table ALIGN = "center" width="700" BGCOLOR="#C0C0C0" border="1" cellspacing="1" cellpadding="2">
  <CAPTION>Unite Qualification Serologie </CAPTION>
   <TR><TH></TH>                    <TH>Don Serotype                                                              </TH><TH>Depiste Positifs/Douteux                                             </TH><TH>Controle Positifs/Douteux                                            </TH><TH>Confirme Positifs  </TH></TR>
   <tr><td BGCOLOR="yellow">HIV</td><td ALIGN = "center"><?php echo qualification('HIV',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HIV','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HIV','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HIV','Positif',$datejour1,$datejour2); ?></td></tr> 
   <tr><td>HVB                 </td><td ALIGN = "center"><?php echo qualification('HVB',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVB','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVB','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVB','Positif',$datejour1,$datejour2); ?></td></tr>
   <tr><td>HVC                 </td><td ALIGN = "center"><?php echo qualification('HVC',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVC','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVC','douteux',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo qualificationdp('HVC','Positif',$datejour1,$datejour2); ?></td></tr>
   <tr><td>Syphilis            </td><td ALIGN = "center"><?php echo qualification('TPHA',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('TPHA','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('TPHA','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('TPHA','Positif',$datejour1,$datejour2); ?></td></tr> 
   <tr><td>CMV                 </td><td ALIGN = "center"><?php echo qualification('null',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','Positif',$datejour1,$datejour2); ?>  </td></tr>  
   <tr><td>Paludisme           </td><td ALIGN = "center"><?php echo qualification('null',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','douteux',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo qualificationdp('null','Positif',$datejour1,$datejour2); ?> </td></tr>  
  </table>
  <hr size=8 width="700" COLOR="#C0C0C0">
  
  
  <table ALIGN = "center" width="700"  BORDERCOLOR="red" BACKGROUND="" border="1" cellspacing="1" cellpadding="2">
  <CAPTION>unite qualification immunologie</CAPTION>
    <tr><td>Groupage 02 Epreuves      </td><td ALIGN = "center">Oui</td><td ALIGN = "center"><?php echo immunologie($datejour1,$datejour2); ?></td><td ALIGN = "center">Non</td><td ALIGN = "center"><?php echo immunologie1($datejour1,$datejour2); ?> </td></tr>
    <tr><td>DNR Phenotype             </td><td ALIGN = "center">00 </td><td>REC Phenotype                                                     </td><td COLSPAN=2 ALIGN = "center">00</td></tr>
    <tr><td>Epreuve De Compatibillite </td><td COLSPAN=4 ALIGN = "center"><?php echo immunologie($datejour1,$datejour2);?></td></tr> 
  </table> 
  <hr size=8 width="700" COLOR="#C0C0C0">
  
  <table ALIGN = "center" width="700" BGCOLOR="#C0C0C0" border="1" cellspacing="1" cellpadding="2">
   <CAPTION>Unite Distribution </CAPTION>
   <TR><TH>Service        </TH><TH>ST                                                                         </TH><TH>CGR                                                                         </TH><TH>PFC                                                                    </TH><TH>CP                                                                       </TH><TH>CPA</TH></TR>
   <tr><td>Chirurgie Homme</td><td ALIGN = "center"><?php echo distribution('CHIRURGIE HOMME','ST',$datejour1,$datejour2);   ?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE HOMME','CGR',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE HOMME','PFC',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE HOMME','CPS',$datejour1,$datejour2);?></td><td>***</td></tr>
   <tr><td>Chirurgie Femme</td><td ALIGN = "center"><?php echo distribution('CHIRURGIE FEMME','ST',$datejour1,$datejour2);   ?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE FEMME','CGR',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE FEMME','PFC',$datejour1,$datejour2);?></td><td ALIGN = "center"><?php echo distribution('CHIRURGIE FEMME','CPS',$datejour1,$datejour2);?></td><td>***</td></tr>
   <tr><td>Medecine  Homme</td><td ALIGN = "center"><?php echo distribution('MEDECINE HOMME','ST',$datejour1,$datejour2);    ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE HOMME','CGR',$datejour1,$datejour2);  ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE HOMME','PFC',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE HOMME','CPS',$datejour1,$datejour2); ?></td><td>***</td></tr>
   <tr><td>Medecine  Femme</td><td ALIGN = "center"><?php echo distribution('MEDECINE FEMME','ST',$datejour1,$datejour2);    ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE FEMME','CGR',$datejour1,$datejour2);  ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE FEMME','PFC',$datejour1,$datejour2); ?></td><td ALIGN = "center"><?php echo distribution('MEDECINE FEMME','CPS',$datejour1,$datejour2); ?></td><td>***</td></tr>
   <tr><td>Gyneco         </td><td ALIGN = "center"><?php echo distribution('GYNECO','ST',$datejour1,$datejour2);            ?></td><td ALIGN = "center"><?php echo distribution('GYNECO','CGR',$datejour1,$datejour2);          ?></td><td ALIGN = "center"><?php echo distribution('GYNECO','PFC',$datejour1,$datejour2);         ?></td><td ALIGN = "center"><?php echo distribution('GYNECO','CPS',$datejour1,$datejour2);         ?></td><td>***</td></tr>
   <tr><td>Maternite      </td><td ALIGN = "center"><?php echo distribution('MATERNITE','ST',$datejour1,$datejour2);         ?></td><td ALIGN = "center"><?php echo distribution('MATERNITE','CGR',$datejour1,$datejour2);       ?></td><td ALIGN = "center"><?php echo distribution('MATERNITE','PFC',$datejour1,$datejour2);      ?></td><td ALIGN = "center"><?php echo distribution('MATERNITE','CPS',$datejour1,$datejour2);      ?></td><td>***</td></tr>
   <tr><td>Pediatrie      </td><td ALIGN = "center"><?php echo distribution('PEDIATRIE','ST',$datejour1,$datejour2);         ?></td><td ALIGN = "center"><?php echo distribution('PEDIATRIE','CGR',$datejour1,$datejour2);       ?></td><td ALIGN = "center"><?php echo distribution('PEDIATRIE','PFC',$datejour1,$datejour2);      ?></td><td ALIGN = "center"><?php echo distribution('PEDIATRIE','CPS',$datejour1,$datejour2);      ?></td><td>***</td></tr>
   <tr><td>Bloc A         </td><td ALIGN = "center"><?php echo distribution('BLOC OPP A','ST',$datejour1,$datejour2);        ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP A','CGR',$datejour1,$datejour2);      ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP A','PFC',$datejour1,$datejour2);     ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP A','CPS',$datejour1,$datejour2);     ?></td><td>***</td></tr>
   <tr><td>Bloc B         </td><td ALIGN = "center"><?php echo distribution('BLOC OPP B','ST',$datejour1,$datejour2);        ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP B','CGR',$datejour1,$datejour2);      ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP B','PFC',$datejour1,$datejour2);     ?></td><td ALIGN = "center"><?php echo distribution('BLOC OPP B','CPS',$datejour1,$datejour2);     ?></td><td>***</td></tr>
   <tr><td>Umc            </td><td ALIGN = "center"><?php echo distribution('UMC','ST',$datejour1,$datejour2);               ?></td><td ALIGN = "center"><?php echo distribution('UMC','CGR',$datejour1,$datejour2);             ?></td><td ALIGN = "center"><?php echo distribution('UMC','PFC',$datejour1,$datejour2);            ?></td><td ALIGN = "center"><?php echo distribution('UMC','CPS',$datejour1,$datejour2);            ?></td><td>***</td></tr>
   <tr><td>Dialyse        </td><td ALIGN = "center"><?php echo distribution('HEMODIALYSE','ST',$datejour1,$datejour2);       ?></td><td ALIGN = "center"><?php echo distribution('HEMODIALYSE','CGR',$datejour1,$datejour2);     ?></td><td ALIGN = "center"><?php echo distribution('HEMODIALYSE','PFC',$datejour1,$datejour2);    ?></td><td ALIGN = "center"><?php echo distribution('HEMODIALYSE','CPS',$datejour1,$datejour2);    ?></td><td>***</td></tr>
   <tr><td>Total          </td><td ALIGN = "center"><?php  //echo distribution('PTS','CGR',$datejour1,$datejour2);  ?>
                          </td><td><?php?>
						  </td><td><?php?>
						  </td><td><?php?></td><td>***</td></tr>
  </table>
  <hr size=8 width="700" COLOR="#C0C0C0">
 </div>