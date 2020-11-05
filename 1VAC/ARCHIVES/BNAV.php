<?php
function barre_navigation ($nb_total,$nb_affichage_par_page,$debut,$nb_liens_dans_la_barre)
{
$barre = '';
// on recherche l'URL courante munie de ses paramètre auxquels on ajoute le paramètre'debut' qui jouera le role du premier élément de notre LIMIT
if ($_SERVER['QUERY_STRING'] == "") 
{
$query = $_SERVER['PHP_SELF'].'?debut=';
}
else 
{
$tableau = explode ("debut=", $_SERVER['QUERY_STRING']);
$nb_element = count ($tableau);

   if ($nb_element == 1) 
   {
    $query = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&debut=';
   }
   else 
   {
     if ($tableau[0] == "") 
     {
     $query = $_SERVER['PHP_SELF'].'?debut=';
     }
     else 
     {
     $query = $_SERVER['PHP_SELF'].'?'.$tableau[0].'debut=';
     }
   }
}
// on calcul le numéro de la page active
$page_active    = floor(($debut/$nb_affichage_par_page)+1);

// on calcul le nombre de pages total que va prendre notre affichage
$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);// la fonction ceil arrondie au nbr sup


// on calcul le premier numero de la barre qui va s'afficher, ainsi que le dernier($cpt_deb et $cpt_fin) 
// exemple : 2 3 4 5 6 7 8 9 10 11 << $cpt_deb = 2 et $cpt_fin = 11
if ($nb_liens_dans_la_barre%2==0) 
{
$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
}
else {
$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
}
if ($cpt_deb1 <= 1) {
$cpt_deb = 1;
$cpt_fin = $nb_liens_dans_la_barre;
}
elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) {
$cpt_deb = $cpt_deb1;
$cpt_fin = $cpt_fin1;
}
else {
$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
$cpt_fin = $nb_pages_total;
}
if ($nb_pages_total <= $nb_liens_dans_la_barre) {
$cpt_deb=1;
$cpt_fin=$nb_pages_total;
}
// si le premier numéro qui s'affiche est différent de 1, on affiche << qui sera unlien vers la premiere page

if ($cpt_deb != 1) {
$cible = $query.(0);
$lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;';
}
else {
$lien='';
}
$barre .= $lien;
// on affiche tous les liens de notre barre, tout en vérifiant de ne pas mettre delien pour la page active

for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) {
if ($cpt == $page_active) {
if ($cpt == $nb_pages_total) {
$barre .= $cpt;
}
else {
$barre .= $cpt.'&nbsp;-&nbsp;';
}
}
else {
if ($cpt == $cpt_fin) {
$barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page);
$barre .= "'>".$cpt."</A>";
}
else {
$barre .= "<A HREF='".$query.(($cpt-1)*$nb_affichage_par_page);
$barre .= "'>".$cpt."</A>&nbsp;-&nbsp;";
}
}
}
$fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
if (($nb_total % $nb_affichage_par_page) == 0) {
$fin = $fin - $nb_affichage_par_page;
}
// si $cpt_fin ne vaut pas la dernière page de la barre de navigation, on afficheun >> qui sera un lien vers la dernière page de navigation

if ($cpt_fin != $nb_pages_total) {
$cible = $query.$fin;
$lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>';
}
else {
$lien='';
}
$barre .= $lien;
return $barre;
}
?>