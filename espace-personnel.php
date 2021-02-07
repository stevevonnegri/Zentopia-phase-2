<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Espace personnel - Zentopia</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		<meta name="robots" content="nofollow, noindex"/>

		<!-- lien bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>

		<!-- lien CSS -->
		<link rel="stylesheet/less" type="text/css" href="styles.less"/>

		<!-- liens Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"/>

		<!-- liens Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>

		<!-- lien favicon -->
		<link rel="icon" type="image/png" href="assets/icons/yoga-male.png"/>


	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			<?php include("banner-coordonnees.php"); ?>

			<!-- La navbar -->
			<?php include("navbar.php"); ?>

		</header> 


		<div class="container espace-content">

			<div class="row">
			
				<div class="col-12 col-md-4 col-lg-3 col-left">

					<div class="menu-left text-center">
						
						<img src="assets/icons/yoga-male.png" class="img-fluid"/>

						<!-- à remplacer par une variable prénom de l'utilisateur -->
						<p>Bonjour Anaïs</p>

						<a href="espace-personnel.php" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur -->
						<a href="interface-moderateur.php" class="btn btn-primary btn-admin shadow-none">MODERATION<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si admin -->
						<a href="interface-admin.php" class="btn btn-primary btn-admin shadow-none">ADMINISTRATION<i class="fas fa-caret-right text-right"></i></a>	

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<div class="block-coordonnees">

						<h1>MES COORDONNEES</h1>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<label for="">Civilité :</label>
								<p class="info-p">Mme</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Date de naissance :</label>
								<p class="info-p">11/05/1994</p>

							</div>
							

						</div>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<label for="">Prénom :</label>
								<p class="info-p">Anaïs</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Nom :</label>
								<p class="info-p">Bironneau</p>

							</div>
							
						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Email :</label>
								<p class="info-p">monadressemail@gmail.com</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Téléphone :</label>
								<p class="info-p">06 66 66 66 66</p>

							</div>

						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Code postal :</label>
								<p class="info-p">37000</p>

							</div>

							<div class="col-12 col-lg-6">

								<label for="">Ville :</label>
								<p class="info-p">Tours</p>

							</div>

						</div>

						<div class="row">
							
							<div class="col">
								
								<label for="">Adresse :</label>
								<p class="info-p">288bis rue des Acacias, bâtiment B</p>

							</div>

							<div class="col">
								
								<legend>Newsletter :</legend>
								
								<p class="info-p">Pas encore inscrit</p>

							</div>

						</div>


						<div class="row">

							<div class="col text-center">
	
								<a href="espace-personnel-form.php" class="btn btn-primary btn-red shadow-none">MODIFIER MES INFORMATIONS</a>

							</div>

						</div>

						<img src="assets/icons/yoga4.png" class="yoga4" height="100" width="100"/>
						
					</div> <!-- fin div block-coordonnees -->


					<div class="block-mdp">

						<h1>CHANGER DE MOT DE PASSE</h1>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="" placeholder="Mot de passe actuel">

							</div>

						</div>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="" placeholder="Nouveau mot de passe">

							</div>

						</div>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="" placeholder="Confirmation">

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
								
								<input type="submit" name="" class="btn btn-primary btn-red shadow-none" value="METTRE A JOUR">

							</div>

						</div>

						
						

					</div>


					<div class="block-cours text-center row">

						<div class="col">

							<h1 id="mes-cours">MES COURS</h1>

							<!-- affichage par défaut, si le membre n'a pas de réservation active -->
							<!-- <p>Vous n'avez pas encore effectué de réservations sur un cours à venir.</p> -->


							<!-- affichage des cours à venir si le membre a effectué une ou plusieurs réservations -->
							<div class="cours-membre">
								
								<div class="row">

									<div class="col text-left">		

										<p class="cours-date"><i class="fas fa-chevron-right"></i>Lundi 23 mars :</p>

									</div>

									<div class="col text-right">
										
										<a href="#" class="btn btn-primary btn-annuler shadow-none">ANNULER LA RESERVATION</a>

									</div>


								</div>

								<div class="row">

									<div class="col">
										
										<p class="cours-info"><span class="cours-nom">HATHA YOGA</span> avec Marie</p>

									</div>

									<div class="col">
										
										<p class="cours-info">de 8h à 9h15</p>

									</div>

								</div>

							</div>

							<div class="cours-membre">
								
								<div class="row">

									<div class="col text-left">		

										<p class="cours-date"><i class="fas fa-chevron-right"></i>Lundi 23 mars :</p>

									</div>

									<div class="col text-right">
										
										<a href="#" class="btn btn-primary btn-annuler shadow-none">ANNULER LA RESERVATION</a>

									</div>


								</div>

								<div class="row">

									<div class="col">
										
										<p class="cours-info"><span class="cours-nom">HATHA YOGA</span> avec Marie</p>

									</div>

									<div class="col">
										
										<p class="cours-info">de 8h à 9h15</p>

									</div>

								</div>

							</div>

							<a href="planning.php" class="btn btn-primary btn-red shadow-none">ACCEDER AU PLANNING</a>

						</div>
						

					</div>


					<div class="block-avis text-center row">

						<div class="col">

							<h1 id="mon-avis">MON AVIS CLIENT</h1>

							<!-- affichage par défaut, si le membre n'a pas encore écrit d'avis qui a été validé -->
							<!--<p>Vous n'avez pas encore donné votre avis sur notre établissement.</p>

							<a href="#" class="btn btn-primary btn-red shadow-none">ECRIRE MON AVIS</a>-->


							<!-- affichage si le membre a déposé un avis qui est encore en attente de modération -->
							<!--<p>Votre avis est en attente de modération. Il sera consultable ici et sur <a href="la-team.php#testimonial" class="team-link">cette page</a> une fois approuvé.</p> -->


							<!-- affichage si le membre a un avis validé et publié sur le site -->
							<div class="avis-client text-center">

								<p>&laquo; J'adore venir au centre Zentopia méditer après mes parties de jeux vidéos ! Une fois posé au centre de la salle, assis en tailleur, j'oublie tout le stress et la rage que me procurent ces infâmes jeux et je renaît tel un homme nouveau... &raquo;</p>

								<div class="row">
									
									<div class="col">
										
										<img src="assets/icons/fivestar.png" class="avis-stars" width="150" height="36" alt="5 étoiles"/>

									</div>

								</div>

								<p class="suppr-avis" onclick="supprAvis();">Supprimer mon avis</p>

								<div class="hidden" id="suppr-avis-confirmation">

									<p>En cliquant sur le bouton SUPPRIMER ci-dessous, je supprime définitivement mon avis client du site. Il ne sera donc plus consultable dans la liste des avis.</p>
									
									<a href="#" class="btn btn-primary btn-red" >SUPPRIMER</a>

								</div>

							</div> <!-- fin div avis client si membre a écrit un avis -->

						</div>
						
					</div>

					<div class="row suppr-compte-row">
						
						<div class="col-8 mx-auto text-center">
							
							<p class="suppr-compte mx-auto" onclick="supprCompte();">Supprimer mon compte</p>

							<div id="confirmation-suppression" class="hidden">

								<p>Attention, cette action est irrémédiable. Une fois votre compte supprimé, vous ne pourrez plus réserver de séances sans vous inscrire à nouveau.</p>

								<form action="" method="" class="form-check">
									
										<input type="checkbox" name="" id="confirmation-suppression-compte" class="form-check-input">
										<label for="confirmation-suppression-compte" class="form-check-label newsletter-label">En validant cette action, je comprends que les données de mon compte seront définitivement supprimées, et que je ne recevrai plus aucun e-mail de la part de Zentopia. </label>

										<input type="submit" name="" class="btn btn-primary btn-red" value="SUPPRIMER MON COMPTE">

								</form>
								

							</div>

						</div>

					</div>

				</div>

			</div>




		</div>




		






		<!-- Scroll top + footer -->
		<?php include("footer.php"); ?>



	<!-- lien library Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<!-- lien library Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<!-- lien LESS -->
	<script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>

	<!-- lien Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>


	<script>
		
		// SCROLL TOP SCRIPT
		$(window).scroll(function() {
		    if ($(this).scrollTop() >= 200) {        // Si on scroll à + de 200px
		        $('#scroll-top').fadeIn(200);    // faire apparaître
		    } else {
		        $('#scroll-top').fadeOut(200);   // sinon faire disparaître
		    }
		});

		$('#scroll-top').click(function() {      // au clic
		    $('body,html').animate({
		        scrollTop : 0                       // remonter jusqu'en haut
		    }, 500);
		});



		// afficher la confirmation de suppression de l'avis client
		function supprAvis() {

			let x = document.getElementById('suppr-avis-confirmation');
			x.classList.toggle('hidden');
		}	


		// afficher la confirmation de suppression du compte
		function supprCompte() {

			let x = document.getElementById('confirmation-suppression');
			x.classList.toggle('hidden');
		}

		

	</script>

	</body>
</html>