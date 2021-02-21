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

	

//Sert a afficher une seance de la bdd pour dev le module
$seance_reservation = new Seance($dbh);

//Reserver une seance
if(isset($_GET['id_reservation'])) {
    
    if(isset($_SESSION['id_utilisateur'])){

        //Sert a reserve une seance dans la BDD
        $data['id_seance'] = $_GET['id_reservation'];
        $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
        $seance_reservation->AddReservation($data);

        //Calculer le nombre de place restante dans la seance est le décremente de 1
        // TODO Faire la decremlentation de place dispo dans la seance. (attent reponse d'olivier)
        

    } else{
    //Il faut se connecter pour reserve un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}

//Annuler une reservation de seance
if(isset($_GET['id_annuler'])) {

    if(isset($_SESSION['id_utilisateur'])){
        //Sert a reserve une seance dans la BDD
        $data['id_seance'] = $_GET['id_annuler'];
        $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
        $seance_reservation->DeleteSeance($data);

    } else{
    //Il faut se connecter pour annuler un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}


$smarty->assign('seance_affichage', 'Rien');

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>