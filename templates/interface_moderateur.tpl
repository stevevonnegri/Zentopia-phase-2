<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>
		{if $_SESSION.rang == 'moderateur'}
		Interface modérateur - Zentopia
		{/if}

		{if $_SESSION.rang == 'admin'}
		Interface administrateur - Zentopia
		{/if}
		</title>

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

						<a href="?action=espace_personnel" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace_personnel#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace_personnel#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur / admin -->
						<a href="?action=interface_moderateur" class="btn btn-primary btn-admin shadow-none">

							{if $_SESSION.rang == 'moderateur'}
							MODERATION
							{/if}

							{if $_SESSION.rang == 'admin'}
							ADMINISTRATION
							{/if}							
							

							<i class="fas fa-caret-right text-right"></i></a>

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="?action=interface_moderateur&deconnexion=true" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<div class="block-moderation">
						
						<h1>

						{if $_SESSION.rang == 'moderateur'}
						MODERATION
						{/if}

						{if $_SESSION.rang == 'admin'}
						ADMINISTRATION
						{/if}

						</h1>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_moderateur&amp;avis=true" class="btn btn-primary btn-admin shadow-none">GERER LES AVIS CLIENTS</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="#" class="btn btn-primary btn-admin shadow-none">GERER LA GALERIE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="#" class="btn btn-primary btn-admin shadow-none">

									{if $_SESSION.rang == 'admin'}
									GERER LES MEMBRES
									{/if}

									{if $_SESSION.rang == 'moderateur'}
									RECHERCHER UN MEMBRE
									{/if}

									</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="#" class="btn btn-primary btn-admin shadow-none">ACCEDER AU PLANNING</a>

							</div>

						</div>

					


						<!-- BLOC AVIS CLIENT -->
						<!-- apparaît si le modé/admin a cliqué sur "Gérer les avis client"-->
						{if isset($gerer_avis)}

							<h2>Gérer les avis clients</h2>


							<!-- à afficher s'il y a des avis en attente de modération-->
							{if isset($avis_en_attente)}
							<p>Avis en attente de modération :</p>

							{foreach from=$avis_en_attente item=avis}
							<div class="avis-client">

								<div class="avis-client-inner">
									
									<p>Auteur : {$avis.prenom_utilisateur}, x ans</p>
									<p>Note : {$avis.niveau_avis}/5</p>
									<p>Avis : {$avis.contenu_avis}</p>

								</div>

								<div class="row justify-content-start">
									
									<div class="col-6 col-lg-3">

										<button class="btn btn-primary btn-admin shadow-none">VALIDER</button>

									</div>

									<div class="col-6 col-lg-3">
										
										<button class="btn btn-primary btn-admin shadow-none">REFUSER</button>

									</div>

								</div>

							</div>
							{/foreach}
							{/if}


							<!-- à afficher lorsqu'il n'y a pas d'avis en attente-->
							<!--<p class="text-center">Il n'y a pas d'avis client en attente de modération.</p> -->



							<div class="col text-right">


								<!-- bouton qui va charger la liste de TOUS les avis, à commencer par ceux qui sont encore en attente de modération s'il y en a, puis les autres du plus récent au plus ancien -->
								<!-- pour le html/css, récupérer la même structure que les avis en attente de modération -->
								<a href="#" class="afficher-liste">Afficher la totalité des avis</a>

							</div>

						{/if}

					</div> <!-- fin block modération -->

				</div>

			</div>

		</div>

		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	</body>
</html>