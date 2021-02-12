<?php
$user = new Utilisateur($dbh);

//traitement des donnée de l'inscription si clic sur le bouton NOUS REJOINDRE
if (isset($_POST['NOUS_REJOINDRE'])) {
	$erreur = false;

	//recuperation des donnée du formulaire sauf le mot de passe que l'on hashra apres.
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
			if (filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {

				//test si l'email est deja dans la BDD

				if ($user->countItemByEmail() != 0) {
					
					$error_email_message = '<p class="error-form">Cet email existe deja, merci de vous connecter (ou cliquer ici pour vous connecter).</p>';
					$erreur = true;

				}

			} else {

				$error_email_message = '<p class="error-form"> format de l\'email invalide.</p>';
				$erreur = true;
				
			}
		//Verifie la validité et que les mot de passe est identique et si oui le hash

			// verifie si le mot de passe est valide (entre 8 et 30 caractères ET avec au moins une lettre et un chiffre)
			if (strlen($_POST['mot_de_passe']) < 8) {
			
				$error_mot_de_passe_message = '<p class="error-form">Votre Mot de passe fait moins de 8 caractères.</p>';
				$erreur = true;

			} elseif (strlen($_POST['mot_de_passe']) > 30) {

				$error_mot_de_passe_message = '<p class="error-form">Votre Mot de passe fait plus de 30 caractères</p>';
				$erreur = true;

			} elseif (!preg_match("/[a-z]+/", $_POST['mot_de_passe'])) {
			 
				$error_mot_de_passe_message = '<p class="error-form">Votre Mot de passe doit inclure au moins une lettre</p>';
				$erreur = true;
				
			} elseif (!preg_match("/[0-9]+/", $_POST['mot_de_passe'])) {
		 
				$error_mot_de_passe_message = '<p class="error-form">Votre Mot de passe doit inclure au moins un chiffre</p>';
				$erreur = true;


			// verifie si les mot de passe sont identique

			} elseif ($_POST['mot_de_passe'] != $_POST['mot_de_passe_verif']) {
			
				$error_verif_mot_de_passe_message = '<p class="error-form">Vos mots de passe ne correspondent pas.</p>';
				$erreur = true;

			} else {

				$user->setMot_de_passe(password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT));

			}


		//verifie que le nom et le prenom n'on pas de charactere speciaux
			//le nom en 1er
			if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getNom_utilisateur())) {

				$error_nom_utilisateur_message = '<p class="error-form">Votre Nom à des caractere non valide.</p>';
				$erreur = true;

			}
			//Ensuite le prenom
			if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $user->getPrenom_utilisateur())) {

				$error_prenom_utilisateur_message = '<p class="error-form">Votre Prénom à des caractere non valide.</p>';
				$erreur = true;

			}

		//verification que l'utilisateur a plus de 18 ans

			//on recupere l'age et on le separe en Jour, Mois, Année
			$date_naissance = date_parse($user->getDate_de_naissance());

			//on recupere la date du jour en mktime,
			//a laquel on retranche 18(notre limite d'age)
			$date_limite = mktime(0, 0, 0, date("m")  , date("d"), date("Y")-18);

			//on convertit date_naissance en mktime
			$date_naissance = mktime(0, 0, 0, $date_naissance["month"] , $date_naissance["day"], $date_naissance["year"]);

			//on formatte les 2 date pour pouvoir les commparer.
			$date_limite = date("Y-m-d", $date_limite);
			$date_naissance = date("Y-m-d", $date_naissance);
			
			//on verifie si l'utilisateur a plus de 18 ans.
			if ($date_naissance > $date_limite) {
				
				$error_date_naissance_message = '<p class="error-form">Vous devez avoir au moins 18 ans pour vous inscrire.</p>';
				$erreur = true;
			}

		//Verification que le code postal fasse bien 5 chiffre.
			if (!preg_match("#^[0-9]{5}$#", $user->getAdresse_code_postal())) {

					$error_Adresse_code_postal_message = '<p class="error-form">Votre code postal doit etre composé de 5 chiffres.</p>';
					$erreur = true;

			}

		//Verification qu'il n'y ai pas de chiffre dans le nom de la ville
			if (preg_match("/[0-9]+/", $user->getAdresse_ville())) {

			 	$error_Adresse_ville_message = '<p class="error-form">Le nom de votre ville ne doit contenir de chiffres.</p>';
					$erreur = true;
			 }

		//Verification du num de tel
			if (!preg_match("#[0-9]{10}$#", $user->getTelephone())) {

			 	$error_telephone_message = '<p class="error-form">Votre numero de téléphone doit contenir au moins 10 chiffres et pas de lettre.</p>';
					$erreur = true;
			 }

	//FIN VERIFICATION

		//si pas d'erreur : envoie de toute les information dans la BDD et redirige vers l'espace personnel.
	if ($erreur === false) {
		$user->AddUtilisateur();

		//ajouter les variable de SESSION ici.
		if ($user->OpenSession() == true) {
			header('Location: ?action=espace_personnel');
		} else {
			echo('Compte crée mais erreur dans l\'ouverture de session.');
		}
	
	} else {

		echo('VOUS AVEZ UNE ERREUR !');
		//on envoie toute les erreur a smary
		$smarty->assign(array(
			'error_email_message' => $error_email_message,
			'error_mot_de_passe_message' => $error_mot_de_passe_message,
			'error_verif_mot_de_passe_message' => $error_verif_mot_de_passe_message,
			'error_nom_utilisateur_message' => $error_nom_utilisateur_message,
			'error_prenom_utilisateur_message' => $error_prenom_utilisateur_message,
			'error_date_naissance_message' => $error_date_naissance_message,
			'error_Adresse_code_postal_message' => $error_Adresse_code_postal_message,
			'error_Adresse_ville_message' => $error_Adresse_ville_message,
			'error_telephone_message' => $error_telephone_message
		));
		
	}
}

$smarty->display('templates/inscription.tpl');
?>