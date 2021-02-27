//FONCTION AJAX


$(document).ready(function() {
	//si la value de #ajaxCours change
	$('#ajaxCours').change(function () {
		//execute la requete ajax (methode post) suivante :

		$.post(
			//nom du fichier cible
			'/zentopia-phase-2/assets/requeteAJAX/enseignant.php',
			//tableau de donnée a envoyer (ici la nouvelle valeur de #ajaxCours).
			{
				id_type_de_cours : $('#ajaxCours').val()
			},
			//le nom de la fonction qui gere le retour
			ajaxResult,
			//le format de données recue.
			'html'
		);


	});

	/**
	 * recupere un code html change le select #enseignant.
	 *
	 * @param      code html recue par ajax.
	 */
	function ajaxResult(code_html) {
		
		$('#enseignant').replaceWith(code_html);

	}

});