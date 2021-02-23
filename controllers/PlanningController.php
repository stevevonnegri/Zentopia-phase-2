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

	//Partie Admin Participant
        //afficher la liste des participant
        
        
        

$seance_reservation = new Seance($dbh);
$Type_de_cours_Reservation = new Type_de_cours($dbh);

//Reserver une seance
if(isset($_GET['id_reservation'])) {

    //Verifier qu'on s'est bien connecter avec son compte
    if(isset($_SESSION['id_utilisateur'])) {

        $donnees = $seance_reservation->getItemFromReserver($_GET['id_reservation'], 'id_seance');

        //Verifier que l'on peut reserve qu'une seule fois la seance
        if(in_array($_SESSION['id_utilisateur'], $donnees) == false){
            
            //On verifie que la seance selectionner est encore de la place
            if($seance_reservation->CountParticipantSeance($_GET['id_reservation']) < $Type_de_cours_Reservation->getItemForSeance($_GET['id_reservation'])) {

                //Sert a reserve une seance dans la BDD
                $data['id_seance'] = $_GET['id_reservation'];
                $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
                $seance_reservation->AddReservation($data);
                $smarty->assign('confirmationReservation', 'true');
                echo ('<script>document.location.href="?action=planning"</script>');
                
            } else {
                //Renvoie une erreur smarty pour informer que la seance est pleine
                $smarty->assign('seancePleine', '<script>alert(\'La seance que vous avez choisi est deja pleine\')</script>');
            }
        } else{
            $smarty->assign('seanceDejaReserver', '<script>alert(\'Vous avez deja reserve cette seance, à bientot\')</script>');
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

        $smarty->assign('confirmationAnnulation', 'true');
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