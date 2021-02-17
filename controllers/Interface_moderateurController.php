<?php

// vérifie si une session est ouverte, et redirige vers la page de connexion dans le cas contraire
if (!isset($_SESSION['id_utilisateur'])) {
	header('Location: ?action=connexion');
}

// si clic sur le bouton déconnexion, detruit la session et redirige vers l'accueil
if ($_GET['deconnexion'] == true) {
    session_destroy();
    header('Location: index.php');
}

// SECTION "GERER LES AVIS CLIENT"
// vérifie si on a cliqué sur "Gérer les avis clients"
if (isset($_GET['avis'])) {

	// passe la variable concernée à SMARTY pour qu'il affiche le bloc Avis client
	$smarty->assign('gerer_avis', 'gerer_avis');


	// récupère les avis en attente de modération
	$avis = new Avis($dbh);
	$avis_en_attente = $avis->getAvisNonApprouves();


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

		// envoie les données à SMARTY
		$smarty->assign('avis_en_attente', $avis_en_attente);



		// check si l'admin a cliqué sur le bouton pour valider l'avis
		if (isset($_GET['valider'])) {

			echo "test valider";

		}

	} 
	
}





$smarty->display('templates/interface_moderateur.tpl');
?>