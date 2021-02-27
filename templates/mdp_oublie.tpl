<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Connexion - Zentopia</title>

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


		<div class="container connexion-content reinitialisation-block">
			
			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">
					
					<div class="connexion-block">

						<img src="assets/icons/yoga2.png" width="100" height="100" class="yoga2">
						
						<h1>REINITIALISATION DU MOT DE PASSE</h1>

						<p>Veuillez renseigner l'adresse mail liée à votre compte pour recevoir un nouveau mot de passe.</p>

						<form action="" method="post">

							<input type="email" name="email" class="form-control connexion-input" placeholder="Email" value="{if isset($mail)} {$mail} {/if}" required>

							<div class="g-recaptcha col text-center" data-sitekey="6LfjCWoaAAAAAKUoBQRpiTs82acuq1H2hw6KHJfb"></div>

							<input type="hidden" id="recaptchaResponse" name="recaptcha-response">

							{if isset($message_user)}

								<p class="error">{$message_user}</p>

							{/if}

							<button type="submit" name="connexion" class="btn btn-primary btn-red shadow-none">VALIDER</button>

						</form>

					</div>

				</div>

			</div>

		</div>


		<!-- Scroll top + footer -->
		{include file = 'footer.tpl'}
	</body>
</html>