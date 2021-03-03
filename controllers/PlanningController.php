<?php

$seance = new Seance($dbh);
$professeur = new Professeur($dbh);

// PAGE ACTIVE
// si une page est demandée, on la set dans $page, sinon on demande la page 1
if ($_GET['page'] == NULL) {

	$page = 1;

} else {

	$page = $_GET['page'];
}

// envoi de $page a smarty
$smarty->assign('page', $page);

// recherche des membres pour les ajouter à une seance
if (isset($_POST['rechercher_participant'])) {

    // on récupère le contenu des champs dans des variables
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

    // on envoie la requete sql avec nos variables
    $user = new Utilisateur($dbh);
    $users = $user->getRechercheMembre(NULL, NULL, $tel, NULL, $email);

    // on écrit les scripts et on les met dans des variables
    
    // onclick admin-seance
    $onclick_admin_seance = 
    '<script>showElement("admin-seance-'.$_POST['id_seance'].'");</script>';
    
    // onclick liste-participants
    $onclick_liste_participants = 
    '<script>showElement("liste-participants-'.$_POST['id_seance'].'");</script>';

    // onclick ajouter-participant
    $onclick_ajouter_participant = 
    '<script>showElement("ajouter-participant-'.$_POST['id_seance'].'");</script>';

    // on replace la personne au bon endroit sur la page et on envoie les variables à SMARTY
    // on vérifie si $users est vide
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

// après avoir recherché le membre on l'ajoute à la séance
if (isset($_POST['ajouter_participant'])) {

    // on crée un nouvel objet séance
    $seance = new Seance($dbh);

    // on vérifie que le participant n'est pas déjà inscrit
    $listseance = $seance->getItemFromReserver($_POST['id_seance'], 'id_seance');

    if(in_array($_POST['id_utilisateur'], $listseance) == false){

        $seance->addParticipant($_POST['id_seance'], $_POST['id_utilisateur']);

        // on set le message à envoyer à SMARTY
        $addParticipantSucces = "<p>Vous avez bien ajouté ".$_POST['prenom_utilisateur']." ".$_POST['nom_utilisateur']." à la séance</p>";
        

    } else { 

        // si le participant est déjà inscrit, envoie un message d'erreur à SMARTY
        $addParticipantSucces = "<p>".$_POST['prenom_utilisateur']." ".$_POST['nom_utilisateur']." participe déja à la séance.</p>";

    }

    // on écrit les scripts et on les met dans des variables
        
    // onclick admin-seance
    $onclick_admin_seance = 
    '<script>showElement("admin-seance-'.$_POST['id_seance'].'");</script>';
    
    // onclick liste-participants
    $onclick_liste_participants = 
    '<script>showElement("liste-participants-'.$_POST['id_seance'].'");</script>';

    // envoie les messages et les scripts à SMARTY
    $smarty->assign(array(
        'addParticipantSucces' => $addParticipantSucces,
        'onclick_admin_seance' => $onclick_admin_seance,
        'onclick_liste_participants' => $onclick_liste_participants
    ));

}

// SUPPRESSION D'UN PARTICIPANT D'UNE SEANCE
// vérifie les id dans l'url
if (isset($_GET['delete_seance_du_participant']) && isset($_GET['delete_participant_a_une_seance'])) {

    // on transforme les 2 valeurs de GET en type number
    $id_utilisateur = intval($_GET['delete_participant_a_une_seance']);
    $id_seance = intval($_GET['delete_seance_du_participant']);

    $seance->deleteParticipant($id_seance, $id_utilisateur);

    // on écrit les scripts et on les met dans des variables

    // onclick admin-seance
    $onclick_admin_seance = 
    '<script>showElement("admin-seance-'.$id_seance.'");</script>';
    
    // onclick liste-participants
    $onclick_liste_participants = 
    '<script>showElement("liste-participants-'.$id_seance.'");</script>';

    // on envoie les variable à SMARTY
    $smarty->assign(array(
        'onclick_admin_seance' => $onclick_admin_seance,
        'onclick_liste_participants' => $onclick_liste_participants
    ));

}


// RESERVATION D'UNE SEANCE
$seance_reservation = new Seance($dbh);
$Type_de_cours_Reservation = new Type_de_cours($dbh);

// affiche le message de confirmation de réservation
if (isset($_GET['confirmationReservation'])) {

    $smarty->assign('confirmationReservation', '<script>alert(\'Votre séance a bien été réservée. Vous allez bientôt recevoir un mail de confirmation.\')</script>');
}

// affiche le message de confirmation de l'annulation
if (isset($_GET['confirmationAnnulation'])) {

    $smarty->assign('confirmationAnnulation', '<script>alert(\'La réservation à cette séance a bien été annulée. Vous allez bientôt recevoir un mail de confirmation.\')</script>');
}

// RESERVATION (utilisateur)
if(isset($_GET['id_reservation'])) {

    // vérifie qu'il est bien connecté avec son compte
    if(isset($_SESSION['id_utilisateur'])) {

        $donnees = $seance_reservation->getItemFromReserver($_GET['id_reservation'], 'id_seance');

        // vérifie que l'on peut réserver qu'une seule fois la séance
        if(in_array($_SESSION['id_utilisateur'], $donnees) == false){
            
            // vérifie que la séance sélectionnée possède encore des places
            if($seance_reservation->CountParticipantSeance($_GET['id_reservation']) < $Type_de_cours_Reservation->getItemForSeance($_GET['id_reservation'])) {

                // sert à réserver une séance dans la BDD
                $data['id_seance'] = $_GET['id_reservation'];
                $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
                $seance_reservation->AddReservation($data);

                // envoi d'un mail de confirmation de réservation
                $email = $_SESSION['email'];

                // l'en-tête nécessaire pour afficher le html dans les mails
                $entete  = 'MIME-Version: 1.0' . "\r\n";
                $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $entete .= 'From: ' .$email. "\r\n";

                // le corps du mail
                $message = '<h1>Confirmation de réservation</h1>
                
                <p>Votre inscription à la séance de yoga a bien été enregistrée. Vous retrouverez toutes les informations nécessaires en vous connectant à votre espace personnel.</p>

                <p>S\'il s\'agit d\'une erreur ou si vous souhaitez annuler ultérieurement votre réservation, vous pouvez le faire directement via le planning sur notre site, ou nous contacter au 02 47 66 66 66.</p>

                <p>A bientôt dans notre espace Zentopia !</p>
                <br/><br/>

                <p><b>ZENTOPIA <br/>
                Centre de yoga et de méditation <br/>
                26 rue des Tanneurs, 37000 TOURS <br/>
                02 47 66 66 66 <br/>
                contact@zentopia.fr</b></p>
                ';

                // l'envoi du mail
                $retour = mail($email, 'Confirmation de réservation', $message, $entete);


                echo ('<script>document.location.href="?action=planning&confirmationReservation=true"</script>');
                
            } else {

                // renvoie une erreur SMARTY pour informer que la séance est complète
                $smarty->assign('seancePleine', '<script>alert(\'Il n\'y a plus de places pour ce cours.\')</script>');
            }
        } else{
            $smarty->assign('seanceDejaReserver', '<script>alert(\'Vous avez déjà réservé votre place pour cette séance.\')</script>');
        }
    } else {

        // il faut se connecter pour réserver un cours
        echo ('<script>document.location.href="?action=connexion"</script>');
}
}

// ANNULATION D'UNE RESERVATION (utilisateur)
if(isset($_GET['id_annuler'])) {

    if(isset($_SESSION['id_utilisateur'])){

        // sert à réserver une séance dans la BDD
        $data['id_seance'] = $_GET['id_annuler'];
        $data['id_utilisateur'] = $_SESSION['id_utilisateur'];
        $seance_reservation->DeleteSeance($data);

        // envoi d'un mail de confirmation d'annulation
        $email = $_SESSION['email'];

        // l'en-tête nécessaire pour afficher le html dans les mails
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' .$email. "\r\n";

        // le corps du mail
        $message = '<h1>Confirmation d\'annulation</h1>
        
        <p>Votre annulation de réservation à la séance de yoga a bien été enregistrée. Vous retrouverez toutes les informations nécessaires en vous connectant à votre espace personnel.</p>

        <p>S\'il s\'agit d\'une erreur ou si vous souhaitez vous réinscrire ultérieurement à la séance, vous pouvez le faire directement via le planning sur notre site, ou nous contacter au 02 47 66 66 66.</p>

        <p>A bientôt dans notre espace Zentopia !</p>
        <br/><br/>

        <p><b>ZENTOPIA <br/>
        Centre de yoga et de méditation <br/>
        26 rue des Tanneurs, 37000 TOURS <br/>
        02 47 66 66 66 <br/>
        contact@zentopia.fr</b></p>
        ';

        // l'envoi du mail
        $retour = mail($email, 'Confirmation d\'annulation', $message, $entete);

        echo ('<script>document.location.href="?action=planning&confirmationAnnulation=true"</script>');

    } else {

    // il faut se connecter pour annuler un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}

// AJOUTER UNE SEANCE (admin)
if(isset($_POST['Ajouter_seance'])) {

    // vérifie que c'est bien un admin
    if($_SESSION['rang'] == 'admin') {

        if($seance->VerifDateHeure($_POST['date-seance'], $_POST['heure-debut'], $_POST['heure-fin']) == true) {
            
            // on regarde que le cours est possible d'être set dans les horaires indiqués
            $seance->setDate_seance($_POST['date-seance']);
            $seance->setHeure_debut_seance($_POST['heure-debut']); 
            $seance->setHeure_fin_seance($_POST['heure-fin']);
            $seance->setId_type_de_cours($_POST['nom_type_cours']);
            $seance->setId_professeur($_POST['prenom_professeur']);            
            
            if($seance->VerificationPlageHoraireDispo() == 0) {
                $seance->AddSeance();
                
                $smarty->assign('AjoutOk', 'La séance a bien été ajoutée.');

            } else {

                $smarty->assign('SeanceDejaPrise', 'Il y a déjà une séance de prévue durant cette période.') ;
            }
        } else {
   
            $smarty->assign('DatePerimer', 'Il y a une erreur avec la date ou l\'heure renseignée.') ;
        }

    } else {

        $smarty->assign('RangNonValide', 'Vous n\'avez pas les droits pour cela ou vous avez été déconnecté.e') ;
    }
}

// MODIFIER UNE SEANCE (admin ou modérateur et prof de la seance)
if(isset($_POST['Modif_seance'])) {

    // vérifie que c'est bien un admin ou le professeur
    if($_SESSION['rang'] == 'admin' || $_SESSION['rang'] == 'moderateur' && $professeur->verifProf($_SESSION['id_utilisateur'], $_POST['prenom_professeur'])) {

        // vérifie que les dates renseignées concordent bien (pas de date antérieure, l'heure de début inférieure à l'heure de fin, etc)
        if($seance->VerifDateHeure($_POST['date_seance'], $_POST['heure_debut'], $_POST['heure_fin']) == true) {

            $seance->setId_seance($_POST['id_seance']);
            $seance->setDate_seance($_POST['date_seance']);
            $seance->setHeure_debut_seance($_POST['heure_debut']); 
            $seance->setHeure_fin_seance($_POST['heure_fin']);
            $seance->setId_type_de_cours($_POST['nom_type_cours']);
            $seance->setId_professeur($_POST['prenom_professeur']); 

            // vérifie que le cours est possible dans les horaires donnés
            if($seance->VerificationPlageHoraireDispo($seance->getId_seance()) == 0) {

                $donnees = [
                    'id_seance' => $_POST['id_seance'],
                    'date_seance' => $_POST['date_seance'],
                    'heure_debut_seance' => $_POST['heure_debut'],
                    'heure_fin_seance' => $_POST['heure_fin'],
                    'id_type_de_cours' => $_POST['nom_cours'],
                    'id_professeur' => $_POST['prenom_professeur'],
                ];

                // on modifie la BDD avec le tableau
                $seance->Update($donnees, $_POST['id_seance']);
                $smarty->assign('ModifOk', 'La séance a bien été modifiée, les participant.e.s seront informé.e.s de la modification');

            } else {

                $smarty->assign('SeanceDejaPrise', 'Il y a déjà une séance prévue durant cette période') ;
            }
        } else {
            //Date saisi deja passer
            $smarty->assign('DatePerimer', 'Il y a une erreur avec la date ou l\'heure renseignée.') ;
            }
    }else {
        //Message d'erreur ->Pas le rang d'admin ou pas connecte
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les droits pour cela ou vous avez été déconnecté.e') ;
    }
}


// passe une séance en "annulée" dans la BDD
if(isset($_POST['annuler_seance'])) {

    // vérifie que c'est bien un admin ou le professeur
    if($_SESSION['rang'] == 'admin' || $_SESSION['rang'] == 'moderateur' && $professeur->verifProf($_SESSION['id_utilisateur'], $_POST['id_professeur'])) {
    
        if(isset($_POST['annuler-seance']) ) {
            $donnees['annule'] = '1';
            $seance->Update($donnees, $_POST['id_seance']);
            //echo ('<script>alert("La séance a bien été annulée, les participant.e.s seront informé.e.s de l\'annulation")</script>');
            $smarty->assign('AnnulationOk', 'La séance a bien été annulée, les participant.e.s seront informé.e.s de l\'annulation');
        }
    } else {
    
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les droits pour cela ou vous avez été déconnecté.e') ;
    }
}

// récupère la liste des cours présents dans la BDD et les envoie à SMARTY
$noms_des_cours = $seance->allTypeDeCours();
$prenoms_professeurs = $professeur->prenom_all_professeur();

$smarty->assign('noms_des_cours', $noms_des_cours);
$smarty->assign('prenoms_professeurs', $prenoms_professeurs);

// affichage des séances de la semaine, teste si un filtre est actif ou non
    $filtre = "";

    if (isset($_POST['filtre'])) {
        $filtre = $_POST['nom_cours'];
    }

    // on récupère la date A:M:J
        
    // récuperation des informations dans la BDD et création des la date selon la page demandée
    if ($page == 2) {

        $jourDiff = 7 - date('w');
        $BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+$jourDiff, date("Y"));

    } elseif ($page == 3) {

        $jourDiff = 14 - date('w');
        $BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+$jourDiff, date("Y"));

    } else {

        $BonneDate = NULL;

    }

    //pour test avant le jour J, $BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+10, date("Y"));

    $seances = $seance->getSeance($filtre, $BonneDate);

    // envoie des informations à SMARTY
    $smarty->assign('seances', $seances);


// ajoute une variable pour déterminer la partie "active" de la navbar
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>