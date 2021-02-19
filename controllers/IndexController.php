<?php
//affichage d'un message de confimation si l'on est rediriger ici apres la suppresion de compte
if ($_GET['CompteDelete'] == true) {
	$smarty->assign('CompteDelete', '<p class="center alert-warning">Votre compte a bien été supprimé !<p>');
}

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'accueil'
));

$smarty->display('templates/index.tpl');
?>