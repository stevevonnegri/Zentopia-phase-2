<?php

// vérifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire
if (!isset($_SESSION['id_utilisateur'])) {
	header('Location: ?action=connexion');
}

// SECTION DECONNEXION
// si clic sur le bouton déconnexion, détruit la session et redirige vers l'accueil
if ($_GET['deconnexion'] == true) {
	session_destroy();
	setcookie('connexion', '', time() - 60*60*24*7);
	header('Location: index.php');
}

// SECTION SUPPRIMER LE COMPTE
if (isset($_POST['CompteDelete'])) {
	$deluser = new Utilisateur($dbh);
	$deluser->Delete($_SESSION['id_utilisateur']);
	session_destroy();
	header('Location:?action=index&CompteDelete=true');
}

// affichage du message de succès si mdp bien modifié
if (isset($_GET['message_succes_mdp'])) {
	$smarty->assign('message_succes_mdp', '<p class="error">Votre mot de passe à bien été modifié !</p>');
}


// SECTION CHANGEMENT DE MDP
if (isset($_POST['mettre_a_jour'])) {

	// vérifie si le mot de passe actuel est valide
	$user = new Utilisateur($dbh);
	$user_verif_mot_de_passe = $user->getUserByMail($_SESSION['email']);


	// crée une variable erreur initialisée à false pour plus tard
	$erreur = false;

	if(password_verify($_POST['mot_de_passe_actuel'], $user_verif_mot_de_passe->getMot_de_passe())) {

		// vérifie que les mots de passe donnés sont conformes
		$verif = VerifMot_De_PasseConforme($_POST['new_mot_de_passe']);

		if ($verif !== true ) {

			$error_mot_de_passe_message = $verif;
			$erreur = true;

		}
		
		// vérifie si les mots de passe sont identiques, si oui, le hash
		$verif = VerifMot_De_PasseIndetique($_POST['new_mot_de_passe'], $_POST['new_mot_de_passe_verif']);

		if ($verif === false) {
			$error_verif_mot_de_passe_message = '<p class="error">Vos mots de passe ne correspondent pas.</p>';
			$erreur = true;

		}

	} else {

		$error_mauvais_mot_de_passe = '<p class="error">Mauvais mot de passe.</p>';
		$erreur = true;
	}

	if ($erreur === false) {

		// set le nouveau mot de passe dans un tableau
		$donnée = [
			'mot_de_passe' => password_hash($_POST['new_mot_de_passe'], PASSWORD_DEFAULT)
		];

		// envoie le nouveau mot de passe dans la BDD en récupérant l'id dans les infos de session
		$user->Update($donnée, $_SESSION['id_utilisateur']);

		header('Location: ?action=espace_personnel');

		
		} else {

			//en cas d'erreur les envoie a smarty
			$smarty->assign(array(
				'error_mot_de_passe_message' => $error_mot_de_passe_message,
				'error_verif_mot_de_passe_message' => $error_verif_mot_de_passe_message,
				'error_mauvais_mot_de_passe' => $error_mauvais_mot_de_passe
			));

		}

	}

// affichage du formulaire de modification à la place des infos de session
if ($_GET['form'] == 'active') {

	// envoi d'une variable à SMARTY pour afficher le formulaire
	$smarty->assign('form', 'active');

	if (isset($_POST['modifier_coordonnees'])) {
		$userModif = new Utilisateur($dbh);
		$erreur = false;

		// récuperation des données du formulaire
		$userModif->setEmail($_POST['email']);
		$userModif->setGenre($_POST['genre']);
		$userModif->setPrenom_utilisateur($_POST['prenom']);
		$userModif->setNom_utilisateur($_POST['nom']);
		$userModif->setDate_de_naissance($_POST['date_de_naissance']);
		$userModif->setAdresse_rue($_POST['adresse_rue']);
		$userModif->setAdresse_code_postal($_POST['adresse_code_postal']);
		$userModif->setAdresse_ville($_POST['adresse_ville']);
		$userModif->setTelephone($_POST['telephone']);

		if (isset($_POST['newsletter'])) {

			$userModif->setNewsletter($_POST['newsletter']);

		}

		//ETAPE VERIFIACTION
		//verification de l'email

		$error_email_message = $userModif->EmailBonFormat('MODIF');

		// vérifie que le nom et le prénom n'ont pas de caractères spéciaux
		if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $userModif->getNom_utilisateur())) {

			$error_nom_utilisateur_message = '<p class="error">Le nom renseigné comporte des caractères non autorisés.</p>';
			$erreur = true;

		}

		// ensuite le prénom
		if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $userModif->getPrenom_utilisateur())) {

			$error_prenom_utilisateur_message = '<p class="error">Le prénom renseigné comporte des caractères non autorisés.</p>';
			$erreur = true;

		}

		// vérifie que l'utilisateur a plus de 18 ans
		if ($userModif->VerifPlusDe18ans()) {
					
			$error_date_naissance_message = '<p class="error">Vous devez être majeur pour s\'inscrire sur notre site.</p>';
			
		} else {

			$error_date_naissance_message = 'ok';
		}

		// vérifie que le code postal fait bien 5 chiffres.
		if (!preg_match("#^[0-9]{5}$#", $userModif->getAdresse_code_postal())) {

				$error_Adresse_code_postal_message = '<p class="error">Le code postal doit etre composé de 5 chiffres.</p>';
				$erreur = true;

		}

		// vérifie qu'il n'y aie pas de chiffre dans le nom de la ville
		if (preg_match("/[0-9]+/", $userModif->getAdresse_ville())) {

		 	$error_Adresse_ville_message = '<p class="error">Le nom de la ville ne doit pas contenir de chiffres.</p>';
				$erreur = true;
		 }

		// vérification du numéro de tel
		if (!preg_match("#^(0|\+33|0033)[1-9][0-9]{8}$#", $userModif->getTelephone())) {

		 	$error_telephone_message = '<p class="error">Le numéro de téléphone renseigné n\'est pas valide.</p>';
			$erreur = true;
		 }

		// vérifie si newsletter et pas de séance réservée : set séance découverte à 1 sinon la set à 0
		 
		if ($userModif->getNewsletter() == 'inscription' ) {
			$userModif->setNewsletter(1);
			if ($userModif->countReserverByEmail() == 0) {

				$userModif->setSeance_decouverte(1);

			} else {
				$userModif->setSeance_decouverte(0);
			}
		} elseif ($userModif->getNewsletter() == 'desinscription' ) {

			$userModif->setNewsletter(0);

		}


		// FIN VERIFICATION
		// test si pas d'erreur et envoie le tout dans la BDD et redirige vers l'espace perso
		if ($erreur === false AND $error_email_message === 'ok' AND $error_date_naissance_message === 'ok') {
			
			// on crée un tableau pour la fonction Update
			$donnees = [
				'genre' => $userModif->getGenre(),
				'nom_utilisateur' => $userModif->getNom_utilisateur(),
				'prenom_utilisateur' => $userModif->getPrenom_utilisateur(),
				'date_de_naissance' => $userModif->getDate_de_naissance(),
				'adresse_rue' => htmlspecialchars($userModif->getAdresse_rue()),
				'adresse_code_postal' => $userModif->getAdresse_code_postal(),
				'adresse_ville' => htmlspecialchars($userModif->getAdresse_ville()),
				'telephone' => $userModif->getTelephone(),
				'email' => $userModif->getEmail(),
				'newsletter' => $userModif->getNewsletter(),
				'seance_decouverte' => $userModif->getSeance_decouverte()
			];

			$userModif->Update($donnees, $_SESSION['id_utilisateur']);

			// on récupère les nouvelles informations de connexion pour actualiser les informations de session
			$userModif = $userModif->getUserByMail($userModif->getEmail());
			$userModif->setBddTableau($dbh);

			// on relance la session avec les nouvelles variables
			$userModif->addVariableSession();
			header('Location: ?action=espace_personnel');

			} else {

				// si les 2 variables ne sont pas sur ok, les envoie a SMARTY
				if ($error_email_message !== 'ok') {
					$smarty->assign('error_email_message', $error_email_message);
				}

				if ($error_date_naissance_message !== 'ok') {
					$smarty->assign('error_date_naissance_message', $error_date_naissance_message);
				}

				// envoie les messages d'erreur à SMARTY
				$smarty->assign(array(
					'error_nom_utilisateur_message' => $error_nom_utilisateur_message,
					'error_prenom_utilisateur_message' => $error_prenom_utilisateur_message,
					'error_Adresse_code_postal_message' => $error_Adresse_code_postal_message,
					'error_Adresse_ville_message' => $error_Adresse_ville_message,
					'error_telephone_message' => $error_telephone_message
				));
			}
		}
	}

	// SECTION AFFICHAGE DES SEANCES RESERVEES
	// création de l'objet séance
	$seance = new Seance($dbh);

	// supression d'une réservation
	if (isset($_GET['adminDelSeanceId'])) {
		$seance->DeleteReservationById($_GET['adminDelSeanceId'], $_SESSION['id_utilisateur']);
	}

	// récupération des séances réservées par l'utilisateur
	$seances = $seance->getSeanceById($_SESSION['id_utilisateur']);

	// envoi des données à SMARTY
	$smarty->assign(array(
		'ObjetSeance' => $seance,
		'seances' => $seances
	));


	// SECTION AFFICHAGE DE L'AVIS CLIENT
	// création de l'objet avis
	$avis = new Avis($dbh);
	
	// suppression de son avis client (à faire avant l'affichage pour éviter une redirection)
	if ($_GET['avis'] == 'delete') {

		$avis->Delete($_SESSION['id_utilisateur'], 'id_utilisateur');
	}

	// récuperation de l'avis de l'utilisateur connecté
	$avisUtilisateur = $avis->getitem($_SESSION['id_utilisateur'], 'id_utilisateur');

	// envoie la variable à SMARTY
	$smarty->assign('avisUtilisateur', $avisUtilisateur);


$smarty->display('templates/espace_personnel.tpl');
?>