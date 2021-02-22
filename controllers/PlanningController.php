<?php
/*if ($_GET['id_reservation'] == 2) {
	echo('COUCOU');
	die;
}*/
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
$Type_de_cours_Reservation = new Type_de_cours($dbh);

//Reserver une seance
if(isset($_GET['id_reservation'])) {

    //Verifier qu'on s'est bien connecter avec son compte
    if(isset($_SESSION['id_utilisateur'])) {

        $donnees = $seance_reservation->getItemFromReserver($_GET['id_reservation'], 'id_seance');
        var_dump($donnees);
        echo '<br/>';
        var_dump($_SESSION['id_utilisateur']);
        echo '<br/>';
        var_dump(in_array($_SESSION['id_utilisateur'], $donnees));

        //Verifier que l'on peut reserve qu'une seule fois la seance
        if(in_array($_SESSION['id_utilisateur'], $donnees) == false){
            
            //var_dump($seance_reservation->CountParticipantSeance($_GET['id_reservation']));
            //var_dump($Type_de_cours_Reservation->getItemForSeance($_GET['id_reservation']));
            echo'<br/>test 152';
            //On verifie que la seance selectionner est encore de la place
            if($seance_reservation->CountParticipantSeance($_GET['id_reservation']) < $Type_de_cours_Reservation->getItemForSeance($_GET['id_reservation'])) {

                //Sert a reserve une seance dans la BDD
                $data['id_seance'] = $_GET['id_reservation'];
                $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
                $seance_reservation->AddReservation($data);
                echo 'test';
                
            } else {
                //Renvoie une erreur smarty pour informer que la seance est pleine
                $smarty->assign('seancePleine', 'Seance rempli');
            }
        } else{
            $smarty->assign('seanceDejaReserver', 'Seance rempli');
        }
    } else {
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

        echo ('<script>document.location.href="?action=planning"</script>');

    } else{
    //Il faut se connecter pour annuler un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}


//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>