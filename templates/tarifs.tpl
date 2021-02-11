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
			{include file = 'banner-coordonnees.tpl'}

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

			<p class="tarifs-p">Avant toute nouvelle inscription, prenez bien soin de lire notre <a href="?action=reglement_interieur">règlement intérieur</a>.</p>

			<a href="?action=contact" class="btn btn-lg btn-primary shadow-none button-rejoindre">REJOIGNEZ-NOUS !</a>

		</div>



		<!-- SECTION A VENIR -->
		<div class="a-venir">

			<img src="assets/icons/yoga-senior.png" class="yoga-senior-tarifs" width="65" height="65" alt="" />
			
			<div class="container text-center">

				<h1>A VENIR</h1>

				<div class="row justify-content-center">

					<div class="col col-md-10">

						<p>Nous travaillons actuellement sur notre site web afin de nous proposer la possibilité de réserver vos cours directement en ligne. 

						<br/><br/>
						Pour être prévenu de l'arrivée de ce nouveau service, rejoignez notre newsletter et recevez votre invitation à l'une de <span>nos séances découverte</span>* :</p>

					</div>

				</div>

				<div class="row justify-content-center">
				
					<div class="col newsletter-planning">
						
						<form class="form-inline justify-content-center">
							
							<input type="email" name="email" placeholder="saisir mon email">
							<button type="submit" class="btn btn-primary shadow-none">M'INSCRIRE</button>

						</form>

					</div>

					<p class="newsletter-planning-disclaimer">*Offre valable pour tout.e nouvel.le élève s'inscrivant à la newsletter, sur l'une des six séances découvertes proposées par Zentopia sur l'année, plus d'informations dans le mail de confirmation de la newsletter.</p>

				</div>

			</div>

		</div>



		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}
	</body>
</html>