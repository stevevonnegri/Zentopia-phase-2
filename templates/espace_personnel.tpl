<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Espace personnel - Zentopia</title>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		{include file ='head.tpl'}

	</head>
	<body>


		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			<!-- <?php include("banner-coordonnees.php") ?>-->
			{include file = 'banner_coordonnees.tpl'}

			<!-- La navbar -->
			<!-- <?php include("navbar.php") ?> -->
			{include file = 'navbar.tpl'}

		</header> 


		<div class="container espace-content">

			<div class="row">
			
				<div class="col-12 col-md-4 col-lg-3 col-left">

					<div class="menu-left text-center">
						
						<img src="assets/icons/yoga-male.png" class="img-fluid"/>

						<!-- à remplacer par une variable prénom de l'utilisateur -->
						<p>Bonjour {$_SESSION.prenom_utilisateur}</p>

						<a href="?action=espace_personnel" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur -->
						{if !$_SESSION.rang == 'membre'}
						<a href="?action=interface_moderateur" class="btn btn-primary btn-admin shadow-none">MODERATION<i class="fas fa-caret-right text-right"></i></a>
						{/if}

						{if $_SESSION.rang == 'admin'}
						<!-- afficher seulement si admin -->
						<a href="?action=interface_admin" class="btn btn-primary btn-admin shadow-none">ADMINISTRATION<i class="fas fa-caret-right text-right"></i></a>	
						{/if}

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="?action=espace_personnel&deconnexion=true" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<!-- BLOCK COORDONNEES -->
					<div class="block-coordonnees">

						<h1>MES COORDONNEES</h1>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<label for="">Civilité :</label>
								<p class="info-p">{$_SESSION.genre}</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Date de naissance :</label>
								<p class="info-p">{$_SESSION.date_de_naissance}</p>

							</div>
							

						</div>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<label for="">Prénom :</label>
								<p class="info-p">{$_SESSION.prenom_utilisateur}</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Nom :</label>
								<p class="info-p">{$_SESSION.nom_utilisateur}</p>

							</div>
							
						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Email :</label>
								<p class="info-p">{$_SESSION.email}</p>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Téléphone :</label>
								<p class="info-p">{$_SESSION.telephone}</p>

							</div>

						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Code postal :</label>
								<p class="info-p">{$_SESSION.adresse_code_postal}</p>

							</div>

							<div class="col-12 col-lg-6">

								<label for="">Ville :</label>
								<p class="info-p">{$_SESSION.adresse_ville}</p>

							</div>

						</div>

						<div class="row">
							
							<div class="col">
								
								<label for="">Adresse :</label>
								<p class="info-p">{$_SESSION.adresse_rue}</p>

							</div>

							<div class="col">
								
								<legend>Newsletter :</legend>
								
								<p class="info-p">
								{if $_SESSION.newsletter == false}
									Pas encore inscrit
								{else}
									Deja inscrit
								{/if}
								</p>

							</div>

						</div>


						<div class="row">

							<div class="col text-center">
	
								<a href="?action=espace_personnel_form" class="btn btn-primary btn-red shadow-none">MODIFIER MES INFORMATIONS</a>

							</div>

						</div>

						<img src="assets/icons/yoga4.png" class="yoga4" height="100" width="100"/>
						
					</div> <!-- fin div block-coordonnees -->


					<!-- BLOCK CHANGER DE MOT DE PASSE -->
					<form method="POST" action="" class="block-mdp">

						<h1>CHANGER DE MOT DE PASSE</h1>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="mot_de_passe_actuel" placeholder="Mot de passe actuel">
								{if isset($error_mauvais_mot_de_passe)}
									{$error_mauvais_mot_de_passe}
								{/if}

							</div>

						</div>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="new_mot_de_passe" placeholder="Nouveau mot de passe">
								{if isset($error_mot_de_passe_message)}
									{$error_mot_de_passe_message}
								{/if}
							</div>

						</div>

						<div class="row">

							<div class="col text-center">

								<input type="password" class="form-control mx-auto mdp-input" name="new_mot_de_passe_verif" placeholder="Confirmation">
								{if isset($error_verif_mot_de_passe_message)}
									{$error_verif_mot_de_passe_message}
								{/if}
							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
								
								<input type="submit" name="mettre_a_jour" class="btn btn-primary btn-red shadow-none" value="METTRE A JOUR">

							</div>

						</div>

					</form>


					<!-- BLOCK MES COURS -->
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

							<a href="?action=planning" class="btn btn-primary btn-red shadow-none">ACCEDER AU PLANNING</a>

						</div>
						

					</div>


					<!-- BLOCK MON AVIS CLIENT -->
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
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}


	<script>
		
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