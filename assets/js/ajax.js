//FONCTION AJAX


$(document).ready(function() {
	//on compte le nombre d'element qui on la class #form_ajax

	let nb_element = $('.form_ajax').length;

	//on initialise les variable dont on va avoir besoin.
	let partie1;
	let ajaxCours;
	let enseignant;

	

	//pour chaque element on crée un evenement ajax.
	for (let i = 0; i < nb_element ; i++) {
		//variable utiliser pour concatener i.
		partie1 = '#ajaxCours-';
		ajaxCours = partie1.concat(i);
		

		//si la value de #ajaxCours change
		$(ajaxCours).change(function () {
			//execute la requete ajax (methode post) suivante :
			$.post(
				//nom du fichier cible
				'/zentopia-phase-2/assets/requeteAJAX/enseignant.php',
				//tableau de donnée a envoyer (ici la nouvelle valeur de #ajaxCours et du compteur de boucle).
				{
					id_type_de_cours : $(this).val(),
					cmpt : i
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
			//on concatene enseignant et la variable i
			partie1 = '#enseignant-';
			enseignant = partie1.concat(i);

			$(enseignant).replaceWith(code_html);

		}

	}
	
	
});