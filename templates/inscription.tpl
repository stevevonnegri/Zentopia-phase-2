<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Inscription - Zentopia</title>

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


		<div class="container inscription-content">
			
			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">

					<div class="inscription-block">

						<img src="assets/icons/medit2.png" width="65" height="65" class="medit2"/>
					
						<h1>CREEZ VOTRE COMPTE</h1>

						<form method="POST" action="#">
							
							<legend>VOS IDENTIFIANTS</legend>

							<input type="email" name="email" class="inscription-input form-control" placeholder="Email">

							<input type="password" name="mot_de_passe" class="inscription-input form-control" placeholder="Mot de passe">

							<input type="password" name="_mot_de_passe_verif" class="inscription-input form-control" placeholder="Confirmation">


							<legend>VOS INFORMATIONS PERSONNELLES</legend>

							<div class="form-check form-check-inline inscription-radio">

								<input type="radio" name="genre" id="femme" value="Femme" class="form-check-input" required>
								<label for="femme" class="form-check-label">Mme</label>

							</div>

							<div class="form-check form-check-inline inscription-radio">

								<input type="radio" name="genre" id="homme" class="form-check-input" value="Homme">
								<label for="homme" class="form-check-label">Mr</label>

							</div>

							<input type="text" name="prenom" class="inscription-input form-control" placeholder="Prénom">

							<input type="text" name="nom" class="inscription-input form-control" placeholder="Nom">

							<input type="date" name="date_de_naissance" class="inscription-input form-control">


							<legend>VOS COORDONNEES</legend>

							<textarea class="inscription-input form-control" placeholder="Adresse (rue)" name="adresse_rue"></textarea>

							<input type="number" name="adresse_code_postal" class="inscription-input form-control" placeholder="Code postal">

							<input type="text" name="adresse_ville" class="inscription-input form-control" placeholder="Ville">

							<input type="tel" name="telephone" class="inscription-input form-control" placeholder="Téléphone">

							<div class="form-check">

								<input type="checkbox" name="newsletter" id="newsletter-inscription" class="form-check-input">
								<label for="newsletter-inscription" class="form-check-label newsletter-label">J'accepte de recevoir les actualités de Zentopia par mail, à hauteur d'un ou deux par mois. </label>

							</div>

							<input type="submit" name="NOUS_REJOINDRE" value="NOUS REJOINDRE" class="btn btn-primary btn-red">

						</form>

					</div>
					
				</div>

				<p class="rgpd text-center mx-auto">Zentopia s'engage à garder vos informations personnelles strictement confidentielles. En vous inscrivant, vous reconnaissez avoir pris connaissance de notre <a href="?action=mentions_legales">politique de confidentialité</a> (traitement et utilisation des données). Vous pouvez vous désabonner de notre newsletter à tout moment dans votre espace personnel ou en cliquant sur les liens situés en bas de nos e-mails.</p>


			</div>

		</div>

		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	</body>
</html>