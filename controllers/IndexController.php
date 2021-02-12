<?php


//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'accueil'
));

$smarty->display('templates/index.tpl');
?>