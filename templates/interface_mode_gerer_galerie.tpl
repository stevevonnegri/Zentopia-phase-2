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

						<a href="?action=espace-personnel.php" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace-personnel.php#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace-personnel.php#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur / admin -->
						<a href="?action=interface-admin.php" class="btn btn-primary btn-admin shadow-none">MODERATION<i class="fas fa-caret-right text-right"></i></a>

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<div class="block-moderation">
						
						<h1>MODERATION</h1>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_mode_avis_client.php" class="btn btn-primary btn-admin shadow-none">GERER LES AVIS CLIENTS</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_mode_gerer_galerie.php" class="btn btn-primary btn-admin shadow-none">GERER LA GALERIE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_mode_rechercher_membre.php" class="btn btn-primary btn-admin shadow-none">RECHERCHER UN MEMBRE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=planning.php" class="btn btn-primary btn-admin shadow-none">ACCEDER AU PLANNING</a>

							</div>

						</div>

						<h2>Images de la galerie</h2>

						<div class="galerie-inner">
							
							<div class="row">

								{foreach from=$imagesAll item="image"}
									<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
										<img src="{Image::GetImageLink(100,$image->getUrl_image())}" class="img-fluid" />
										<a class="suppr-img" href="?action=interface_mode_gerer_galerie&id={$image->getId_image()}&nom={$image->getUrl_image()}">Supprimer</a>
									</div>
								{/foreach}

							</div>

							<!--@TODO Faire une message pour avertir des tailles supprotes par le slider du site -->
							

							<div class="row justify-content-center">
							
								<div class="col-12 col-lg-6 text-center">
								{if isset($errorQuantite)}
									<p>Vous avez déjà plus que 10 photos quand le slider, veuillez en supprimez une pour en rajouter une nouvelle</p>
								{/if}
								{if isset($errorFichier)}
									<p>Une erreur est survenue lors du déplacement du fichier</p>
								{/if}								
								{if isset($errorUpload)}
									<p>Une erreur est survenu lors de l\'upload sur le serveur</p>
								{/if}
								{if isset($errorTaille)}
									<p>L\'image chargée sur le serveur n\'est pas conforme à taille du diaporama. (Merci de choisir une image dont la taille est comprise entre 450px et 550px de hauteur sur 770px de large)</p>
								{/if}
								{if isset($errorSuppr)}
									<p>Une erreur est survenu lors de la suppression sur le serveur</p>
								{/if}
									
									<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('ajout-img-form');">+ AJOUTER UNE PHOTO</button>

								</div>

							</div>

							<div class="hidden" id="ajout-img-form">


								
								<form method="post" enctype="multipart/form-data" action="?action=interface_mode_gerer_galerie">
									
									<input type="file" name="image" accept="image/jpeg, image/jpg" required>
									<input type="submit" name="image_add" value="ENVOYER">

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