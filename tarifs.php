<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Tarifs - Zentopia</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		<meta name="robots" content="nofollow, noindex">

		<!-- lien bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- lien CSS -->
		<link rel="stylesheet/less" type="text/css" href="styles.less">

		<!-- liens Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

		<!-- liens Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			<?php include("banner-coordonnees.php"); ?>

			<!-- La navbar -->
			<?php include("navbar.php"); ?>

		</header> 




		<!-- SECTION TARIFS -->
		<div class="container text-center">
				
			<p class="quote-planning">&laquo; Le yoga nous enseigne à guérir ce qui n’a pas besoin d’être enduré, et à endurer ce qui ne peut pas être guéri &raquo; <br/>- B.K.S. Iyengar</p>

			<div class="tarifs-img">

				<img src="assets/icons/yoga4.png" class="yoga4-tarifs" height="100" width="100" alt="" />

				<img src="assets/images/tarifs.jpg" class="img-fluid" alt="Tarifs des cours" />

			</div>

			<p class="tarifs-p">Vous pouvez télécharger nos tarifs <a href="assets/images/tarifs.jpg" download>ici</a>.</p>

			<p class="tarifs-p">Avant toute nouvelle inscription, prenez bien soin de lire notre <a href="reglement-interieur.php">règlement intérieur</a>.</p>

			<a href="contact.php" class="btn btn-lg btn-primary shadow-none button-rejoindre">REJOIGNEZ-NOUS !</a>

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
		<?php include("footer.php"); ?>




	<!-- lien library Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<!-- lien library Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<!-- lien LESS -->
	<script src="//cdn.jsdelivr.net/npm/less@3.13" ></script>

	<!-- lien Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>


	<!-- script pour la scroll-top -->
	<script>
		
		$(window).scroll(function() {
		    if ($(this).scrollTop() >= 200) {        // Si on scroll à + de 200px
		        $('#scroll-top').fadeIn(200);    // faire apparaître
		    } else {
		        $('#scroll-top').fadeOut(200);   // sinon faire disparaître
		    }
		});

		$('#scroll-top').click(function() {      // au clic
		    $('body,html').animate({
		        scrollTop : 0                       // remonter jusqu'en haut
		    }, 500);
		});

	</script>

	</body>
</html>