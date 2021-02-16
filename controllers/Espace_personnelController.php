<?php

//verifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire.

	if (!isset($_SESSION['id_utilisateur'])) {
		header('Location: ?action=connexion');
	}

//si clic sur le bouton deconnexion, detruit la session et redirige vers l'accueil
	if ($_GET['deconnexion'] === true) {
		session_destroy();
		header('Location: index.php');
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
				'mot_de_passe' => $verif
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


//affichage des cours deja reserver.


//affichage de l'avis client de l'utilisateur.


if(isset($_GET['deconnexion'])) {
    session_destroy();
	header('Location: index.php');
}

//$smarty->assign('active', 'espace_membre');
$smarty->display('templates/espace_personnel.tpl');
?>