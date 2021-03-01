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
			{include file = 'banner_coordonnees.tpl'}

			<!-- La navbar -->
			{include file = 'navbar.tpl'}

		</header> 

		

		<div class="container connexion-content">
			
			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">
					
					<div class="connexion-block">

						<img src="assets/icons/yoga2.png" width="100" height="100" class="yoga2">
						
						<h1>CONNECTEZ-VOUS</h1>

						{if isset($reinitialisation)}

							<p class="error">Votre mot de passe a bien été réinitialisé. Vous pouvez dès à présent vous connecter avec le nouveau mot de passe que nous vous avons envoyé par mail.</p>

						{/if}

						<form action="" method="post">

							<input type="email" name="email_connexion" class="form-control connexion-input" placeholder="Email" required>
							{if isset($ErrorEMAIL)}
								{$ErrorEMAIL}
							{/if}

							<input type="password" name="password_connexion" class="form-control connexion-input" placeholder="Mot de passe" required>
							{if isset($ErrorMDP)}
								{$ErrorMDP}
							{/if}

							<div class="row">
								
								<div class="col text-right">
									
									<a href="?action=mdp_oublie" class="mdp-oubli">mot de passe oublié ?</a>

								</div>

							</div>

							

							<div class="row">

								<div class="col text-left">

									<input type="checkbox" name="reste_connection" id="stay-connected" value="1">
									<label for="stay-connected">Rester connecté</label>

								</div>

							</div>

							<button type="submit" name="connexion" class="btn btn-primary btn-red shadow-none">SE CONNECTER</button>

						</form>

					</div>

				</div>

			</div>


			<div class="row">
				
				<div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-auto text-center">
					
					<div class="pas-membre-block">
						
						<h1>PAS ENCORE MEMBRE ?</h1>

						<a href="?action=inscription" class="btn btn-primary btn-red shadow-none">NOUS REJOINDRE</a>

					</div>

				</div>

			</div>


		</div>

		<!-- Scroll top + footer -->
		{include file = 'footer.tpl'}
	</body>
</html>