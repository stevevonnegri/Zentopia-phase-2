<?php
$user = new Utilisateur($dbh);

//traitement des donnée de l'inscription si clic sur le bouton NOUS REJOINDRE
if (isset($_POST['NOUS_REJOINDRE'])) {

	$user->setEmail($_POST['email']);
	$user->setMot_de_passe($_POST['mot_de_passe']);

	$user->setGenre($_POST['genre']);
	$user->setPrenom_utilisateur($_POST['prenom']);
	$user->setNom_utilisateur($_POST['nom']);
	$user->setDate_de_naissance($_POST['date_de_naissance']);
	$user->setAdresse_rue($_POST['adresse_rue']);
	$user->setAdresse_code_postal($_POST['adresse_code_postal']);
	$user->setAdresse_ville($_POST['adresse_ville']);
	$user->setTelephone($_POST['telephone']);
	$user->setNewsletter($_POST['newsletter']);
	
	if ($user->getNewsletter() == true) {
		$user->setCours_decouverte(true);
	}

	$user->Add($user);
}

$smarty->display('templates/inscription.tpl');
?>