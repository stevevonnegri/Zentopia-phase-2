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

	//passe la variable concernée à SMARTY pour qu'il affiche le bloc Avis client
	$smarty->assign('gerer_avis', 'gerer_avis');


	//récupère les avis en attente de modération
	$avis = new Avis($dbh);
	$avis_en_attente = $avis->getAvisNonApprouves();

	foreach ($avis_en_attente as $key => $value) {

		echo $value['date_de_naissance'];

	}
	
	//var_dump($avis_en_attente[0]);

	if (isset($avis_en_attente)) {

		$smarty->assign('avis_en_attente', $avis_en_attente);

	}
	


}



$smarty->display('templates/interface_moderateur.tpl');
?>