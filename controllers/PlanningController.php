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

//affichage des seance de la semaine
	//teste si un filtre est actif ou non
	$filtre = "";

	if (isset($_POST['filtre'])) {
		$filtre = $_POST['nom_cours'];
	}

	//on recupere la date A:M:J
		
	//recuperation des information dans la BDD
		//pour test avant le jour J, creation de la bonne date :

		$BonneDate  = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y"));

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

        echo ('<script>document.location.href="?action=planning&confirmationAnnulation=true"</script>');

    } else{
    //Il faut se connecter pour annuler un cours
    echo ('<script>document.location.href="?action=connexion"</script>');
    }
}

 //echo 'TU MENTEND ???!!!!';

//Ajouter une seance (admin)
if(isset($_POST['Ajouter_seance'])) {

    //On verifie que c'est bien un admin
    if($_SESSION['rang'] == 'admin') {

        //On regarde de le cours est possible dans les horaires
        $seance->setDate_seance($_POST['']);
        $seance->setHeure_debut_seance($_POST['heure-debut']);
        $seance->setHeure_fin_seance($_POST['heure-fin']);
        $seance->setId_type_de_cours($_POST['id_type_de_cours']);
        $seance->setId_professeur($_POST['id_professeur']);

        echo '<pre>';
        var_dump($seance);
        echo '</pre>';
        //$seance->Add($seance);
       


    }else {
        //Message d'erreur ->Pas le rang d'admin ou pas connecte
        $smarty->assign('RangNonValide', 'Vous n\'avez pas les permissions pour cela ou vous avez était deconnecte') ;
    }
}
    
//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'les_cours');

$smarty->display('templates/planning.tpl');
?>