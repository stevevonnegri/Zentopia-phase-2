<?php
$seance = new Seance($dbh);
//recupêre la liste des cours present dans la BDD et les envoie a smarty
	$noms_des_cours = $seance->allTypeDeCours();

	$smarty->assign('noms_des_cours', $noms_des_cours);
//page active
	//si une page est demander la set dans $page, sinon demande la page 1
	if ($_GET['page'] == NULL) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}
	//envoie de $page a smarty
	$smarty->assign('page', $page);

//affichage des seance de la semaine
	//teste si un filtre est actif ou non
	$filtre = "";

	if (isset($_POST['filtre'])) {
		$filtre = $_POST['nom_cours'];
	}

	//on recupere la date A:M:J
		
	//recuperation des information dans la BDD
		//pour test avant le jour J, creation de la bonne date :

		$BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+9, date("Y"));

		$seances = $seance->getSeance($BonneDate, $filtre);

	//envoie des information a smarty
		$smarty->assign('seances', $seances);

	

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>