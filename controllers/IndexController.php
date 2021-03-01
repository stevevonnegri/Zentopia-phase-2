<?php

// affichage d'un message de confimation si l'on est redirigé ici après la suppression de compte
if ($_GET['CompteDelete'] == true) {
	$smarty->assign('CompteDelete', 'CompteDelete');
}

// ajoute une variable pour déterminer la partie "active" de la navbar.
$smarty->assign(array(
	'active' => 'accueil'
));


// affichage différent selon si l'utilisateur a le droit à une séance découverte
if (!isset($_SESSION['seance_decouverte']) || $_SESSION['seance_decouverte'] == 0) {

	$smarty->assign('seance_decouverte', 'seance_decouverte');

}

// vérifie si le formulaire d'inscription à la newsletter a été envoyé et contient un email
if (isset($_POST['email']) && $_POST['email'] != '') {

	// vérifie si l'utilisateur est bien connecté, sinon le redirige
	if (!isset($_SESSION['email'])) {

		header('Location:?action=connexion');
		exit();
	

	// vérifie que le mail rentrée est bien celui du compte
	} elseif ($_POST['email'] != $_SESSION['email']) {

		$smarty->assign('alert_user', 'L\'adresse mail renseignée n\'est pas identique à celle du compte.');
	

	// vérifie que l'utilisateur n'est pas déjà inscrit à la newsletter
	} elseif ($_SESSION['newsletter'] == 1) {

		$smarty->assign('alert_user', 'Vous êtes déjà inscrit à notre newsletter.');
	
	// inscrit l'utilisateur à la newsletter	
	} else {

		$user_newsletter = new Utilisateur($dbh);

		$id = $_SESSION['id_utilisateur'];
		$newsletter = ['newsletter' => 1];

		$user_newsletter->Update($newsletter, $id);

		$smarty->assign('alert_user', 'Vous êtes désormais inscrit à notre newsletter.');
	}
}


$smarty->display('templates/index.tpl');
?>