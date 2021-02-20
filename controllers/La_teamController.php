<?php
$image = new Image($dbh);

//cherche les images du sliders
$imagesAll = $image->getList();

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'la_team',
	'imagesAll' => $imagesAll,
));

$smarty->display('templates/la_team.tpl');
?>