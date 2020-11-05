<?php
//******************************************************************************************************//
$N=$_POST["N"];
$date=$_POST["DATE"];
$dateeuro=date('d/m/Y');
$ELISAHIV=$_POST["HIVELISA"];$BANDELLETEHIV=$_POST["HIVB"]; 
$ELISAHVB=$_POST["HVBELISA"];$BANDELLETEHVB=$_POST["HVBB"]; 
$ELISAHVC=$_POST["HVCELISA"];$BANDELLETEHVC=$_POST["HVCB"]; 
$REACTIFVDRL=$_POST["VDRLELISA"];$BANDELLETEVDRL=$_POST["VDRLB"]; 
$GROUPAGESANGUIN=$_POST["GROUPAGEABORH"];
$POCHEASANGD=$_POST["POCHESD"];$POCHEASANGT=$_POST["POCHEST"];
$TUBESEC=$_POST["TUBESEC"];$TUBECITRATE=$_POST["TUBECITRATE"]; 
$COTON=$_POST["COTON"];$COMPRESSE=$_POST["COMPRESSE"];$SPARADRAT=$_POST["SPARADRAT"]; 
$AMBOUTJAUNE=$_POST["AMBOUTJ"];$AMBOUTBLEU=$_POST["AMBOUTB"];  
$SERING5CC=$_POST["SERING5CC"];$AIGUILLE=$_POST["AIGUILLE"];$EPICRANIENNE=$_POST["EPICRANIENNE"];  
$ALCHOOL=$_POST["ALCHOOL"];$H20=$_POST["H20"];
$LAME=$_POST["LAME"];
$GANTJEUTABLE=$_POST["GANTJEUTABLE"];    

$RELISAHIV=$_POST["HIVELISA"];$RBANDELLETEHIV=$_POST["HIVB"]; 
$RELISAHVB=$_POST["HVBELISA"];$RBANDELLETEHVB=$_POST["HVBB"]; 
$RELISAHVC=$_POST["HVCELISA"];$RBANDELLETEHVC=$_POST["HVCB"]; 
$RREACTIFVDRL=$_POST["VDRLELISA"];$RBANDELLETEVDRL=$_POST["VDRLB"]; 
$RGROUPAGESANGUIN=$_POST["GROUPAGEABORH"];
$RPOCHEASANGD=$_POST["POCHESD"];$RPOCHEASANGT=$_POST["POCHEST"];
$RTUBESEC=$_POST["TUBESEC"];$RTUBECITRATE=$_POST["TUBECITRATE"]; 
$RCOTON=$_POST["COTON"];$RCOMPRESSE=$_POST["COMPRESSE"];$RSPARADRAT=$_POST["SPARADRAT"]; 
$RAMBOUTJAUNE=$_POST["AMBOUTJ"];$RAMBOUTBLEU=$_POST["AMBOUTB"];  
$RSERING5CC=$_POST["SERING5CC"];$RAIGUILLE=$_POST["AIGUILLE"];$REPICRANIENNE=$_POST["EPICRANIENNE"];  
$RALCHOOL=$_POST["ALCHOOL"];$RH20=$_POST["H20"];
$RLAME=$_POST["LAME"];
$RGANTJEUTABLE=$_POST["GANTJEUTABLE"]; 
//******************************************************************************************************//
require('../PDF/invoice.php');
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage('p','A4');
$pdf->SetFont('Arial','B',10);
$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->Text(52,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
$pdf->Text(35,10,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->SetFont('Arial','B',15);
$pdf->Text(34,20,"ETABLISSEMENT PUBLIC HOSPITALIER:AIN OUSSERA");
$pdf->SetFont('Arial','B',20);
$pdf->Text(60,47,"BON DE COMMANDE/O ");
$pdf->Text(150,47,"N°".$N);
$pdf->SetFont('Arial','B',10);
$pdf->Text(5,60,"SERVICE:");
$pdf->Text(25,60,"POSTE DE TRANSFUSION SANGUINE");
$pdf->Text(5,68,"NOM DU MEDECIN CHEF:");$pdf->Text(50,68,"DR TIBA");
$pdf->Text(5,75,"LA JOURNEE DU:".$dateeuro);
$pdf->Rect(5, 80, 200, 168 ,"d");
$pdf->Line(5 ,92 ,205 ,92 );//ligne horizental
$pdf->Line(20 ,80 ,20 , 248);//ligne vertical
$pdf->Line(125 ,80 ,125 , 248);
$pdf->Line(150 ,80 ,150 , 248);
$pdf->Line(175 ,80 ,175 , 248);
$pdf->Text(10,87,"N°");
$pdf->Text(50,87,"designation du produits");
$pdf->Text(133,83,"stock");
$pdf->Text(132,87,"restant");
$pdf->Text(132,91,"service");
$pdf->Text(155,85,"quantite");
$pdf->Text(154,89,"demande");
$pdf->Text(182,85,"quantite");
$pdf->Text(184,89,"livres");
//lignes
$pdf->Text(10,97,"1");
$pdf->Text(25,97,"HIV ELISA");
$pdf->Text(132,97,$RELISAHIV);
$pdf->Text(155,97,$ELISAHIV);
$pdf->Line(5 ,98 ,205 ,98 );  //ligne horizental
$pdf->Text(10,103,"2");
$pdf->Text(25,103,"HVB ELISA");
$pdf->Text(132,103,$RELISAHVB);
$pdf->Text(155,103,$ELISAHVB);
$pdf->Line(5 ,104 ,205 ,104 );//ligne horizental
$pdf->Text(10,109,"3");
$pdf->Text(25,109,"HVC ELISA");
$pdf->Text(132,109,$RELISAHVC);
$pdf->Text(155,109,$ELISAHVC);
$pdf->Line(5 ,110 ,205 ,110 );//ligne horizental
$pdf->Text(10,115,"4");
$pdf->Text(25,115,"HIV BANDELETTE");
$pdf->Text(132,115,$RBANDELLETEHIV);
$pdf->Text(155,115,$BANDELLETEHIV);
$pdf->Line(5 ,116 ,205 ,116 );//ligne horizental
$pdf->Text(10,121,"5");
$pdf->Text(25,121,"HVB BANDELETTE");
$pdf->Text(132,121,$RBANDELLETEHVB);
$pdf->Text(155,121,$BANDELLETEHVB);
$pdf->Line(5 ,122 ,205 ,122 );//ligne horizental
$pdf->Text(10,127,"6");
$pdf->Text(25,127,"HVC BANDELETTE");
$pdf->Text(132,127,$RBANDELLETEHVC);
$pdf->Text(155,127,$BANDELLETEHVC);
$pdf->Line(5 ,128 ,205 ,128 );//ligne horizental
$pdf->Text(10,133,"7");
$pdf->Text(25,133,"VDRL BANDELETTE");
$pdf->Text(132,133,$RBANDELLETEVDRL);
$pdf->Text(155,133,$BANDELLETEVDRL);
$pdf->Line(5 ,134 ,205 ,134 );//ligne horizental
$pdf->Text(10,139,"8");
$pdf->Text(25,139,"REACTIF VDRL");
$pdf->Text(132,139,$RREACTIFVDRL);
$pdf->Text(155,139,$REACTIFVDRL);
$pdf->Line(5 ,140 ,205 ,140 );//ligne horizental
$pdf->Text(10,145,"9");
$pdf->Text(25,145,"GROUPES SANGUINS");
$pdf->Text(132,145,$RGROUPAGESANGUIN);
$pdf->Text(155,145,$GROUPAGESANGUIN);
$pdf->Line(5 ,146 ,205 ,146 );//ligne horizental
$pdf->Text(10,151,"10");
$pdf->Text(25,151,"POCHE A SANG DOUBLE");
$pdf->Text(132,151,$RPOCHEASANGD);
$pdf->Text(155,151,$POCHEASANGD);
$pdf->Line(5 ,152 ,205 ,152 );//ligne horizental
$pdf->Text(10,157,"11");
$pdf->Text(25,157,"POCHE A SANG TRIPLE");
$pdf->Text(132,157,$RPOCHEASANGT);
$pdf->Text(155,157,$POCHEASANGT);
$pdf->Line(5 ,158 ,205 ,158 );//ligne horizental
$pdf->Text(10,163,"12");
$pdf->Text(25,163,"TUBE SEC");
$pdf->Text(132,163,$RTUBESEC);
$pdf->Text(155,163,$TUBESEC);
$pdf->Line(5 ,164 ,205 ,164 );//ligne horizental
$pdf->Text(10,169,"13");
$pdf->Text(25,169,"TUBE CITRATE");
$pdf->Text(132,169,$RTUBECITRATE);
$pdf->Text(155,169,$TUBECITRATE);
$pdf->Line(5 ,170 ,205 ,170 );//ligne horizental
$pdf->Text(10,175,"14");
$pdf->Text(25,175,"COTON");
$pdf->Text(132,175,$RCOTON);
$pdf->Text(155,175,$COTON);
$pdf->Line(5 ,176 ,205 ,176 );//ligne horizental
$pdf->Text(10,181,"15");
$pdf->Text(25,181,"SPARADRAT");
$pdf->Text(132,181,$RSPARADRAT);
$pdf->Text(155,181,$SPARADRAT);
$pdf->Line(5 ,182 ,205 ,182 );//ligne horizental
$pdf->Text(10,187,"16");
$pdf->Text(25,187,"ALCOOL");
$pdf->Text(132,187,$RALCHOOL);
$pdf->Text(155,187,$ALCHOOL);
$pdf->Line(5 ,188 ,205 ,188 );//ligne horizental
$pdf->Text(10,193,"17");
$pdf->Text(25,193,"AMBOUT JAUNE");
$pdf->Text(132,193,$RAMBOUTJAUNE);
$pdf->Text(155,193,$AMBOUTJAUNE);
$pdf->Line(5 ,194 ,205 ,194 );//ligne horizental
$pdf->Text(10,199,"18");
$pdf->Text(25,199,"AMBOUT BLEU");
$pdf->Text(132,199,$RAMBOUTBLEU);
$pdf->Text(155,199,$AMBOUTBLEU);
$pdf->Line(5 ,200 ,205 ,200 );//ligne horizental
$pdf->Text(10,205,"19");
$pdf->Text(25,205,"H2O");
$pdf->Text(132,205,$RH20);
$pdf->Text(155,205,$H20);
$pdf->Line(5 ,206 ,205 ,206 );//ligne horizental
$pdf->Text(10,211,"20");
$pdf->Text(25,211,"LAME");
$pdf->Text(132,211,$RLAME);
$pdf->Text(155,211,$LAME);
$pdf->Line(5 ,212 ,205 ,212 );//ligne horizental
$pdf->Text(10,217,"21");
$pdf->Text(25,217,"SERINGUE 5CC ");
$pdf->Text(132,217,$RSERING5CC);
$pdf->Text(155,217,$SERING5CC);
$pdf->Line(5 ,218 ,205 ,218 );//ligne horizental
$pdf->Text(10,223,"22");
$pdf->Text(25,223,"GANTS");
$pdf->Text(132,223,$GANTJEUTABLE);
$pdf->Text(155,223,$RGANTJEUTABLE);
$pdf->Line(5 ,224 ,205 ,224 );//ligne horizental
$pdf->Text(10,229,"23");
$pdf->Text(25,229,"COMPRESSE 75F75");
$pdf->Text(132,229,$RCOMPRESSE);
$pdf->Text(155,229,$COMPRESSE);
$pdf->Line(5 ,230 ,205 ,230 );//ligne horizental
$pdf->Text(10,235,"24");
$pdf->Text(25,235,"AUIGUILLE G25");
$pdf->Text(132,235,$RAIGUILLE);
$pdf->Text(155,235,$AIGUILLE);
$pdf->Line(5 ,236 ,205 ,236 );//ligne horizental
$pdf->Text(10,241,"25");
$pdf->Text(25,241,"EPICRANIENE");
$pdf->Text(132,241,$REPICRANIENNE);
$pdf->Text(155,241,$EPICRANIENNE);
$pdf->Line(5 ,242 ,205 ,242 );//ligne horizental
$pdf->Text(10,247,"26");
$pdf->Text(25,247,"****************");
$pdf->Text(130,255,"ain oussera le: ".$dateeuro);
$pdf->Rect(5, 260, 75, 25,"d");
$pdf->Text(25,265,"cachet du service ");
$pdf->Rect(130, 260, 75, 25,"d");
$pdf->Text(145,265,"le medecin chef du service ");
$pdf->AddPage('p','A4');
$pdf->SetFont('Arial','B',10);
$pdf->Image('../IMAGES/logoao.gif',90,25,15,15,0);
$pdf->Text(52,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ");
$pdf->Text(35,10,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->SetFont('Arial','B',15);

$pdf->Text(34,20,"ETABLISSEMENT PUBLIC HOSPITALIER:AIN OUSSERA");
$pdf->SetFont('Arial','B',20);
$pdf->Text(60,47,"BON DE COMMANDE/S ");
$pdf->Text(150,47,"N°".$N);
$pdf->SetFont('Arial','B',10);
$pdf->Text(5,60,"SERVICE:");
$pdf->Text(25,60,"POSTE DE TRANSFUSION SANGUINE");
$pdf->Text(5,68,"NOM DU MEDECIN CHEF:");$pdf->Text(50,68,"DR TIBA");
$pdf->Text(5,75,"LA JOURNEE DU:".$dateeuro);
$pdf->Rect(5, 80, 200, 168 ,"d");
$pdf->Line(5 ,92 ,205 ,92 );//ligne horizental
$pdf->Line(20 ,80 ,20 , 248);//ligne vertical
$pdf->Line(125 ,80 ,125 , 248);
$pdf->Line(150 ,80 ,150 , 248);
$pdf->Line(175 ,80 ,175 , 248);
$pdf->Text(10,87,"N°");
$pdf->Text(50,87,"designation du produits");
$pdf->Text(133,83,"stock");
$pdf->Text(132,87,"restant");
$pdf->Text(132,91,"service");
$pdf->Text(155,85,"quantite");
$pdf->Text(154,89,"demande");
$pdf->Text(182,85,"quantite");
$pdf->Text(184,89,"livres");
//lignes
$pdf->Text(10,97,"1");
$pdf->Text(25,97,"HIV ELISA");
$pdf->Text(132,97,$RELISAHIV);
$pdf->Text(155,97,$ELISAHIV);
$pdf->Line(5 ,98 ,205 ,98 );  //ligne horizental
$pdf->Text(10,103,"2");
$pdf->Text(25,103,"HVB ELISA");
$pdf->Text(132,103,$RELISAHVB);
$pdf->Text(155,103,$ELISAHVB);
$pdf->Line(5 ,104 ,205 ,104 );//ligne horizental
$pdf->Text(10,109,"3");
$pdf->Text(25,109,"HVC ELISA");
$pdf->Text(132,109,$RELISAHVC);
$pdf->Text(155,109,$ELISAHVC);
$pdf->Line(5 ,110 ,205 ,110 );//ligne horizental
$pdf->Text(10,115,"4");
$pdf->Text(25,115,"HIV BANDELETTE");
$pdf->Text(132,115,$RBANDELLETEHIV);
$pdf->Text(155,115,$BANDELLETEHIV);
$pdf->Line(5 ,116 ,205 ,116 );//ligne horizental
$pdf->Text(10,121,"5");
$pdf->Text(25,121,"HVB BANDELETTE");
$pdf->Text(132,121,$RBANDELLETEHVB);
$pdf->Text(155,121,$BANDELLETEHVB);
$pdf->Line(5 ,122 ,205 ,122 );//ligne horizental
$pdf->Text(10,127,"6");
$pdf->Text(25,127,"HVC BANDELETTE");
$pdf->Text(132,127,$RBANDELLETEHVC);
$pdf->Text(155,127,$BANDELLETEHVC);
$pdf->Line(5 ,128 ,205 ,128 );//ligne horizental
$pdf->Text(10,133,"7");
$pdf->Text(25,133,"VDRL BANDELETTE");
$pdf->Text(132,133,$RBANDELLETEVDRL);
$pdf->Text(155,133,$BANDELLETEVDRL);
$pdf->Line(5 ,134 ,205 ,134 );//ligne horizental
$pdf->Text(10,139,"8");
$pdf->Text(25,139,"REACTIF VDRL");
$pdf->Text(132,139,$RREACTIFVDRL);
$pdf->Text(155,139,$REACTIFVDRL);
$pdf->Line(5 ,140 ,205 ,140 );//ligne horizental
$pdf->Text(10,145,"9");
$pdf->Text(25,145,"GROUPES SANGUINS");
$pdf->Text(132,145,$RGROUPAGESANGUIN);
$pdf->Text(155,145,$GROUPAGESANGUIN);
$pdf->Line(5 ,146 ,205 ,146 );//ligne horizental
$pdf->Text(10,151,"10");
$pdf->Text(25,151,"POCHE A SANG DOUBLE");
$pdf->Text(132,151,$RPOCHEASANGD);
$pdf->Text(155,151,$POCHEASANGD);
$pdf->Line(5 ,152 ,205 ,152 );//ligne horizental
$pdf->Text(10,157,"11");
$pdf->Text(25,157,"POCHE A SANG TRIPLE");
$pdf->Text(132,157,$RPOCHEASANGT);
$pdf->Text(155,157,$POCHEASANGT);
$pdf->Line(5 ,158 ,205 ,158 );//ligne horizental
$pdf->Text(10,163,"12");
$pdf->Text(25,163,"TUBE SEC");
$pdf->Text(132,163,$RTUBESEC);
$pdf->Text(155,163,$TUBESEC);
$pdf->Line(5 ,164 ,205 ,164 );//ligne horizental
$pdf->Text(10,169,"13");
$pdf->Text(25,169,"TUBE CITRATE");
$pdf->Text(132,169,$RTUBECITRATE);
$pdf->Text(155,169,$TUBECITRATE);
$pdf->Line(5 ,170 ,205 ,170 );//ligne horizental
$pdf->Text(10,175,"14");
$pdf->Text(25,175,"COTON");
$pdf->Text(132,175,$RCOTON);
$pdf->Text(155,175,$COTON);
$pdf->Line(5 ,176 ,205 ,176 );//ligne horizental
$pdf->Text(10,181,"15");
$pdf->Text(25,181,"SPARADRAT");
$pdf->Text(132,181,$RSPARADRAT);
$pdf->Text(155,181,$SPARADRAT);
$pdf->Line(5 ,182 ,205 ,182 );//ligne horizental
$pdf->Text(10,187,"16");
$pdf->Text(25,187,"ALCOOL");
$pdf->Text(132,187,$RALCHOOL);
$pdf->Text(155,187,$ALCHOOL);
$pdf->Line(5 ,188 ,205 ,188 );//ligne horizental
$pdf->Text(10,193,"17");
$pdf->Text(25,193,"AMBOUT JAUNE");
$pdf->Text(132,193,$RAMBOUTJAUNE);
$pdf->Text(155,193,$AMBOUTJAUNE);
$pdf->Line(5 ,194 ,205 ,194 );//ligne horizental
$pdf->Text(10,199,"18");
$pdf->Text(25,199,"AMBOUT BLEU");
$pdf->Text(132,199,$RAMBOUTBLEU);
$pdf->Text(155,199,$AMBOUTBLEU);
$pdf->Line(5 ,200 ,205 ,200 );//ligne horizental
$pdf->Text(10,205,"19");
$pdf->Text(25,205,"H2O");
$pdf->Text(132,205,$RH20);
$pdf->Text(155,205,$H20);
$pdf->Line(5 ,206 ,205 ,206 );//ligne horizental
$pdf->Text(10,211,"20");
$pdf->Text(25,211,"LAME");
$pdf->Text(132,211,$RLAME);
$pdf->Text(155,211,$LAME);
$pdf->Line(5 ,212 ,205 ,212 );//ligne horizental
$pdf->Text(10,217,"21");
$pdf->Text(25,217,"SERINGUE 5CC ");
$pdf->Text(132,217,$RSERING5CC);
$pdf->Text(155,217,$SERING5CC);
$pdf->Line(5 ,218 ,205 ,218 );//ligne horizental
$pdf->Text(10,223,"22");
$pdf->Text(25,223,"GANTS");
$pdf->Text(132,223,$GANTJEUTABLE);
$pdf->Text(155,223,$RGANTJEUTABLE);
$pdf->Line(5 ,224 ,205 ,224 );//ligne horizental
$pdf->Text(10,229,"23");
$pdf->Text(25,229,"COMPRESSE 75F75");
$pdf->Text(132,229,$RCOMPRESSE);
$pdf->Text(155,229,$COMPRESSE);
$pdf->Line(5 ,230 ,205 ,230 );//ligne horizental
$pdf->Text(10,235,"24");
$pdf->Text(25,235,"AUIGUILLE G25");
$pdf->Text(132,235,$RAIGUILLE);
$pdf->Text(155,235,$AIGUILLE);
$pdf->Line(5 ,236 ,205 ,236 );//ligne horizental
$pdf->Text(10,241,"25");
$pdf->Text(25,241,"EPICRANIENE");
$pdf->Text(132,241,$REPICRANIENNE);
$pdf->Text(155,241,$EPICRANIENNE);
$pdf->Line(5 ,242 ,205 ,242 );//ligne horizental
$pdf->Text(10,247,"26");
$pdf->Text(25,247,"****************");
$pdf->Text(130,255,"ain oussera le: ".$dateeuro);
$pdf->Rect(5, 260, 75, 25,"d");
$pdf->Text(25,265,"cachet du service ");
$pdf->Rect(130, 260, 75, 25,"d");
$pdf->Text(145,265,"le medecin chef du service ");
$pdf->Output();
?>


