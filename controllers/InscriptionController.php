<?php
$user = new Utilisateur($dbh);

// traitement des données de l'inscription si clic sur le bouton "NOUS REJOINDRE"
if (isset($_POST['NOUS_REJOINDRE'])) {
	$erreur = false;

	// récuperation des données du formulaire sauf le mot de passe que l'on hashera apres
	$user->setEmail($_POST['email']);
	$user->setGenre($_POST['genre']);
	$user->setPrenom_utilisateur($_POST['prenom']);
	$user->setNom_utilisateur($_POST['nom']);
	$user->setDate_de_naissance($_POST['date_de_naissance']);
	$user->setAdresse_rue(htmlspecialchars($_POST['adresse_rue']));
	$user->setAdresse_code_postal($_POST['adresse_code_postal']);
	$user->setAdresse_ville(htmlspecialchars($_POST['adresse_ville']));
	$user->setTelephone($_POST['telephone']);
	$user->setNewsletter($_POST['newsletter']);


	// ETAPE VERIFIACTION
	// vérification de l'email
	$error_email_message = $user->EmailBonFormat();

	// vérification du mdp
	$verif = VerifMot_De_PasseConforme($_POST['mot_de_passe']);

	if ($verif !== true ) {

		$error_mot_de_passe_message = $verif;
		$erreur = true;
	}
	
	// vérifie si les mots de passe sont identiques
	$verif = VerifMot_De_PasseIndetique($_POST['mot_de_passe'], $_POST['mot_de_passe_verif']);

	if ($verif === false) {

		$error_verif_mot_de_passe_message = '<p class="error">Les mots de passe ne correspondent pas.</p>';

	} else {

		$user->setMot_de_passe($_POST['mot_de_passe']);
	}

	// vérifie que le nom et le prénom ne comportent pas de caractères spéciaux
	// le nom en premier
	if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getNom_utilisateur())) {

		$error_nom_utilisateur_message = '<p class="error">Le nom renseigné comporte des caractères non valides.</p>';
		$erreur = true;

	} 

	// ensuite le prénom
	if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getPrenom_utilisateur())) {

		$error_prenom_utilisateur_message = '<p class="error">Le prénom renseigné comporte des caractères non valides.</p>';
		$erreur = true;

	}


	// vérifie que l'utilisateur a plus de 18 ans
	if ($user->VerifPlusDe18ans()) {
		
		$error_date_naissance_message = '<p class="error">Vous devez avoir au moins 18 ans pour vous inscrire.</p>';

	} else {

		$error_date_naissance_message = 'ok';

	}

	// vérifie que le code postal fait bien 5 chiffres
	if (!preg_match("#^[0-9]{5}$#", $user->getAdresse_code_postal())) {

			$error_Adresse_code_postal_message = '<p class="error">Votre code postal doit etre composé de 5 chiffres.</p>';
			$erreur = true;

	}

	// vérifie qu'il n'y ait pas de chiffre dans le nom de la ville
	if (preg_match("/[0-9]+/", $user->getAdresse_ville())) {

	 	$error_Adresse_ville_message = '<p class="error">Le nom de votre ville ne doit pas contenir de chiffres.</p>';
			$erreur = true;
	 }

	// vérifie le num de tel
	if (!preg_match("#(0|\+33|0033)[1-9][0-9]{8}#", $user->getTelephone())) {

	 	$error_telephone_message = '<p class="error">Votre numero de téléphone doit contenir au moins 10 chiffres et pas de lettre.</p>';
			$erreur = true;
	}

	
	// FIN VERIFICATION
	// si pas d'erreur : envoi de toute les informations dans la BDD et redirection vers l'espace personnel
	if ($erreur === false AND $error_email_message === 'ok' AND $error_date_naissance_message === 'ok') {

		//on hash le mot de passe avant de l'envoyer vers la BDD
		$mdp = $user->getMot_de_passe();

		$user->setMot_de_passe(password_hash($mdp, PASSWORD_DEFAULT));
		$user->AddUtilisateur();


		// envoi d'un mail de confirmation d'inscription
		$email = $_POST['email'];

		// l'en-tête nécessaire pour afficher le html dans les mails
		$entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' .$email. "\r\n";

        // le message de réinitialisation de mdp
        $message = '<h1>Bienvenue dans la communauté Zentopia !</h1>
        
        <p>Vous faites désormais partie de la famille Zentopia. Vous pouvez dès à présent vous connecter sur notre site avec vos identifiants et profiter de tous les avantages membre.</p><br/><br/>

        <p><b>ZENTOPIA <br/>
        Centre de yoga et de méditation <br/>
        26 rue des Tanneurs, 37000 TOURS <br/>
        02 47 66 66 66 <br/>
        contact@zentopia.fr</b></p>
        ';

        // l'envoi du mail
		$retour = mail($email, 'Bienvenue dans la communauté Zentopia !', $message, $entete);


		// on remet le mot de passe non hash dans l'objet user pour le mettre en variable de session
		$user->setMot_de_passe($mdp);
		
		// ajout des variables de SESSION 
		if ($user->OpenSession() == true) {
			header('Location: ?action=espace_personnel');
		} else {
			echo('<p class="center error">La session n\'a pu être créée.</p>');
		}
	
	} else {

		if ($error_email_message !== 'ok') {
			$smarty->assign('error_email_message', $error_email_message);
		}

		if ($error_date_naissance_message !== 'ok') {
			$smarty->assign('error_date_naissance_message', $error_date_naissance_message);
		}
		
		// on envoie toutes les erreusr à SMARTY
		$smarty->assign(array(
			'error_mot_de_passe_message' => $error_mot_de_passe_message,
			'error_verif_mot_de_passe_message' => $error_verif_mot_de_passe_message,
			'error_nom_utilisateur_message' => $error_nom_utilisateur_message,
			'error_prenom_utilisateur_message' => $error_prenom_utilisateur_message,
			'error_Adresse_code_postal_message' => $error_Adresse_code_postal_message,
			'error_Adresse_ville_message' => $error_Adresse_ville_message,
			'error_telephone_message' => $error_telephone_message
		));
		
	}
}

$smarty->display('templates/inscription.tpl');
?>