<?php

// ajoute une variable pour déterminer la partie "active" de la navbar.
$smarty->assign('active', 'la_team');


// SECTION PRESENTATION DE LA TEAM
// récupère la liste des profs et les envoie à SMARTY
$prof = new Professeur($dbh);
$listeprof = $prof->getListeProf();
$smarty->assign('listeprof', $listeprof);


// SECTION SLIDER D'IMAGES
// récupère les images et les envoie à SMARTY
$image = new Image($dbh);
$imagesAll = $image->getList();
$smarty->assign('imagesAll', $imagesAll);


// SECTION AFFICHAGE AVIS CLIENT
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

if (isset($_GET['message_error'])) {

	$smarty->assign('message_error', 'L\'avis déposé est supérieur aux 250 caractères maximum.');
}

// vérifie si le formulaire d'ajout avis a été envoyé
if (isset($_POST['avis-contenu']) && isset($_POST['avis-note'])) {

	// vérifie si l'avis ne dépasse pas les 250 caractères autorisés
	if (strlen($_POST['avis-contenu']) > 250) {

		header('Location: ?action=la_team&message_error=true#ajout-avis');


	// sécurise la saisie de l'utilisateur pour l'envoyer à la BDD ensuite
	} else {

		// sécurise la saisie
		$avis_contenu = htmlspecialchars($_POST['avis-contenu']);
		$avis_note = $_POST['avis-note'];
		$id = $_SESSION['id_utilisateur'];

		// envoie les données à la BDD
		$data = [
			'contenu_avis' => $avis_contenu,
			'niveau_avis' => $avis_note,
			'id_utilisateur' => $id
		];

		$avis->Add($data);

		header('Location: ?action=la_team#ajout-avis');

	}
}


$smarty->display('templates/la_team.tpl');
?>