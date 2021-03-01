<?php
$user = new Utilisateur($dbh);

//traitement des donnée de l'inscription si clic sur le bouton NOUS REJOINDRE
if (isset($_POST['NOUS_REJOINDRE'])) {
	$erreur = false;

	//recuperation des donnée du formulaire sauf le mot de passe que l'on hashera apres.
	$user->setEmail($_POST['email']);

	$user->setGenre($_POST['genre']);
	$user->setPrenom_utilisateur($_POST['prenom']);
	$user->setNom_utilisateur($_POST['nom']);
	$user->setDate_de_naissance($_POST['date_de_naissance']);
	$user->setAdresse_rue($_POST['adresse_rue']);
	$user->setAdresse_code_postal($_POST['adresse_code_postal']);
	$user->setAdresse_ville($_POST['adresse_ville']);
	$user->setTelephone($_POST['telephone']);
	$user->setNewsletter($_POST['newsletter']);

	//ETAPE VERIFIACTION
		//verification de l'email
			//email au bon format
			
			$error_email_message = $user->EmailBonFormat();

		//Verifie la validité et que les mot de passe est identique et si oui le hash

			// verifie si le mot de passe est valide (entre 8 et 30 caractères ET avec au moins une lettre et un chiffre)

			$verif = VerifMot_De_PasseConforme($_POST['mot_de_passe']);

			if ($verif !== true ) {

				$error_mot_de_passe_message = $verif;
				$erreur = true;
			}
			
			//verifie si les mot de passe sont identique

			$verif = VerifMot_De_PasseIndetique($_POST['mot_de_passe'], $_POST['mot_de_passe_verif']);

			if ($verif === false) {

				$error_verif_mot_de_passe_message = '<p class="alert-danger">Vos mots de passe ne correspondent pas.</p>';

			} else {

				$user->setMot_de_passe($_POST['mot_de_passe']);
			}


		//verifie que le nom et le prenom n'on pas de charactere speciaux
			//le nom en 1er
			if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getNom_utilisateur())) {

				$error_nom_utilisateur_message = '<p class="alert-danger">Votre Nom à des caractere non valide.</p>';
				$erreur = true;

			}
			//Ensuite le prenom
			if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getPrenom_utilisateur())) {

				$error_prenom_utilisateur_message = '<p class="alert-danger">Votre Prénom à des caractere non valide.</p>';
				$erreur = true;

			}

		//verification que l'utilisateur a plus de 18 ans
			
			if ($user->VerifPlusDe18ans()) {
				
				$error_date_naissance_message = '<p class="alert-danger">Vous devez avoir au moins 18 ans pour vous inscrire.</p>';

			} else {

				$error_date_naissance_message = 'ok';

			}

		//Verification que le code postal fasse bien 5 chiffre.
			if (!preg_match("#^[0-9]{5}$#", $user->getAdresse_code_postal())) {

					$error_Adresse_code_postal_message = '<p class="alert-danger">Votre code postal doit etre composé de 5 chiffres.</p>';
					$erreur = true;

			}

		//Verification qu'il n'y ai pas de chiffre dans le nom de la ville
			if (preg_match("/[0-9]+/", $user->getAdresse_ville())) {

			 	$error_Adresse_ville_message = '<p class="alert-danger">Le nom de votre ville ne doit contenir de chiffres.</p>';
					$erreur = true;
			 }

		//Verification du num de tel
			if (!preg_match("#(0|\+33|0033)[1-9][0-9]{8}#", $user->getTelephone())) {

			 	$error_telephone_message = '<p class="alert-danger">Votre numero de téléphone doit contenir au moins 10 chiffres et pas de lettre.</p>';
					$erreur = true;
			 }

	//FIN VERIFICATION

		//si pas d'erreur : envoie de toute les information dans la BDD et redirige vers l'espace personnel.
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




		//on remet le mot de passe non hash dans l'objet user pour le mettre en variable de session.
		$user->setMot_de_passe($mdp);
		
		//ajouter les variable de SESSION ici.
		if ($user->OpenSession() == true) {
			header('Location: ?action=espace_personnel');
		} else {
			echo('<p class="center alert-danger">Compte crée mais erreur dans l\'ouverture de session.</p>');
		}
	
	} else {

		if ($error_email_message !== 'ok') {
			$smarty->assign('error_email_message', $error_email_message);
		}

		if ($error_date_naissance_message !== 'ok') {
			$smarty->assign('error_date_naissance_message', $error_date_naissance_message);
		}
		
		//on envoie toute les erreur a smary
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