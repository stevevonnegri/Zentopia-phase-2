<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Interface modérateur - Zentopia</title>

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

						<h2>Images de la galerie</h2>

						<div class="galerie-inner">
							
							<div class="row">
								
								<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
									
									<img src="assets/images/slideshow3.jpg" class="img-fluid" />

									<button class="suppr-img">Supprimer</button>

								</div>

								<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
									
									<img src="assets/images/slideshow3.jpg" class="img-fluid" />

									<button class="suppr-img">Supprimer</button>

								</div>

								<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
									
									<img src="assets/images/slideshow3.jpg" class="img-fluid" />

									<button class="suppr-img">Supprimer</button>

								</div>

								<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
									
									<img src="assets/images/slideshow3.jpg" class="img-fluid" />

									<button class="suppr-img">Supprimer</button>

								</div>

							</div>

							

							<div class="row justify-content-center">
							
								<div class="col-12 col-lg-6 text-center">
									
									<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('ajout-img-form');">+ AJOUTER UNE PHOTO</button>

								</div>

							</div>

							<div class="hidden" id="ajout-img-form">
								
								<form method="post" action="interface-mode-gerer-galerie.php">
									
									<input type="file" name="" accept="image/jpeg, image/jpg" required>
									<button type="submit">ENVOYER</button>

								</form>

							</div>

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