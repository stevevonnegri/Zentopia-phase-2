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


//recherche des membre pour les ajouter a une seance
    if (isset($_POST['ajouter_participant'])) {
        
        //on recupere le contenu des champs dans des variable

        if ($_POST['email_search'] == '') {

                $email = NULL;

            } else {

                $email = $_POST['email_search'];
            }

        if ($_POST['tel_search'] == '') {

                $tel = NULL;

            } else {

                $tel = $_POST['tel_search'];
            }

        //on envoie la requete sql avec nos variables
            $user = new Utilisateur($dbh);

            $users = $user->getRechercheMembre(NULL, NULL, $tel, NULL, $email);

        //on ecrit les scripts et on les met dans des variables
        
            //onclick admin-seance
            $onclick_admin_seance = 
            '<script>showElement("admin-seance-'.$_POST['id_seance'].'");</script>';
            
            //onclick liste-participants
            $onclick_liste_participants = 
            '<script>showElement("liste-participants-'.$_POST['id_seance'].'");</script>';

            //onclick ajouter-participant
            $onclick_ajouter_participant = 
            '<script>showElement("ajouter-participant-'.$_POST['id_seance'].'");</script>';

        //on replace la personne au bon endroit sur la page et on envoie les variables a smarty
            //TODO les 2 dernier script s'affiche en claire et le 1er n'a pas l'air de marcher.
            $smarty->assign(array(
                'users' => $users,
                'onclick_admin_seance' => $onclick_admin_seance,
                'onclick_liste_participants' => $onclick_liste_participants,
                'onclick_ajouter_participant' => $onclick_ajouter_participant
            ));
    }

//suppresion d'un participant a une seance
    //verifie les id dans l'url
    if (isset($_GET['delete_seance_du_participant']) && isset($_GET['delete_participant_a_une_seance'])) {
        //on transphorme les 2 valeur de GET en type number
        $id_utilisateur = intval($_GET['delete_participant_a_une_seance']);
        $id_seance = intval($_GET['delete_seance_du_participant']);

        $seance->deleteParticipant($id_seance, $id_utilisateur);
    }
//ajoute un participant a une seance.

//affichage des seance de la semaine
	//teste si un filtre est actif ou non
	$filtre = "";

	if (isset($_POST['filtre'])) {
		$filtre = $_POST['nom_cours'];
	}

	//on recupere la date A:M:J
		
	//recuperation des information dans la BDD
		//creation des la date selon la page demander:
        if ($page == 2) {

            $jourDiff = 7 - date('w');
            $BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+$jourDiff, date("Y"));

        } elseif ($page == 3) {

            $jourDiff = 14 - date('w');
            $BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+$jourDiff, date("Y"));

        } else {

            $BonneDate = NULL;

        }

        //pour test avant le jour J,
		//$BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+10, date("Y"));

		$seances = $seance->getSeance($filtre, $BonneDate);

	//envoie des information a smarty
		$smarty->assign('seances', $seances);

	//Partie Admin Participant
        //afficher la liste des participant
        
        
        

$seance_reservation = new Seance($dbh);
$Type_de_cours_Reservation = new Type_de_cours($dbh);

//affiche le message de confirmation de reservation.
if (isset($_GET['confirmationReservation'])) {
    //$smarty->assign('confirmationReservation', $_GET['confirmationReservation']);
    $smarty->assign('confirmationReservation', '<script>alert(\'Votre séance a bien été réservée. Vous allez bientôt recevoir un mail de confirmation.\')</script>');
}

//affiche le message de confirmation de l'annulation.
if (isset($_GET['confirmationAnnulation'])) {
    //$smarty->assign('confirmationReservation', $_GET['confirmationReservation']);
    $smarty->assign('confirmationAnnulation', '<script>alert(\'La réservation à cette séance a bien été annulée. Vous allez bientôt recevoir un mail de confirmation.\')</script>');
}


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
                echo ('<script>document.location.href="?action=planning&confirmationReservation=true"</script>');
                
            } else {
                //Renvoie une erreur smarty pour informer que la seance est pleine
                $smarty->assign('seancePleine', '<script>alert(\'La seance que vous avez choisie est deja pleine\')</script>');
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

        echo ('<script>document.location.href="?action=planning&confirmationAnnulation=true"</script>');

    } else{
    //Il faut se connecter pour annuler un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}
    
//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>