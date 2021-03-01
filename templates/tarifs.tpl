<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Tarifs - Zentopia</title>

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




		<!-- SECTION TARIFS -->
		<div class="container text-center">
				
			<p class="quote-planning">&laquo; Le yoga nous enseigne à guérir ce qui n’a pas besoin d’être enduré, et à endurer ce qui ne peut pas être guéri &raquo; <br/>- B.K.S. Iyengar</p>

			<div class="tarifs-img">

				<img src="assets/icons/yoga4.png" class="yoga4-tarifs" height="100" width="100" alt="" />

				<img src="assets/images/tarifs.jpg" class="img-fluid" alt="Tarifs des cours" />

			</div>

			<p class="tarifs-p">Vous pouvez télécharger nos tarifs <a href="assets/images/tarifs.jpg" download>ici</a>.</p>

			<p class="tarifs-p">Avant toute nouvelle inscription, prenez bien soin de lire notre <a href="?action=mentions_legales">règlement intérieur</a>.</p>

			<a href="?action=planning#reservation" class="btn btn-lg btn-primary shadow-none button-rejoindre">RESERVEZ VOTRE SEANCE</a>

		</div>


		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}


	</body>
</html>