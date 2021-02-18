<?php
//verifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire.

	if (!isset($_SESSION['id_utilisateur'])) {
		header('Location: ?action=connexion');
	}

//si clic sur le bouton deconnexion, detruit la session et redirige vers l'accueil
	if ($_GET['deconnexion'] == true) {
		session_destroy();
		header('Location: index.php');
	}
//supprimer le compte
	if (isset($_POST['CompteDelete'])) {
		$deluser = new Utilisateur($dbh);
		$deluser->Delete($_SESSION['id_utilisateur']);
		session_destroy();
		header('Location:?action=index&CompteDelete=true');
	}

//changement de mot de passe
	if (isset($_POST['mettre_a_jour'])) {
		//verifier si le mot de passe actuel est bon.
		$user = new Utilisateur($dbh);
		$user_verif_mot_de_passe = $user->getUserByMail($_SESSION['email']);

		//crée une variable erreur a false pour plus tard
		$erreur = false;

		if(password_verify($_POST['mot_de_passe_actuel'], $user_verif_mot_de_passe->getMot_de_passe())) {
			//verifie que les mot de passe donnée sont conforme

			$verif = VerifMot_De_PasseConforme($_POST['new_mot_de_passe']);

			if ($verif !== true ) {

				$error_mot_de_passe_message = $verif;
				$erreur = true;

			}
			
			//verifie si les mot de passe sont identique, si oui, le hash.

			$verif = VerifMot_De_PasseIndetique($_POST['new_mot_de_passe'], $_POST['new_mot_de_passe_verif']);

			if ($verif === false) {
				$error_verif_mot_de_passe_message = '<p class="alert-danger">Vos mots de passe ne correspondent pas.</p>';
				$erreur = true;

			}

		} else {
			$erreur = true;
		}

		if ($erreur === false) {
			//set le nouveau mot de passe dans un tableau.
			$donnée = [
				'mot_de_passe' => password_hash($_POST['new_mot_de_passe'], PASSWORD_DEFAULT)
			];
			// envoie le nouveau mot de passe dans la BDD en recperant l'id dans les info de session.
			$user->Update($donnée, $_SESSION['id_utilisateur']);
			//puis actualise la page.
			header('Location: ?action=espace_personnel');
	// A FAIRE 	afficher un message de succes sur la prochaine fenetre.
		
		} else {

			//en cas d'erreur les envoie a smarty
			$smarty->assign(array(
				'error_mot_de_passe_message' => $error_mot_de_passe_message,
				'error_verif_mot_de_passe_message' => $error_verif_mot_de_passe_message,
				'error_mauvais_mot_de_passe' => '<p class="alert-danger">Mauvais mot de passe.</p>'
			));

		}

	}

//affichage du formulaire de modification a la place des info de session
	if ($_GET['form'] == 'active') {
		//envoie d'une variable a smarty pour lui faire afficher le formulaire.
		$smarty->assign('form', 'active');

		if (isset($_POST['modifier_coordonnees'])) {
			$userModif = new Utilisateur($dbh);
			$erreur = false;

			//recuperation des donnée du formulaire
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

/* /!\ */		$error_email_message = $userModif->EmailBonFormat('MODIF');

				//verifie que le nom et le prenom n'on pas de charactere speciaux
					//le nom en 1er
					if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $userModif->getNom_utilisateur())) {

						$error_nom_utilisateur_message = '<p class="alert-danger">Votre Nom à des caractere non valide.</p>';
						$erreur = true;

					}
					//Ensuite le prenom
					if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $userModif->getPrenom_utilisateur())) {

						$error_prenom_utilisateur_message = '<p class="alert-danger">Votre Prénom à des caractere non valide.</p>';
						$erreur = true;

					}

				//verification que l'utilisateur a plus de 18 ans
/* /!\ */		if ($userModif->VerifPlusDe18ans()) {
					
					$error_date_naissance_message = '<p class="alert-danger">Vous devez être majeur pour profiter de vos avantage client.</p>';
					
				} else {

					$error_date_naissance_message = 'ok';
				}

				//Verification que le code postal fasse bien 5 chiffre.
				if (!preg_match("#^[0-9]{5}$#", $userModif->getAdresse_code_postal())) {

						$error_Adresse_code_postal_message = '<p class="alert-danger">Votre code postal doit etre composé de 5 chiffres.</p>';
						$erreur = true;

				}

				//Verification qu'il n'y ai pas de chiffre dans le nom de la ville
				if (preg_match("/[0-9]+/", $userModif->getAdresse_ville())) {

				 	$error_Adresse_ville_message = '<p class="alert-danger">Le nom de votre ville ne doit contenir de chiffres.</p>';
						$erreur = true;
				 }

				//Verification du num de tel
				if (!preg_match("#(0|\+33|0033)[1-9][0-9]{8}#", $userModif->getTelephone())) {

				 	$error_telephone_message = '<p class="alert-danger">Votre numero de téléphone n\'est pas valide.</p>';
					$erreur = true;
				 }

				//verifier si newsletter et pas de seance reserver : set seance decouverte a 1 sinon la set à 0
				 
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


			//FIN VERIFICATION

			//test si pas d'erreur
			if ($erreur === false AND $error_email_message === 'ok' AND $error_date_naissance_message === 'ok') {
				//envoie le tout dans la BDD et redirige vers l'espace perso
				
					//on crée un tableau pour la fonction Update
					$donnees = [
						'genre' => $userModif->getGenre(),
						'nom_utilisateur' => $userModif->getNom_utilisateur(),
						'prenom_utilisateur' => $userModif->getPrenom_utilisateur(),
						'date_de_naissance' => $userModif->getDate_de_naissance(),
						'adresse_rue' => $userModif->getAdresse_rue(),
						'adresse_code_postal' => $userModif->getAdresse_code_postal(),
						'adresse_ville' => $userModif->getAdresse_ville(),
						'telephone' => $userModif->getTelephone(),
						'email' => $userModif->getEmail(),
						'newsletter' => $userModif->getNewsletter(),
						'seance_decouverte' => $userModif->getSeance_decouverte()
					];

					$userModif->Update($donnees, $_SESSION['id_utilisateur']);

					//on recupere les nouvelle information de connexion pour actualiser les information de session.
					$userModif = $userModif->getUserByMail($userModif->getEmail());
					$userModif->setBddTableau($dbh);

					//on relance la session avec les nouvelle variable ici.

					$userModif->addVariableSession();
					header('Location: ?action=espace_personnel');

			} else {
				//si les 2 variable ne sont pas sur ok, les envoie a smarty
				if ($error_email_message !== 'ok') {
					$smarty->assign('error_email_message', $error_email_message);
				}

				if ($error_date_naissance_message !== 'ok') {
					$smarty->assign('error_date_naissance_message', $error_date_naissance_message);
				}
				//envoie les message d'erreur a smarty
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

//affichage des seance deja reserver.
	//creation de l'objet seance
	$seance = new Seance($dbh);

	//supression d'une reservation
	if (isset($_GET['adminDelSeanceId'])) {
		$seance->DeleteReservationById($_GET['adminDelSeanceId'], $_SESSION['id_utilisateur']);
	}

	//recuperation des seance reserver par l'utilisateur.
	$seances = $seance->getSseanceById($_SESSION['id_utilisateur']);

	//TEST avec utilisateur 14
	//$seances = $seance->getSseanceById(14);

	//envoie des donnée a smarty
	$smarty->assign(array(
		'ObjetSeance' => $seance,
		'seances' => $seances
	));



//affichage de l'avis client de l'utilisateur.
	//creation de l'objet avis
	$avis = new Avis($dbh);
	
	//suppression de son avis client
	//a faire avant l'affiche pour eviter une redirection.
	if ($_GET['avis'] == 'delete') {

		$avis->Delete($_SESSION['id_utilisateur'], 'id_utilisateur');
	}

	//recuperation de l'avis de l'utilisateur connecté
	$avisUtilisateur = $avis->getitem($_SESSION['id_utilisateur'], 'id_utilisateur');

	//envoie la variable a smarty.
	$smarty->assign('avisUtilisateur', $avisUtilisateur);




//$smarty->assign('active', 'espace_membre');
$smarty->display('templates/espace_personnel.tpl');
?>