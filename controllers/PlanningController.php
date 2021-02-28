<?php
$seance = new Seance($dbh);
$professeur = new Professeur($dbh);
//recupêre la liste des cours present dans la BDD et les envoie a smarty
	$noms_des_cours = $seance->allTypeDeCours();
    $prenoms_professeurs = $professeur->prenom_all_professeur();

	$smarty->assign('noms_des_cours', $noms_des_cours);
    $smarty->assign('prenoms_professeurs', $prenoms_professeurs);

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
    if (isset($_POST['rechercher_participant'])) {

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
            //on verifie si $users est vide
            if (empty($users)) {
                $if_users_vide = 'user_vide';
            }
            $smarty->assign(array(
                'users' => $users,
                'if_users_vide' => $if_users_vide,
                'onclick_admin_seance' => $onclick_admin_seance,
                'onclick_liste_participants' => $onclick_liste_participants,
                'onclick_ajouter_participant' => $onclick_ajouter_participant
            ));
    }
//apres avoir rechercher le membre on l'ajoute a la seance
    if (isset($_POST['ajouter_participant'])) {
        //on crée un nouvel objet seance
        $seance = new Seance($dbh);

        //on verifie que le participant n'est pas deja inscrit
        $listseance = $seance->getItemFromReserver($_POST['id_seance'], 'id_seance');

        if(in_array($_POST['id_utilisateur'], $listseance) == false){

            $seance->addParticipant($_POST['id_seance'], $_POST['id_utilisateur']);

            //on set le message a envoyer a smarty
            $addParticipantSucces = "<p>Vous avez bien ajouté ".$_POST['prenom_utilisateur']." ".$_POST['nom_utilisateur']." à la séance</p>";
            

        } else { //si le participant est deja inscrit, envoie un message d'erreur a smarty

            $addParticipantSucces = "<p>".$_POST['prenom_utilisateur']." ".$_POST['nom_utilisateur']." participe déja à la séance.</p>";

        }

        //on ecrit les scripts et on les met dans des variables
            
                //onclick admin-seance
                $onclick_admin_seance = 
                '<script>showElement("admin-seance-'.$_POST['id_seance'].'");</script>';
                
                //onclick liste-participants
                $onclick_liste_participants = 
                '<script>showElement("liste-participants-'.$_POST['id_seance'].'");</script>';

        //envoie les message et les script a smarty
            $smarty->assign(array(
                'addParticipantSucces' => $addParticipantSucces,
                'onclick_admin_seance' => $onclick_admin_seance,
                'onclick_liste_participants' => $onclick_liste_participants
            ));

    }
//suppresion d'un participant a une seance
    //verifie les id dans l'url
    if (isset($_GET['delete_seance_du_participant']) && isset($_GET['delete_participant_a_une_seance'])) {
        //on transforme les 2 valeurs de GET en type number
        $id_utilisateur = intval($_GET['delete_participant_a_une_seance']);
        $id_seance = intval($_GET['delete_seance_du_participant']);

        $seance->deleteParticipant($id_seance, $id_utilisateur);

        //on ecrit les scripts et on les met dans des variables
        
            //onclick admin-seance
            $onclick_admin_seance = 
            '<script>showElement("admin-seance-'.$id_seance.'");</script>';
            
            //onclick liste-participants
            $onclick_liste_participants = 
            '<script>showElement("liste-participants-'.$id_seance.'");</script>';

        //on envoie les variable a smarty
            $smarty->assign(array(
                'onclick_admin_seance' => $onclick_admin_seance,
                'onclick_liste_participants' => $onclick_liste_participants
            ));

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


//Reserver une seance (utilisateur)
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

//Annuler une reservation de seance (utilisateur)
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

//Ajouter une seance (admin)
if(isset($_POST['Ajouter_seance'])) {

    //On verifie que c'est bien un admin
    if($_SESSION['rang'] == 'admin') {

        if($seance->VerifDateHeure($_POST['date-seance'], $_POST['heure-debut'], $_POST['heure-fin']) == true) {
            
            //On regarde de le cours est possible dans les horaires
            $seance->setDate_seance($_POST['date-seance']);
            $seance->setHeure_debut_seance($_POST['heure-debut']); 
            $seance->setHeure_fin_seance($_POST['heure-fin']);
            $seance->setId_type_de_cours($_POST['nom_type_cours']);
            $seance->setId_professeur($_POST['prenom_professeur']);            
            
            if($seance->VerificationPlageHoraireDispo() == 0) {
                $seance->AddSeance();
                $smarty->assign('AjoutOk', 'La séance a bien été ajouter');

            } else {
                //Message d'erreur ->Deja une seance durant cette periode
                $smarty->assign('SeanceDejaPrise', 'Il y a deja une seance durant cette periode') ;
            }
        } else {
            //Date saisi deja passer
            $smarty->assign('DatePerimer', 'La date rentrer est deja passer ou il y a un probleme avec l\'heure') ;
            }
    }else {
        //Message d'erreur ->Pas le rang d'admin ou pas connecte
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les permissions pour cela ou vous avez était deconnecte') ;
    }
}

//modifier une seance (admin ou moderateur et prof de la seance)
if(isset($_POST['Modif_seance'])) {

    //On verifie que c'est bien un admin ou le professeur
    if($_SESSION['rang'] == 'admin' || $_SESSION['rang'] == 'moderateur' && $professeur->verifProf($_SESSION['id_utilisateur'], $_POST['prenom_professeur'])) {

        //On verifie que les dates rentres concorde bien ensemble (pas de date passer, l'heure de debut inferieur a l'heure de fin)
        if($seance->VerifDateHeure($_POST['date_seance'], $_POST['heure_debut'], $_POST['heure_fin']) == true) {

            //On regarde de le cours est possible dans les horaires
            if($seance->VerificationPlageHoraireDispo($seance->getId_seance()) == 0) {

                $donnees = [
                    'id_seance' => $_POST['id_seance'],
                    'date_seance' => $_POST['date_seance'],
                    'heure_debut_seance' => $_POST['heure_debut'],
                    'heure_fin_seance' => $_POST['heure_fin'],
                    'id_type_de_cours' => $_POST['nom_cours'],
                    'id_professeur' => $_POST['prenom_professeur'],
                ];
                //On modifie la BDD avec le tableau
                $seance->Update($donnees, $_POST['id_seance']);
                $smarty->assign('ModifOk', 'La seance a bien été modifier, les personnes inscrit seront informées de la modification');

            } else {
                //Message d'erreur ->Deja une seance durant cette periode
                $smarty->assign('SeanceDejaPrise', 'Il y a deja une seance durant cette periode') ;
            }
        } else {
            //Date saisi deja passer
            $smarty->assign('DatePerimer', 'La date rentrer est deja passer ou il y a un probleme avec l\'heure') ;
            }
    }else {
        //Message d'erreur ->Pas le rang d'admin ou pas connecte
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les permissions pour cela ou vous avez était deconnecte') ;
    }
}


//Fait passer une seance en annuler dans la BDD
if(isset($_POST['annuler_seance'])) {

    //On verifie que c'est bien un admin ou le professeur
    if($_SESSION['rang'] == 'admin' || $_SESSION['rang'] == 'moderateur' && $professeur->verifProf($_SESSION['id_utilisateur'], $_POST['id_professeur'])) {
    
        if(isset($_POST['annuler-seance']) ) {
            $donnees['annule'] = '1';
            $seance->Update($donnees, $_POST['id_seance']);
            $smarty->assign('AnnulationOk', 'La seance a bien été annuler, les personnes inscrits seront informées de l\'annulation');
        }
    } else {
        //Message d'erreur ->Pas le rang d'admin ou pas connecte
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les permissions pour cela ou vous avez était deconnecte') ;
    }
}

    
//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>