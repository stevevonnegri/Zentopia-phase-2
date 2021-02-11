<?php
//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'la_team'
));

$smarty->display('templates/la_team.tpl');
?>