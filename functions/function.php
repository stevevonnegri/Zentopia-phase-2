<?php

// récupère les fichiers dont SMARTY a besoin pour fonctionner
require('libs/Smarty.class.php');

/**
* Fonction "chargerClass"
* autoloader permettant de charger les classes lorsqu'on en a besoin
*
*/
function chargerClass($class) {
require('classes/'.$class.'.php');
}
spl_autoload_register('chargerClass');


/**
* Fonction "VerifMot_De_PasseConforme"
* vérifie si un string est bien entre 8 et 30 caractères, et s'il possède bien des chiffres et des lettres
*
* @param $mot_de_passe : le mdp que l'on souhaite valider
*
*@return true si tout se passe bien, renvoie le message d'erreur correspondant dans le cas contraire
*
**/
function VerifMot_De_PasseConforme($mot_de_passe) {

	if (strlen($mot_de_passe) < 8) {
		
		return '<p class="error">Votre mot de passe fait moins de 8 caractères.</p>';
		
	} elseif (strlen($mot_de_passe) > 30) {

		return '<p class="error">Votre mot de passe fait plus de 30 caractères.</p>';
		
	} elseif (!preg_match("/[a-zA-Z]+/", $mot_de_passe)) {
	 
		return '<p class="error">Votre mot de passe doit inclure au moins une lettre.</p>';
		
	} elseif (!preg_match("/[0-9]+/", $mot_de_passe)) {
 
		return '<p class="error">Votre mot de passe doit inclure au moins un chiffre.</p>';

	} else {

		return true;
	}
	
}

/**
* Fonction "VerifMot_De_PasseIndetique"
* vérifie si une chaine est bien égale a une autre
*
* @param $mot_de_passe : le premier mdp que l'on souhaite comparer
* @param $mot_de_passe_verif : le second mdp que l'on souhaite comparer
*
*@return false si ce n'est pas le cas, true s'ils sont identiques
*
**/
function VerifMot_De_PasseIndetique($mot_de_passe, $mot_de_passe_verif) {
	// verifie si les mot de passe sont identique

		if ($mot_de_passe != $mot_de_passe_verif) {
		
			return false;

		} else {

			return true;
	}
}


/**
* Fonction GenreMdp
* génère un mot de passe aléatoire
*
* @param $length : initialisé à 10 par défaut
*
*@return un string de 10 caractères aléatoires contenant des chiffres et des lettres
*
**/
function GenereMdp($length = 10) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}


?>