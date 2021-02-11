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
			{include file = 'banner-coordonnees.tpl'}

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

						<a href="?action=espace_personnel" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur -->
						<a href="?action=interface_moderateur" class="btn btn-primary btn-admin shadow-none">MODERATION<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si admin -->
						<a href="?action=interface_admin" class="btn btn-primary btn-admin shadow-none">ADMINISTRATEUR<i class="fas fa-caret-right text-right"></i></a>						

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<form class="block-coordonnees" action="#" method="#">

						<h1>MES COORDONNEES</h1>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<legend>Civilité :</legend>

								<input type="radio" name="genre" id="femme" value="Mme" required>
								<label for="femme">Mme</label>

								<input type="radio" name="genre" id="homme" value="Mr">
								<label for="homme">Mr</label>

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Date de naissance :</label>
								<input type="date" name="" class="form-control">

							</div>
							

						</div>

						<div class="row">

							<div class="col-12 col-lg-6">
								
								<label for="">Prénom :</label>
								<input type="text" name="" class="form-control">

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Nom :</label>
								<input type="text" name="" class="form-control">

							</div>
							
						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Email :</label>
								<input type="email" name="" class="form-control">

							</div>

							<div class="col-12 col-lg-6">
								
								<label for="">Téléphone :</label>
								<input type="tel" name="" class="form-control">

							</div>

						</div>

						<div class="row">
							
							<div class="col-12 col-lg-6">
								
								<label for="">Code postal :</label>
								<input type="number" name="" class="form-control">

							</div>

							<div class="col-12 col-lg-6">

								<label for="">Ville :</label>
								<input type="text" name="" class="form-control">

							</div>

						</div>

						<div class="row align-items-center">
							
							<div class="col">
								
								<label for="">Adresse :</label>
								<input type="text" name="" class="form-control">

							</div>

							<div class="col">
								
								<legend>Newsletter :</legend>

								<!-- si le membre n'est pas encore inscrit à la newsletter on lui propose de le faire -->
								<!-- <input type="checkbox" name="" id="newsletter">
								<label for="newsletter">Je souhaite m'inscrire à la newsletter</label> -->

								<!-- si le membre est déjà inscrit à la newsletter, il peut s'en désabonner -->
								<input type="checkbox" name="" id="newsletter">
								<label for="newsletter">Je souhaite me désinscrire de la newsletter</label>

							</div>

						</div>

						<div class="row">

							<div class="col text-center">
	
								<input type="submit" class="btn btn-primary btn-red shadow-none" value="VALIDER">

							</div>

						</div>

						<img src="assets/icons/yoga4.png" class="yoga4" height="100" width="100"/>
						
					</form> <!-- fin div block-coordonnees -->

					<!-- le reste des rubriques n'est pas display puisqu'on pourra inclure seulement la partie du formulaire avec le POO et l'architecture MVC -->

				</div>

			</div>




		</div>




		






		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	</body>
</html>