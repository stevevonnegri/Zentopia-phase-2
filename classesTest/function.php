<?php
	//smarty
	//require('../libs/Smarty.class.php');
	





	/**
	* Fonction qui verifie si une chaine est bien entre 8 et 30 charactere,
	* et si elle possede bien des chiffres et des lettres.
	*
	*@return <booleen> true si tout se passe bien, renvoie le message d'erreur correspondant dans le cas contraire.
	*
	**/
	function VerifMot_De_PasseConforme($mot_de_passe) {

		if (strlen($mot_de_passe) < 8) {
			
			return '<p class="alert-danger">Votre Mot de passe fait moins de 8 caractères.</p>';
			
		} elseif (strlen($mot_de_passe) > 30) {

			return '<p class="alert-danger">Votre Mot de passe fait plus de 30 caractères</p>';
			
		} elseif (!preg_match("/[a-zA-Z]+/", $mot_de_passe)) {
		 
			return '<p class="alert-danger">Votre Mot de passe doit inclure au moins une lettre</p>';
			
		} elseif (!preg_match("/[0-9]+/", $mot_de_passe)) {
	 
			return '<p class="alert-danger">Votre Mot de passe doit inclure au moins un chiffre</p>';

		} else {

			return true;
		}
		
	}

	/**
	* Fonction qui verifie si une chaine est bien egale a une autre.
	*
	*@return <booleen> false si ce n'est pas le cas, true si il sont identique.
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
	* Fonction qui génère un mot de passe aléatoire.
	*
	*@return <string> de 10 caractères aléatoires contenant des chiffres et des lettres
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