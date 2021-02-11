<?php

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'connexion');

$smarty->display('templates/connexion.tpl');
?>