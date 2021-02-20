<?php
if ($_GET['id_reservation'] == 2) {
	echo('COUCOU');
	die;
}
//affichage des sceaance de la semaine
	//on recupere la date A:M:J
		
	//recuperation des information dans la BDD
		$seance = new Seance($dbh);

		//pour test avant le jour J, creation de la bonne date :

		$BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+9, date("Y"));

		$seances = $seance->getSeance($BonneDate);

	//envoie des information a smarty
		$smarty->assign('seances', $seances);

	//

	

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>