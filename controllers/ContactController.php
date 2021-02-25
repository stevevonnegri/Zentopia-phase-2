<?php

if (isset($_SESSION['id_utilisateur'])) {

	$nom = $_SESSION['prenom_utilisateur']. ' ' .$_SESSION['nom_utilisateur'];
	$email = $_SESSION['email'];
	$tel = $_SESSION['telephone'];

	$smarty->assign(array(
	'nom' => $nom,
	'email' => $email,
	'tel' => $tel
	));

}

// si le formulaire de contact a bien été envoyé
if (isset($_POST['message'])) {

	// vérifier les informations envoyées par l'utilisateur
	if (!preg_match("/^[a-zéèêëïüA-Z-' ]*$/", $_POST['nom']) OR (strlen($_POST['nom']) > 50)) {

		$smarty->assign('champ_invalide', 'Le nom renseigné n\'est pas valide.');

	} elseif (!preg_match("#(0|\+33|0033)[1-9][0-9]{8}#", $_POST['tel'])) {

		$smarty->assign('alert_user', 'Le numéro de téléphone renseigné n\'est pas valide.');
		
	} else {

		// push les données vérifiées dans des variables
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$sujet = htmlspecialchars($_POST['sujet']);
		$tel = $_POST['tel']; 
		$contenu = htmlspecialchars($_POST['message']); 

		// l'en-tête nécessaire pour afficher le html dans les mails
		$entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: ' .$email. "\r\n";

        // le message de contact destiné à l'admin
        $message = '<h1>Vous avez un nouveau message de contact venant de Zentopia.fr</h1>
        <p><b>Nom : </b>' .$nom. '<br>
        <b>Email : </b>' .$email. '<br>
        <b>Tel : </b>' .$tel. '<br>
        <b>Sujet : </b>' .$sujet. '<br>
        <b>Message : </b>' .$contenu. '</p>';

        // le message accusé de réception destiné à l'expéditeur
        $message_user = '<h1>Accusé de réception d\'un message de contact: </h1>
        <p><b>Nom : </b>' .$nom. '<br>
        <b>Email : </b>' .$email. '<br>
        <b>Tel : </b>' .$tel. '<br>
        <b>Sujet : </b>' .$sujet. '<br>
        <b>Message : </b>' .$contenu. '</p>';

        // l'envoi des deux mails
		$retour = mail('anais.bironneau@gmail.com', 'Envoi depuis la page Contact de Zentopia', $message, $entete);
		$accuse_reception = mail($email, 'Votre message de contact a bien été envoyé', $message_user, $entete); 

		$smarty->assign('alert_user', 'Votre message a bien été envoyé.');
	}

	
}

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'contact');

$smarty->display('templates/contact.tpl');
?>