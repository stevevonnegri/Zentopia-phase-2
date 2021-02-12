<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Inscription - Zentopia</title>
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


		<div class="container inscription-content">
			
			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">

					<div class="inscription-block">

						<img src="assets/icons/medit2.png" width="65" height="65" class="medit2"/>
					
						<h1>CREEZ VOTRE COMPTE</h1>

						<form method="" action="">
							
							<legend>VOS IDENTIFIANTS</legend>

							<input type="email" name="" class="inscription-input form-control" placeholder="Email">

							<input type="password" name="" class="inscription-input form-control" placeholder="Mot de passe">

							<input type="password" name="" class="inscription-input form-control" placeholder="Confirmation">


							<legend>VOS INFORMATIONS PERSONNELLES</legend>

							<div class="form-check form-check-inline inscription-radio">

								<input type="radio" name="genre" id="femme" value="Mme" class="form-check-input" required>
								<label for="femme" class="form-check-label">Mme</label>

							</div>

							<div class="form-check form-check-inline inscription-radio">

								<input type="radio" name="genre" id="homme" class="form-check-input" value="Mr">
								<label for="homme" class="form-check-label">Mr</label>

							</div>

							<input type="text" name="" class="inscription-input form-control" placeholder="Prénom">

							<input type="text" name="" class="inscription-input form-control" placeholder="Nom">

							<input type="date" name="" class="inscription-input form-control" placeholder="dklskd">


							<legend>VOS COORDONNEES</legend>

							<textarea class="inscription-input form-control" placeholder="Adresse (rue)"></textarea>

							<input type="number" name="" class="inscription-input form-control" placeholder="Code postal">

							<input type="text" name="" class="inscription-input form-control" placeholder="Ville">

							<input type="tel" name="" class="inscription-input form-control" placeholder="Téléphone">

							<div class="form-check">

								<input type="checkbox" name="" id="newsletter-inscription" class="form-check-input">
								<label for="newsletter-inscription" class="form-check-label newsletter-label">J'accepte de recevoir les actualités de Zentopia par mail, à hauteur d'un ou deux par mois. </label>

							</div>

							<input type="submit" name="" value="NOUS REJOINDRE" class="btn btn-primary btn-red">

						</form>

					</div>
					
				</div>

				<p class="rgpd text-center mx-auto">Zentopia s'engage à garder vos informations personnelles strictement confidentielles. En vous inscrivant, vous reconnaissez avoir pris connaissance de notre <a href="#">politique de confidentialité</a> (traitement et utilisation des données). Vous pouvez vous désabonner de notre newsletter à tout moment dans votre espace personnel ou en cliquant sur les liens situés en bas de nos e-mails.</p>


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