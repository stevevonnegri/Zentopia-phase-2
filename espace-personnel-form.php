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
						<a href="interface-admin.php" class="btn btn-primary btn-admin shadow-none">ADMINISTRATEUR<i class="fas fa-caret-right text-right"></i></a>						

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
		<?php include("footer.php"); ?>



	<!-- lien library Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<!-- lien library Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<!-- lien LESS -->
	<script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>

	<!-- lien Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/script.js"></script>

	</body>
</html>