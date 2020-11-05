<?php
$NOM=$_POST["NOM"];
$PRENOM=$_POST["PRENOM"];
$AVN=$_POST["AVN"];
$WIL=$_POST["WIL"];
$DAI=$_POST["DAI"];
$COM=$_POST["COM"];
$USER=$_POST["USER"];
$ncc=$_POST["ncc"];
$datecc=$_POST["datecc"];
$bovins=$_POST["bovins"];
$ovins=$_POST["ovins"];
$caprins=$_POST["caprins"];
$nms=$_POST["nms"];
$datems=$_POST["datems"];
$ANNEE=$_POST["ANNEE"];

require('../1VAC/NBRTOSTRING.php');
require('../TCPDF/vaccinvet.php');
$pdf = new vet ( 'P', 'mm', 'A4' );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDisplayMode('fullpage','single');
//1
$pdf->AddPage();
$pdf->SetFont('times', '', 16);
$pdf->Text(85,$pdf->GetY()+60,"ANNEXE II ");
$pdf->SetFont('times', 'U', 16);
$pdf->Text(65,$pdf->GetY()+8,"** CAHIER DES CHARGES **  ");
$pdf->SetFont('times', '', 16);
$pdf->SetXY(25,100);
$pdf->MultiCell(160,30,"CAHIER DES CHARGES N°$ncc DU $datecc \n RELATIF AU MANDAT SANITAIRE \n PORTANT CAMPAGNE DE VACCINATION \n ANTI-APHTEUSE, ANTI-RABIQUE BOVINE \n ET ANTI-CLAVELEUSE OVINE  ",1,'C',0); 
//2
$pdf->AddPage();
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 1er ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le cahier des charges a pour objet de définir les droits et obligations des vétérinaires praticiens");
$pdf->Text(20,$pdf->GetY()+5,"exerçant à  titre  privé  dans le cadre de la campagne de vaccination  anti-aphteuse ,anti-rabique");
$pdf->Text(20,$pdf->GetY()+5,"pour les bovins et  anti-claveleuse pour les ovins pour l'année $ANNEE");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 2 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le présent cahier des charges est établi entre Mr :  ".$NOM." ".$PRENOM);
$pdf->Text(20,$pdf->GetY()+5,"n° d'enregistrement à l'autorité vétérinaire : ".$AVN." vétérinaire praticien exerçant à ");
$pdf->Text(20,$pdf->GetY()+5,$pdf->nbrtocom3('vaccinvet','comm',$COM)."  et Mr : ".$USER." inspecteur vétérinaire de la wilaya de Djelfa");
$pdf->Text(20,$pdf->GetY()+5,"");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 3 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"L'inspecteur  vétérinaire  de  wilaya s'engage  à  mettre à la disposition  du  vétérinaire");
$pdf->Text(20,$pdf->GetY()+5,"praticien à titre privé dûment mandaté, la quantité de vaccins nécessaire à la réalisation");
$pdf->Text(20,$pdf->GetY()+5,"de sa mission selon  le  programme  d'intervention établi  par l'inspecteur vétérinaire de");
$pdf->Text(20,$pdf->GetY()+5,"wilaya.");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 4");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire praticien exerçant a titre privé désigne à l'article 2 ci-dessus s'engage sur");
$pdf->Text(20,$pdf->GetY()+5,"la base   du   programme   d'intervention   arrêté ,  à   vacciner  dans  la  ou  les   zones");
$pdf->Text(20,$pdf->GetY()+5,"suivante(s): ".$pdf->nbrtocom3('vaccinvet','comm',$COM)." dont l'effectif est de ".$bovins." bovins et de ".$ovins." ovins. ");



$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 5 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire praticien exerçant a titre privé désigne à l'article 2 ci-dessus s'engage sur ");
$pdf->Text(20,$pdf->GetY()+5,"-	Respecter les conditions  de  conservation  des  vaccins  mis  à sa disposition");
$pdf->Text(20,$pdf->GetY()+5,"-	Remettre sous quinzaine, à l'inspecteur vétérinaire de la subdivision, un bilan");
$pdf->Text(20,$pdf->GetY()+5,"   comportant la liste des éleveurs qui ont bénéficie de la vaccination ainsi que");
$pdf->Text(20,$pdf->GetY()+5,"   l'effectif vacciné.");
$pdf->Text(20,$pdf->GetY()+5,"-	Etablir  un  certificat de vaccination en triple  exemplaire portant le nom de l'éleveur,");
$pdf->Text(20,$pdf->GetY()+5,"   la date de vaccination ainsi que le nombre d'animaux vaccinés. l'original du certificat");
$pdf->Text(20,$pdf->GetY()+5,"   est  remis  à  l'inspecteur  vétérinaire  de  wilaya  qui procédera  à sa contre signature");
$pdf->Text(20,$pdf->GetY()+5,"   une  copie  de  ce certificat doit être remise au propriétaire du cheptel ayant bénéficie");
$pdf->Text(20,$pdf->GetY()+5,"   de la vaccination. ");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 6 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le  praticien  dûment  mandaté doit établir  des  bilans mensuels et un bilan final et");
$pdf->Text(20,$pdf->GetY()+5,"procédera à la restitution de la totalité des flacons de vaccins vides entamés ou non");
$pdf->Text(20,$pdf->GetY()+5,"utilisés.");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 7 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le payement du vétérinaire dûment mandaté, s'effectue sur le fonds de la promotion zoo");
$pdf->Text(20,$pdf->GetY()+5,"sanitaire  et  la  protection  phytosanitaire ,  sur  présentation  d'un dossier comportant;le");
$pdf->Text(20,$pdf->GetY()+5,"bilan  mensuel ,  et / ou  le  bilan  final  et  les  originaux  des  certificats  de vaccination");
$pdf->Text(20,$pdf->GetY()+5,"contresignés  par  l'inspecteur  vétérinaire  de  wilaya  ainsi  qu'une  copie  du cahier des");
$pdf->Text(20,$pdf->GetY()+5,"charges dûment signé et une copie du mandat sanitaire  ");
// $pdf->AddPage();
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 8 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Toute perturbation dans l'exécution du programme de vaccination doit être signalée ");
$pdf->Text(20,$pdf->GetY()+5,"immédiatement à l'inspection vétérinaire de la wilaya ");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 9 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"En cas de non respect des dispositions du présent cahier des charges l'annulation de ce  ");
$pdf->Text(20,$pdf->GetY()+5,"dernier est prononcée. ");

$pdf->SetFont('times', '', 14);
$pdf->Text(100,$pdf->GetY()+5,"Fait à Djelfa : le ".date('d/m/Y'));
$pdf->Text(5,$pdf->GetY()+10,"LE MEDECIN VETERINAIRE");$pdf->Text(100,$pdf->GetY(),"L'INSPECTEUR VETERINAIRE DE WILAYA");
$pdf->Text(50,$pdf->GetY()+15,"LE DIRECTEUR DES SERVICES AGRICOLES");
//3
$pdf->AddPage();
$pdf->SetFont('times', '', 14);
$pdf->Text(90,$pdf->GetY()+60,"ANNEXE I ");
$pdf->SetXY(30,100);
$pdf->MultiCell(160,30,"LE MANDAT SANITAIRE ",1,'C',0);
$pdf->AddPage();
$pdf->Text(25,$pdf->GetY()+5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->SetFont('times', '', 12);
$pdf->Text(5,$pdf->GetY()+10,"MINISTERE DE L’AGRICULTURE ");
$pdf->Text(5,$pdf->GetY()+5,"ET DU DEVELOPPEMENT RURAL");
$pdf->SetFont('times', '', 9);
$pdf->Text(5,$pdf->GetY()+5,"DIRECTION DES SERVICES AGRICOLES");
$pdf->Text(5,$pdf->GetY()+5,"DE LA WILAYA DE DJELFA");
$pdf->SetFont('times', '', 11);
$pdf->SetXY(25,$pdf->GetY()+5);
$pdf->MultiCell(160,25,"DECISION N°$nms DU $datems \n PORTANT MANDAT SANITAIRE POUR LA CAMPAGNE DE VACCINATION \n ANTI-CLAVELEUSE DES OVINS, ANTI-APHTEUSE \n   ET ANTI-RABIQUE DES BOVINS \n POUR L’ANNEE $ANNEE ",0,'C',0);

$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"- Vu la loi 88 -08 / du 26 janvier 1988 , relative aux activités de médecine vétérinaire et ");
$pdf->Text(20,$pdf->GetY()+5,"à la Protection de la santé animale ;");

$pdf->Text(20,$pdf->GetY()+5,"- Vu le décret exécutif n° 03-173 du 12 safar 1424 correspondant au 14 avril 2003 fixant");
$pdf->Text(20,$pdf->GetY()+5,"Les modalités de mobilisation des vétérinaire en cas d’épizootie et lors d’opération de ");
$pdf->Text(20,$pdf->GetY()+5,"Prophylaxie collective des maladies des animaux ordonnées par l’autorité vétérinaire ");
$pdf->Text(20,$pdf->GetY()+5,"nationale, Notamment ses articles 2 et 3 ;");

$pdf->Text(20,$pdf->GetY()+5,"-  Vu  l’arrêté ministériel du 14/07/2005 modifiant et complétant l’arrêté ministériel du ");
$pdf->Text(20,$pdf->GetY()+5,"30/11/2003 fixant les modalités d’attribution du mandat sanitaire aux vétérinaires ");
$pdf->Text(20,$pdf->GetY()+5,"praticiens exerçant à titre privé  pour la réalisation  des programmes de prévention et ");
$pdf->Text(20,$pdf->GetY()+5,"d’éradication des maladies animales ordonnées par l’autorité vétérinaire nationale;");

$pdf->Text(20,$pdf->GetY()+5,"- Vu l’instruction n°: 225 du 11/04/2012 (MADR) relative à la vaccination des ovins contre");
$pdf->Text(20,$pdf->GetY()+5,"la clavelée, et la vaccination des bovins contre la fièvre aphteuse et la rage ; ");

$pdf->Text(20,$pdf->GetY()+5,"- Vu la demande du Dr ".$NOM." ".$PRENOM." praticien privé exerçant à");
$pdf->Text(20,$pdf->GetY()+5,$pdf->nbrtocom3('vaccinvet','comm',$COM)."."."Sur Proposition De L’inspecteur Vétérinaire De Wilaya");

$pdf->Text(55,$pdf->GetY()+10,"LE DIRECTEUR DES SERVICES AGRICOLES");
$pdf->Text(90,$pdf->GetY()+5,"DECIDE");


$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+8,"Article 1er ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire prévu par le décret exécutif 03-173 du 14 avril sus visé est octroyé à ");
$pdf->Text(20,$pdf->GetY()+5,"Mr ".$NOM." ".$PRENOM."médecin vétérinaire praticien exerçant à titre privé ");
$pdf->Text(20,$pdf->GetY()+5,"à ".$pdf->nbrtocom3('vaccinvet','comm',$COM)." N°AVN ".$AVN);

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 2 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire cité à l’article 1er ci-dessus , s’engage à  respecter les dispositions édictées ");
$pdf->Text(20,$pdf->GetY()+5,"par le  cahier des charges  N ".$ncc." du ".$datecc.".");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 3 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire est octroyé aux vétérinaires praticien privé pour  une  durée d’une");
$pdf->Text(20,$pdf->GetY()+5,"année renouvelable. ($ANNEE)");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 4 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire peut être retiré :");
$pdf->Text(20,$pdf->GetY()+5,"- A la demande de l’intéressé.");
$pdf->Text(20,$pdf->GetY()+5,"- En cas de non respect des dispositions du cahier des charges cité à l’article 2 ci-dessus.");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 5 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"L’inspecteur vétérinaire de wilaya est chargé de l’exécution de la présente décision");


$pdf->Text(120,$pdf->GetY()+10,"Fait à Djelfa: le ".date('d/m/Y'));
$pdf->Text(55,$pdf->GetY()+15,"LE DIRECTEUR DES SERVICES AGRICOLES");



//anti brucellique 
$pdf->AddPage();
$pdf->SetFont('times', '', 16);
$pdf->Text(85,$pdf->GetY()+60,"ANNEXE II ");
$pdf->SetFont('times', 'U', 16);
$pdf->Text(65,$pdf->GetY()+8,"** CAHIER DES CHARGES **  ");
$pdf->SetFont('times', '', 16);
$pdf->SetXY(25,100);
$pdf->MultiCell(160,30,"CAHIER DES CHARGES N°$ncc DU $datecc \n RELATIF AU MANDAT SANITAIRE \n PORTANT CAMPAGNE DE VACCINATION \n ANTI-BRUCELLIQUE DES PETITS RUMINANTS ",1,'C',0); 
//2
$pdf->AddPage();
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 1er ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le cahier des charges a pour objet de définir les droits et obligations des vétérinaires praticiens");
$pdf->Text(20,$pdf->GetY()+5,"exerçant à  titre  privé  dans le cadre de la campagne de vaccination  anti brucellique  ");
$pdf->Text(20,$pdf->GetY()+5,"pour les ovins et caprins pour l'année $ANNEE");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 2 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le présent cahier des charges est établi entre Mr :  ".$NOM." ".$PRENOM);
$pdf->Text(20,$pdf->GetY()+5,"n° d'enregistrement à l'autorité vétérinaire : ".$AVN." vétérinaire praticien exerçant à ");
$pdf->Text(20,$pdf->GetY()+5,$pdf->nbrtocom3('vaccinvet','comm',$COM)."  et Mr : ".$USER." inspecteur vétérinaire de la wilaya de Djelfa");
// $pdf->Text(20,$pdf->GetY()+5,"");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 3 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"L'inspecteur  vétérinaire  de  wilaya s'engage  à  mettre à la disposition  du  vétérinaire");
$pdf->Text(20,$pdf->GetY()+5,"praticien à titre privé dûment mandaté, la quantité de vaccins nécessaire à la réalisation");
$pdf->Text(20,$pdf->GetY()+5,"de sa mission selon  le  programme  d'intervention établi  par l'inspecteur vétérinaire de");
$pdf->Text(20,$pdf->GetY()+5,"wilaya.");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 4");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire praticien exerçant a titre privé désigne à l'article 2 ci-dessus s'engage sur");
$pdf->Text(20,$pdf->GetY()+5,"la base   du   programme   d'intervention   arrêté ,  à   vacciner  dans  la  ou  les   zones");
$pdf->Text(20,$pdf->GetY()+5,"suivante(s): ".$pdf->nbrtocom3('vaccinvet','comm',$COM)." dont l'effectif est de ".$ovins." ovins et de ".$caprins." caprins. ");



$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 5 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire praticien exerçant a titre privé désigne à l'article 2 ci-dessus s'engage sur ");
$pdf->Text(20,$pdf->GetY()+5,"-	Respecter les conditions  de  conservation  des  vaccins  mis  à sa disposition");
$pdf->Text(20,$pdf->GetY()+5,"-	Remettre sous quinzaine, à l'inspecteur vétérinaire de la subdivision, un bilan");
$pdf->Text(20,$pdf->GetY()+5,"   comportant la liste des éleveurs qui ont bénéficie de la vaccination ainsi que");
$pdf->Text(20,$pdf->GetY()+5,"   l'effectif vacciné.");
$pdf->Text(20,$pdf->GetY()+5,"-	Etablir  un  certificat de vaccination en triple  exemplaire portant le nom de l'éleveur,");
$pdf->Text(20,$pdf->GetY()+5,"   la date de vaccination ainsi que le nombre d'animaux vaccinés. l'original du certificat");
$pdf->Text(20,$pdf->GetY()+5,"   est  remis  à  l'inspecteur  vétérinaire  de  wilaya  qui procédera  à sa contre signature");
$pdf->Text(20,$pdf->GetY()+5,"   une  copie  de  ce certificat doit être remise au propriétaire du cheptel ayant bénéficie");
$pdf->Text(20,$pdf->GetY()+5,"   de la vaccination. ");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 6 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le  praticien  dûment  mandaté doit établir  des  bilans mensuels et un bilan final et");
$pdf->Text(20,$pdf->GetY()+5,"procédera à la restitution de la totalité des flacons de vaccins vides entamés ou non");
$pdf->Text(20,$pdf->GetY()+5,"utilisés.");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 7 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le payement du vétérinaire dûment mandaté, s'effectue sur le fonds de la promotion zoo");
$pdf->Text(20,$pdf->GetY()+5,"sanitaire  et  la  protection  phytosanitaire ,  sur  présentation  d'un dossier comportant;le");
$pdf->Text(20,$pdf->GetY()+5,"bilan  mensuel ,  et / ou  le  bilan  final  et  les  originaux  des  certificats  de vaccination");
$pdf->Text(20,$pdf->GetY()+5,"contresignés  par  l'inspecteur  vétérinaire  de  wilaya  ainsi  qu'une  copie  du cahier des");
$pdf->Text(20,$pdf->GetY()+5,"charges dûment signé et une copie du mandat sanitaire  ");
// $pdf->AddPage();
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 8 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Toute perturbation dans l'exécution du programme de vaccination doit être signalée ");
$pdf->Text(20,$pdf->GetY()+5,"immédiatement à l'inspection vétérinaire de la wilaya ");

$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 9 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"En cas de non respect des dispositions du présent cahier des charges l'annulation de ce  ");
$pdf->Text(20,$pdf->GetY()+5,"dernier est prononcée. ");

$pdf->SetFont('times', '', 14);
$pdf->Text(100,$pdf->GetY()+5,"Fait à Djelfa : le ".date('d/m/Y'));
$pdf->Text(5,$pdf->GetY()+10,"LE MEDECIN VETERINAIRE");$pdf->Text(100,$pdf->GetY(),"L'INSPECTEUR VETERINAIRE DE WILAYA");
$pdf->Text(50,$pdf->GetY()+15,"LE DIRECTEUR DES SERVICES AGRICOLES");
//3
$pdf->AddPage();
$pdf->SetFont('times', '', 14);
$pdf->Text(90,$pdf->GetY()+60,"ANNEXE I ");
$pdf->SetXY(30,100);
$pdf->MultiCell(160,30,"LE MANDAT SANITAIRE ",1,'C',0);
$pdf->AddPage();
$pdf->Text(25,$pdf->GetY()+5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->SetFont('times', '', 12);
$pdf->Text(5,$pdf->GetY()+10,"MINISTERE DE L’AGRICULTURE ");
$pdf->Text(5,$pdf->GetY()+5,"ET DU DEVELOPPEMENT RURAL");
$pdf->SetFont('times', '', 9);
$pdf->Text(5,$pdf->GetY()+5,"DIRECTION DES SERVICES AGRICOLES");
$pdf->Text(5,$pdf->GetY()+5,"DE LA WILAYA DE DJELFA");
$pdf->SetFont('times', '', 11);
$pdf->SetXY(25,$pdf->GetY()+5);
$pdf->MultiCell(160,20,"DECISION N°$nms DU $datems \n PORTANT MANDAT SANITAIRE POUR LA CAMPAGNE DE VACCINATION \n ANTI-BRUCELLIQUE DES OVINS ET CAPRINS \n POUR L’ANNEE $ANNEE ",0,'C',0);
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"- Vu la loi 88 -08 / du 26 janvier 1988 , relative aux activités de médecine vétérinaire et ");
$pdf->Text(20,$pdf->GetY()+5,"à la Protection de la santé animale ;");
$pdf->Text(20,$pdf->GetY()+5,"- Vu le décret exécutif n° 03-173 du 12 safar 1424 correspondant au 14 avril 2003 fixant");
$pdf->Text(20,$pdf->GetY()+5,"Les modalités de mobilisation des vétérinaire en cas d’épizootie et lors d’opération de ");
$pdf->Text(20,$pdf->GetY()+5,"Prophylaxie collective des maladies des animaux ordonnées par l’autorité vétérinaire ");
$pdf->Text(20,$pdf->GetY()+5,"nationale, Notamment ses articles 2 et 3 ;");
$pdf->Text(20,$pdf->GetY()+5,"-  Vu  l’arrêté ministériel du 14/07/2005 modifiant et complétant l’arrêté ministériel du ");
$pdf->Text(20,$pdf->GetY()+5,"30/11/2003 fixant les modalités d’attribution du mandat sanitaire aux vétérinaires ");
$pdf->Text(20,$pdf->GetY()+5,"praticiens exerçant à titre privé  pour la réalisation  des programmes de prévention et ");
$pdf->Text(20,$pdf->GetY()+5,"d’éradication des maladies animales ordonnées par l’autorité vétérinaire nationale;");
$pdf->Text(20,$pdf->GetY()+5,"-Vu l'instruction n°: 226 du 11/04/2012 (MADR) relative à la vaccination ");
$pdf->Text(20,$pdf->GetY()+5,"des petits ruminants contre la brucellose;");
$pdf->Text(20,$pdf->GetY()+5,"- Vu la demande du Dr ".$NOM." ".$PRENOM." praticien privé exerçant à");
$pdf->Text(20,$pdf->GetY()+5,$pdf->nbrtocom3('vaccinvet','comm',$COM)."."."Sur Proposition De L’inspecteur Vétérinaire De Wilaya");
$pdf->Text(55,$pdf->GetY()+10,"LE DIRECTEUR DES SERVICES AGRICOLES");
$pdf->Text(90,$pdf->GetY()+5,"DECIDE");
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+8,"Article 1er ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire prévu par le décret exécutif 03-173 du 14 avril sus visé est octroyé à ");
$pdf->Text(20,$pdf->GetY()+5,"Mr ".$NOM." ".$PRENOM."médecin vétérinaire praticien exerçant à titre privé ");
$pdf->Text(20,$pdf->GetY()+5,"à ".$pdf->nbrtocom3('vaccinvet','comm',$COM)." N°AVN ".$AVN);
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 2 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le vétérinaire cité à l’article 1er ci-dessus , s’engage à  respecter les dispositions édictées ");
$pdf->Text(20,$pdf->GetY()+5,"par le  cahier des charges  N ".$ncc." du ".$datecc.".");
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 3 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire est octroyé aux vétérinaires praticien privé pour  une  durée d’une");
$pdf->Text(20,$pdf->GetY()+5,"année renouvelable. ($ANNEE)");
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 4 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"Le mandat sanitaire peut être retiré :");
$pdf->Text(20,$pdf->GetY()+5,"- A la demande de l’intéressé.");
$pdf->Text(20,$pdf->GetY()+5,"- En cas de non respect des dispositions du cahier des charges cité à l’article 2 ci-dessus.");
$pdf->SetFont('times', 'U', 14);
$pdf->Text(20,$pdf->GetY()+5,"Article 5 ");
$pdf->SetFont('times', '', 12);
$pdf->Text(20,$pdf->GetY()+5,"L’inspecteur vétérinaire de wilaya est chargé de l’exécution de la présente décision");
$pdf->Text(120,$pdf->GetY()+10,"Fait à Djelfa: le ".date('d/m/Y'));
$pdf->Text(55,$pdf->GetY()+15,"LE DIRECTEUR DES SERVICES AGRICOLES");

$pdf->Output();

?>