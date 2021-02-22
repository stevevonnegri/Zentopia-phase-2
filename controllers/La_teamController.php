<?php
$image = new Image($dbh);

//cherche les images du sliders
$imagesAll = $image->getList();

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'la_team',
	'imagesAll' => $imagesAll,
));


// récupère les avis de la BDD
$avis = new Avis($dbh);
$avis_list = $avis->getAvisApprouves();

if (!empty($avis_list)) {

	// calcule l'âge de l'utilisateur en fonction de sa date de naissance
	$id_tableau = 0;

	foreach ($avis_list as $key => $value) {
	
		$jour_actuel = new DateTime();
		$jour_naissance = new DateTime($value['date_de_naissance']);
		$interval = $jour_actuel->diff($jour_naissance);
		$avis_list[$id_tableau]['age'] = $interval->format('%y');

		$id_tableau +=1;

	}

	$smarty->assign('avis_list', $avis_list);
}


// SECTION AJOUTER UN AVIS CLIENT
// si l'utilisateur est connecté
if (isset($_SESSION['id_utilisateur'])) {

	$avis_utilisateur = $avis->getitem($_SESSION['id_utilisateur'], 'id_utilisateur');

	// 
	if ($avis_utilisateur) {

		$smarty->assign('avis_present', 'avis_present');
		
	} else {

		$smarty->assign('avis_manquant', 'avis_manquant');
	}

	
// si l'utilisateur n'est pas membre ou n'est pas connecté
} else {

	$smarty->assign('est_connecte', 'est_connecte');
}


// vérifie si le formulaire d'ajout avis a été envoyé
if (isset($_POST['avis-contenu']) && isset($_POST['avis-note'])) {

		
	if ($_POST['avis-contenu'] > 250) {

		echo "too long";

		$smarty->assign('form_invalide', 'L\'avis déposé est supérieur aux 250 caractères maximum.');

	} else {

		$avis_contenu = htmlspecialchars($_POST['avis-contenu']);
		$avis_note = $_POST['avis-note'];
	}

}


$smarty->display('templates/la_team.tpl');
?>