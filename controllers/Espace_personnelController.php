<?php
session_start();

if (isset($_SESSION)) {
	$smarty->assign('_SESSION', $_SESSION);
}


//verifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire.
/*    /!\ a decommanter plus tard /!\ 

	if (isset($_SESSION)) {
		header('Location: ?action=connexion');
	}
*/

//si clic sur le bouton deconnexion, detruit la session et redirige vers l'accueil
	if ($_GET['deconnexion'] == true) {
		session_destroy();
		header('Location: index.php');
	}

//envoie a smarty les information a afficher dans l'espace membre en fonction des variable de session.
	$smarty->assign(array(
		'id_utilisateur' => $_SESSION['id_utilisateur'],
		'genre' => $_SESSION['genre'],
		'nom_utilisateur' => $_SESSION['nom_utilisateur'],
		'prenom_utilisateur' => $_SESSION['prenom_utilisateur'],
		'date_de_naissance' => $_SESSION['date_de_naissance'],
		'adresse_rue' => $_SESSION['adresse_rue'],
		'adresse_code_postal' => $_SESSION['adresse_code_postal'],
	    'adresse_ville' => $_SESSION['adresse_ville'],
		'telephone' => $_SESSION['telephone'],
		'email' => $_SESSION['email'],
		'newsletter' => $_SESSION['newsletter'],
		'rang' => $_SESSION['rang']
	));

//changement de mot de passe
	if (isset($_POST['mettre_a_jour'])) {
		//verifier si le mot de passe actuel est bon.
	}



//affichage des cours

//affichage de l'avis client de l'utilisateur.


$smarty->display('templates/espace_personnel.tpl');
?>