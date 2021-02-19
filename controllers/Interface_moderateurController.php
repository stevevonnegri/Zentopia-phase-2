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
	if (isset($_POST['nom']) OR isset($_POST['prenom']) OR isset($_POST['telephone']) OR isset($_POST['rang'])) {
		
		// vérifie que au moins un des trois champs contient des données 
		if ($_POST['nom'] != '' OR $_POST['prenom'] != '' OR $_POST['telephone'] != '' OR $_POST['rang'] != '') {


			// si le champ est vide, la variable est initialitée à NULL (on en a besoin dans la méthode getRechercheMembre plus bas )

			if ($_POST['nom'] == '') {

				$nom = NULL;

			} else {

				$nom = $_POST['nom'];
			}



			if ($_POST['prenom'] == '') {

				$prenom = NULL;

			} else {

				$prenom = $_POST['prenom'];
			}



			if ($_POST['telephone'] == '') {

				$tel = NULL;

			} else {

				$tel = $_POST['telephone'];
			}


			if ($_POST['rang'] == '') {

				$rang = NULL;

			} else {

				$rang = $_POST['rang'];
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
	// vérifie si on a cliqué sur "Rechercher un membre"
	if ($_SESSION['rang'] == 'admin' && isset($_GET['id_modif'])) {

	$id = $_GET['id_modif'];
	$id = (int)$id;

	$smarty->assign('modif_form', 'modif_form');	

	$user = new Utilisateur($dbh);
	$user_modif = $user->getItem($id);

	$smarty->assign('user_modif', $user_modif);

	}



}





$smarty->display('templates/interface_moderateur.tpl');
?>