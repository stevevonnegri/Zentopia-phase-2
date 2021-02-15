<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Interface administrateur - Zentopia</title>

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
						<p>Bonjour Anaïs</p>

						<a href="espace-personnel.php" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="espace-personnel.php#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="espace-personnel.php#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur / admin -->
						<a href="interface-admin.php" class="btn btn-primary btn-admin shadow-none">MODERATION<i class="fas fa-caret-right text-right"></i></a>

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<div class="block-moderation">
						
						<h1>MODERATION</h1>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="interface-mode-avis-client.php" class="btn btn-primary btn-admin shadow-none">GERER LES AVIS CLIENTS</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="interface-mode-gerer-galerie.php" class="btn btn-primary btn-admin shadow-none">GERER LA GALERIE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="interface-mode-rechercher-membre.php" class="btn btn-primary btn-admin shadow-none">RECHERCHER UN MEMBRE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="planning.php" class="btn btn-primary btn-admin shadow-none">ACCEDER AU PLANNING</a>

							</div>

						</div>

						<h2>Rechercher un membre</h2>

						<form method="post" action="" class="form-recherche">

							<legend>Spécifiez au moins un critère de recherche :</legend>

							<div class="form-row">
								
								<div class="col-12 col-lg">
									
									<input type="text" name="nom" placeholder="Nom" class="form-control input-membre">

								</div>

								<div class="col-12 col-lg">
									
									<input type="text" name="prenom" placeholder="Prénom" class="form-control input-membre">

								</div>

								<div class="col-12 col-lg">
									
									<input type="telephone" name="telephone" placeholder="Téléphone" class="form-control input-membre">

								</div>

								<div class="col">
									
									<select name="rang" class="form-control">
										
										<option value="">--Rang--</option>
										<option value="membre">Membre</option>
										<option value="moderateur">Modérateur</option>
										<option value="admin">Admin</option>

									</select>

								</div>

							</div>


							<div class="row">
								
								<div class="col text-center">
									
									<button type="submit" class="btn btn-primary btn-red text-center">RECHERCHER</button>

								</div>

							</div>	

						</form>

						<div class="resultat-recherche">

							<p>Résultat de la recherche :</p>
							
							<!-- à afficher lorsque la recherche ne retourne aucun résultat -->
							<!--<p class="text-center">Aucun membre trouvé. Veuillez vérifier les informations de recherche.</p>-->

							<!-- à afficher lorsque la recherche retourne des éléments de la BDD -->
							<div class="membre-trouve">

								<div class="row">
									
									<div class="col-12 col-lg">
										
										<span>Nom :</span> Bironneau

									</div>

									<div class="col-12 col-lg">
										
										<span>Prénom :</span> Anaïs

									</div>

								</div>

								<div class="row">
									
									<div class="col-12 col-lg">
										
										<span>E-mail :</span> monadressemail@gmail.com

									</div>

									<div class="col-12 col-lg">
										
										<span>Téléphone :</span> 0677777777

									</div>

								</div>

								<div class="row">
									
									<div class="col-12 col-lg">
										
										<span>Genre :</span> Femme

									</div>

									<div class="col-12 col-lg">
										
										<span>Date de naissance :</span> 11/05/1994

									</div>

								</div>

								<div class="row">
									
									<div class="col-12 col-lg">
										
										<span>Adresse (rue) :</span> 9 rue des Roses

									</div>

									<div class="col-12 col-lg">
										
										<span>Code postal :</span> 37000

									</div>

								</div>

								<div class="row">
									
									<div class="col-12 col-lg">
										
										<span>Ville :</span> Tours

									</div>

									<div class="col-12 col-lg">
										
										<span>Rang :</span> Membre

									</div>

									

								</div>

								<div class="row row-btn">
										
									<div class="col-12 col-lg text-center">
										
										<a href="interface-admin-modif-membre.php" class="btn btn-primary btn-admin shadow-none">MODIFIER</a>

									</div>

									<div class="col-12 col-lg text-center">
										
										<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('confirmation-suppr-membre');">SUPPRIMER LE MEMBRE</button>

									</div>

								</div>

								<!-- confirmation de suppression du compte du membre, ne s'affiche qu'au clic de l'admin sur le bouton supprimer compte -->
								<div id="confirmation-suppr-membre" class="hidden">

									<p>Attention, cette action est irrémédiable. Une fois le compte supprimé, vous ne pourrez plus le récupérer.</p>

									<form action="" method="" class="form-check">
										
										<input type="checkbox" name="" class="form-check-input">
										<label for="confirmation-suppression-compte" class="form-check-label">Je souhaite supprimer définitivement ce compte. </label>

										<div class="row justify-content-center">

											<div class="row text-center">
												
												<input type="submit" name="" class="btn btn-primary btn-red" value="SUPPRIMER LE COMPTE">

											</div>

										</div>

									</form>
								
								</div>



							</div> <!-- fin div élément trouvé -->

						</div>
						
					</div> <!-- fin block modération -->

				</div>

			</div>

		</div>

		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	</body>
</html>