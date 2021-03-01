<?php

// ajoute une variable pour déterminer la partie "active" de la navbar.
$smarty->assign('active', 'enseignement');

// SECTION LISTE DES ENSEIGNEMENTS
// récupère la liste des types de yoga proposés pour l'afficher dynamiquement
$cours = new Type_de_cours($dbh);
$yogaliste = $cours->getListYoga();
$meditationliste = $cours->getListMeditation();

$smarty->assign('yogaliste', $yogaliste);
$smarty->assign('meditationliste', $meditationliste);




$smarty->display('templates/enseignement.tpl');
?>