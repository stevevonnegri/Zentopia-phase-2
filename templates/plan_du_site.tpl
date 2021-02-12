<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Plan du site - Zentopia</title>

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



		<!-- SECTION PLAN DU SITE-->
		<div class="container plan-du-site">

			<h1>Plan du site</h1>

			<ul class="list-unstyled">
				
				<li><i class="fas fa-dot-circle"></i><a href="index.php">Accueil</a></li>
				<li><i class="fas fa-dot-circle"></i><a href="?action=la_team">La team</a></li>
				<li><i class="fas fa-dot-circle"></i><a href="?action=enseignement">Enseignement</a></li>

				<li class="no-link">

					Les cours

					<ul>

						<li class="sub"><i class="fas fa-dot-circle"></i><a href="?action=planning">Planning</a></li>
						<li class="sub"><i class="fas fa-dot-circle"></i><a href="?action=tarifs">Tarifs</a></li>

					</ul>

				</li>

				<li><i class="fas fa-dot-circle"></i><a href="?action=contact">Contact</a></li>
				<li><i class="fas fa-dot-circle"></i><a href="?action=mentions_legales">Mentions légales</a></li>
				<li><i class="fas fa-dot-circle"></i><a href="?action=reglement_interieur">Règlement intérieur</a></li>

			</ul>

		</div>



		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}
	</body>
</html>