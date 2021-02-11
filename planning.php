<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Planning - Zentopia</title>
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

		<!-- lien favicon -->
		<link rel="icon" type="image/png" href="assets/icons/yoga-male.png" />

	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			<?php include("banner-coordonnees.php"); ?>

			<!-- La navbar -->
			<?php include("navbar.php"); ?>

		</header> 




		<!-- SECTION PLANNING -->
		<div class="container text-center">
				
			<p class="quote-planning">&laquo; Le yoga nous enseigne à guérir ce qui n’a pas besoin d’être enduré, et à endurer ce qui ne peut pas être guéri &raquo; <br/>- B.K.S. Iyengar</p>

			<div class="planning-img">

				<img src="assets/icons/yoga3.png" class="yoga3-planning" height="80" width="80" alt="" />

				<img src="assets/images/planning.jpg" class="img-fluid" alt="Planning des cours" />

			</div>

			<p class="planning-p">Vous pouvez télécharger notre planning <a href="assets/images/planning.jpg" download>ici</a>.</p>

			<p class="planning-p">Avant toute nouvelle inscription, prenez bien soin de lire notre <a href="reglement-interieur.php">règlement intérieur</a>.</p>

			<a href="contact.php" class="btn btn-lg btn-primary shadow-none button-rejoindre">REJOIGNEZ-NOUS !</a>

		</div>



		<div class="container">

			<div class="planning-dynamique">
			
				<div class="row planning-head">
						
					<div class="col">
						
						<p>Trouver un cours</p>

					</div>

					<div class="col">
						
						<a href="#">Mon compte</a>

					</div>

				</div>

				<div class="row">
					
					<div class="col">
						
						<a href="#">SEMAINE ACTUELLE</a>

					</div>

					<div class="col">
						
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>

					</div>

					<div class="col">
						
						<form method="post" accept="">
							
							<label for="">Type de cours :</label>
							<select>
									
								<option value="">Tous</option>
								<option value="hatha">Hatha</option>
								<option value="vinyasa">Vinyasa</option>
								<option value="slow-yoga">Slow yoga</option>
								<option value="kid-yoga">Kid yoga</option>
								<option value="meditation-guidee">Méditation guidée</option>
								<option value="meditation-tibetaine">Méditation tibétaine</option>	

							</select>

						</form>

					</div>

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