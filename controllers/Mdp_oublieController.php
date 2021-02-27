<?php

// RENVOIE UN MDP ALEATOIRE AU MEMBRE QUI LE SOUHAITE
// vérifie que le formulaire a été envoyé
if (isset($_POST['email'])) {

	// vérifie que le mail renseigné est lié à un compte client
	$mail = $_POST['email'];
	$user = new Utilisateur($dbh);
	$user = $user->getUserByMail($mail);

	// envoie une erreur si ce n'est pas le cas
	if ($user == NULL) {

		$smarty->assign('message_user', 'L\'email renseigné n\'est affilié à aucun compte.');

	} else {

		// pré-rempli le champ avec l'adresse mail (valide) si erreur CAPTCHA du membre
		$smarty->assign('mail', $mail);

		// vérifie si la case CAPTCHA a été cochée
		if ($_POST['g-recaptcha-response'] == '') {

			$smarty->assign('message_user', 'N\'oubliez pas de vérifier que vous n\'êtes pas un robot!');

		} else {

			// si l'email est valide, et le CAPTCHA coché, on vérifie la clé secrète auprès de Google

			$secret = '6LfjCWoaAAAAAC0yKZPjsDzXi-zPWlv33BjdA3mi';
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']); 
			$responseData = json_decode($verifyResponse);


			if ($responseData->success) {

				$new_pass = GenereMdp();
				
				// l'en-tête nécessaire pour afficher le html dans les mails
				$entete  = 'MIME-Version: 1.0' . "\r\n";
		        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		        $entete .= 'From: ' .$mail. "\r\n";

		        // le message de réinitialisation de mdp
		        $message = '<h1>Votre mot de passe a bien été réinitialisé.</h1>
		        <p><b>Nouveau mot de passe : </b>' .$new_pass. '<br></p>
		        <p>Nous vous invitons à choisir un nouveau mot de passe personnalisé lors de votre prochaine connexion.</p><br/><br/>

		        <p><b>ZENTOPIA <br/>
		        Centre de yoga et de méditation <br/>
		        26 rue des Tanneurs, 37000 TOURS <br/>
		        02 47 66 66 66 <br/>
		        contact@zentopia.fr</b></p>
		        ';

		        // l'envoi du mail
				$retour = mail($mail, 'Votre nouveau mot de passe', $message, $entete); 

		        // hash le nouveau mdp et le prépare pour l'envoyer à la BDD
				$new_pass_crypt = password_hash($new_pass, PASSWORD_DEFAULT);
				$data = ['mot_de_passe' => $new_pass_crypt];

				// récupère l'ID du membre
				$id = $user->getId_utilisateur();

				// met à jour mot de passe dans la BDD
				$user = new Utilisateur($dbh);
				$user->Update($data, $id);

				// redirige le membre vers la page de connexion avec un paramètre pour indiquer qu'il vient de réinitialiser son mot de passe
				header('Location: ?action=connexion&reini=true');


			} else {

				header('Location: ?action=index');
			};

		}

	}

}

$smarty->display('templates/mdp_oublie.tpl');

?>