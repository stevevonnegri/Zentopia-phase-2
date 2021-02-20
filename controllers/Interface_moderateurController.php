<?php

// vérifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire
if (!isset($_SESSION['id_utilisateur'])) {
	header('Location: ?action=connexion');
}

// empêche l'accès à tous les membres qui ne sont pas admin ou modérateurs en les redigirant vers l'accueil 
if ($_SESSION['rang'] != 'moderateur' && $_SESSION['rang'] != 'admin') {

	header('Location: index.php');
}


// si clic sur le bouton déconnexion, detruit la session et redirige vers l'accueil
if ($_GET['deconnexion'] == true) {
    session_destroy();
    header('Location: index.php');
}


// détermine les parties supplémentaires à afficher à l'admin
if ($_SESSION['rang'] == 'admin') {

	$smarty->assign('admin', 'admin');
}




// SECTION "GERER LES AVIS CLIENT" (modérateur & admin)
// vérifie si on a cliqué sur "Gérer les avis clients"
if (isset($_GET['avis'])) {

	// passe la variable concernée à SMARTY pour qu'il affiche le bloc Avis client
	$smarty->assign('gerer_avis', 'gerer_avis');


	// récupère les avis en attente de modération
	$avis = new Avis($dbh);
	$avis_en_attente = $avis->getAvisNonApprouves();


	// SECTION AVIS EN ATTENTE
	// vérifie que la méthode getAvisNonApprouvés retourne bien des résultats
	if (isset($avis_en_attente) && (!empty($avis_en_attente))) {	

		// calcule l'âge de l'utilisateur en fonction de sa date de naissance
		$id_tableau = 0;

		foreach ($avis_en_attente as $key => $value) {
		
			$jour_actuel = new DateTime();
			$jour_naissance = new DateTime($value['date_de_naissance']);
			$interval = $jour_actuel->diff($jour_naissance);
			$avis_en_attente[$id_tableau]['age'] = $interval->format('%y');

			$id_tableau +=1;

		}

		// envoie les données des avis en attente à SMARTY
		$smarty->assign('avis_en_attente', $avis_en_attente);




		// check si l'admin a cliqué sur le bouton pour valider l'avis
		if (isset($_GET['valider']) && isset($_GET['id'])) {

			$id = $_GET['id'];
			$id = (int)$id;

			$donnees['approuve'] = 1;

			$avis->Update($donnees, $id);

			header('Location: ?action=interface_moderateur&avis=true'); 
			exit();

		}

		// check si l'admin a cliqué sur le bouton pour supprimer l'avis
		if (isset($_GET['refuser']) && isset($_GET['id'])) {

			$id = $_GET['id'];
			$id = (int)$id;

			$avis->Delete($id);

			header('Location: ?action=interface_moderateur&avis=true');
			exit();

		}


	} 	

	// SECTION VOIR TOUS LES AVIS
	// vérifie si on a cliqué sur "Voir la totalité des avis"
	if (isset($_GET['liste'])) {


		$avis_valides = $avis->getAvisApprouves();


		// calcule l'âge de l'utilisateur en fonction de sa date de naissance
		$id_tableau = 0;

		foreach ($avis_valides as $key => $value) {
		
			$jour_actuel = new DateTime();
			$jour_naissance = new DateTime($value['date_de_naissance']);
			$interval = $jour_actuel->diff($jour_naissance);
			$avis_valides[$id_tableau]['age'] = $interval->format('%y');

			$id_tableau +=1;

		}

		$smarty->assign('liste_avis', 'liste_avis');

		if (isset($avis_valides) && (!empty($avis_valides))) {


			$smarty->assign('avis_valides', $avis_valides);
		}


		// check si l'admin a cliqué sur le bouton pour supprimer l'avis
		if (isset($_GET['supprimer']) && isset($_GET['id'])) {

			$id = $_GET['id'];
			$id = (int)$id;

			$avis->Delete($id);

			header('Location: ?action=interface_moderateur&avis=true&liste=true');
			exit();

		}

	}
	
}

// SECTION RECHERCHER LES MEMBRES (modérateur & admin avec droits différents)
// vérifie si on a cliqué sur "Rechercher un membre"
if (isset($_GET['membres'])) {

	// passe la variable concernée à SMARTY pour qu'il affiche le bloc Rechercher un membre
	$smarty->assign('rechercher_membre', 'rechercher_membre');

	// vérifie si le formulaire a été envoyé
	if (isset($_POST['nom_search']) OR isset($_POST['prenom_search']) OR isset($_POST['telephone_search']) OR isset($_POST['rang_search'])) {
		
		// vérifie que au moins un des trois champs contient des données 
		if ($_POST['nom_search'] != '' OR $_POST['prenom_search'] != '' OR $_POST['telephone_search'] != '' OR $_POST['rang_search'] != '') {


			// si le champ est vide, la variable est initialitée à NULL (on en a besoin dans la méthode getRechercheMembre plus bas )

			if ($_POST['nom_search'] == '') {

				$nom = NULL;

			} else {

				$nom = $_POST['nom_search'];
			}



			if ($_POST['prenom_search'] == '') {

				$prenom = NULL;

			} else {

				$prenom = $_POST['prenom_search'];
			}



			if ($_POST['telephone_search'] == '') {

				$tel = NULL;

			} else {

				$tel = $_POST['telephone_search'];
			}


			if ($_POST['rang_search'] == '') {

				$rang = NULL;

			} else {

				$rang = $_POST['rang_search'];
			}


			// récupère les résultats de la recherche des membres
			$user = new Utilisateur($dbh);
			$users = $user->getRechercheMembre($nom, $prenom, $tel, $rang);


			// si la requête renvoie des données, on les envoie à SMARTY
			if (!empty($users)) {

				$smarty->assign('users', $users);

			} else {

				$smarty->assign('resultat_vide', 'resultat_vide');

				echo "resultat_vide";

			}

		
		// si aucun champ n'a été saisi on prévient SMARTY	
		} else {

			$smarty->assign('champs_vides', 'champs_vides');
		}


	}


	// SECTION MODIFIER LES INFOS DU MEMBRE (admin)
	// vérifie si on a cliqué sur "MODIFIER" et si on a bien récupéré l'ID au passage
	if ($_SESSION['rang'] == 'admin' && isset($_GET['id_modif'])) {

		$id = $_GET['id_modif'];
		$id = (int)$id;

		// envoie l'affichage du formulaire à SMARTY
		$smarty->assign('modif_form', 'modif_form');	

		// récupère les infos du membre via l'ID et envoi à SMARTY
		$user = new Utilisateur($dbh);
		$user_modif = $user->getItem($id);
		$smarty->assign('user_modif', $user_modif);

	}


	// ENVOYER LES INFORMATIONS MODIFIEES (admi)
	// vérifie qu'on a bien toute les données du formulaire de modification des infos 
	if (isset($_POST['genre']) && isset($_POST['date_de_naissance']) && isset($_POST['prenom_utilisateur']) && isset($_POST['nom_utilisateur']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['adresse_code_postal']) && isset($_POST['adresse_ville']) && isset($_POST['adresse_rue']) && isset($_POST['rang']) && isset($_GET['id_modif'])) {


		$id = $_GET['id_modif'];
		$id = (int)$id;

		// récupère l'âge de l'utilisateur pour le vérifier plus bas
		$jour_actuel = new DateTime();
		$jour_naissance = new DateTime($_POST['date_de_naissance']);
		$interval = $jour_actuel->diff($jour_naissance);
		$age = (int)$interval->format('%y');

		// vérification des données modifiées avant qu'elles soient envoyées à la BDD
		if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $_POST['nom_utilisateur']) OR (strlen($_POST['nom_utilisateur']) > 50)) {

			$smarty->assign('champ_invalide', 'Le nom renseigné n\'est pas valide.');

		} elseif (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $_POST['prenom_utilisateur']) OR (strlen($_POST['prenom_utilisateur']) > 50)) {

			$smarty->assign('champ_invalide', 'Le prénom renseigné n\'est pas valide.');

			
		} elseif (strlen($_POST['adresse_rue']) > 100) {

			$smarty->assign('champ_invalide', 'L\'adresse saisie est trop longue.');


		} elseif ($age < 18) {

			$smarty->assign('champ_invalide', 'Vous devez avoir plus de 18 ans pour profiter des services de Zentopia.');
		

		} elseif (!preg_match("#^[0-9]{5}$#", $_POST['adresse_code_postal'])) {

			$smarty->assign('champ_invalide', 'Le code postal renseigné n\'est pas valide.');


		} elseif (preg_match("/[0-9]+/", $_POST['adresse_ville']) && strlen($_POST['adresse_ville']) > 50) {

			$smarty->assign('champ_invalide', 'La ville renseignée n\'est pas valide.');
		}


		elseif (!preg_match("#(0|\+33|0033)[1-9][0-9]{8}#", $_POST['telephone'])) {

			$smarty->assign('champ_invalide', 'Le numéro de téléphone renseigné n\'est pas valide.');
		
		}

		// si tout est valide, on stock les données dans un tableau et on les envoie
		else {

			$data = [
			'nom_utilisateur' => $_POST['nom_utilisateur'],
			'prenom_utilisateur' => $_POST['prenom_utilisateur'],
			'genre' => $_POST['genre'],
			'date_de_naissance' => $_POST['date_de_naissance'],
			'adresse_rue' => $_POST['adresse_rue'],
			'adresse_code_postal' => $_POST['adresse_code_postal'],
			'adresse_ville' => $_POST['adresse_ville'],
			'telephone' => $_POST['telephone'],
			'email' => $_POST['email'],
			'rang' => $_POST['rang']

			];


			$user->Update($data, $id);

			$smarty->assign('modif_confirm', 'modif_confirm');

			header('Location: ?action=interface_moderateur&membres=true');
			exit();


		}

	} 

}





$smarty->display('templates/interface_moderateur.tpl');
?>