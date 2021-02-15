<?php
	//smarty
	require('libs/Smarty.class.php');
	
	//autoloader
	function chargerClass($class) {
	require('classes/'.$class.'.php');
	}
	spl_autoload_register('chargerClass');



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
			
		} elseif (!preg_match("/[a-z]+/", $mot_de_passe)) {
		 
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
	*@return <booleen> false si ce n'est pas le cas, renvoie le hash du mot de passe dans le cas contraire.
	*
	**/
	function VerifMot_De_PasseIndetique($mot_de_passe, $mot_de_passe_verif) {
		// verifie si les mot de passe sont identique

			if ($mot_de_passe != $mot_de_passe_verif) {
			
				return false;

			} else {

				return password_hash($mot_de_passe, PASSWORD_DEFAULT);
		}
	}
?>