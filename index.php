<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<title>Zentopia - Centre de yoga et méditation à Tours</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>
		<meta name="robots" content="nofollow, noindex"/>

		<!-- lien bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>

		<!-- lien CSS -->
		<link rel="stylesheet/less" type="text/css" href="styles.less"/>

		<!-- liens Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com"/>
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"/>

		<!-- liens Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-homepage"> 
			
			<!-- Le bandeau contenant les coordonnées -->
			<?php include("banner-coordonnees.php"); ?>

			<!-- La navbar -->
			<?php include("navbar.php"); ?>
			
			<!-- La scroll arrow (icône Font Awesome) -->
			<div class="scroll-arrow">
				<a href="#anchor"><i class="fas fa-long-arrow-alt-down"></i></a>
			</div>

		</header> 



		<!-- SECTION "NOS TROIS PRINCIPES" -->
		<div class="container trois-principes">

			<div id="anchor">.</div>

			<div class="row principe-titre justify-content-center">

				<div class="col col-md-9 col-lg-7 text-center">

					Découvrez notre pratique du yoga et de la méditation selon nos trois principes :

				</div>

			</div>


			<div class="row">
				
				<div class="col">

					<div class="circle text-center circle-content">
						
						<img src="assets/icons/bienveillance.png" width="70" height="70" alt=""/>

						<h1>Bienveillance</h1>

						<p>Nous prônous la tolérance et la bienveillance dans nos locaux, pour que tous et toutes puissent se sentir à l'aise, en sécurité et entouré.e.s.</p>

					</div>
					
				</div>


				<div class="col">

					<div class="circle text-center circle-content">

						<img src="assets/icons/slow.png" width="70" height="70" alt="" />

						<h1>Mode slow</h1>

						<p>Quand nos vies vont à 200h à l'heure, il est bon de se poser pour quelques instants, prendre le temps qu'il faut pour respirer et se centrer sur soi-même.</p>

					</div>
					
				</div>


				<div class="col">

					<div class="circle text-center circle-content">

						<img src="assets/icons/eveil.png" width="70" height="70" alt="" />

						<h1>Eveil corps-esprit</h1>

						<p>Si le corps doit être respecté, l'esprit lui-aussi doit être mis au repos. Nous vous accompagnons sur le chemin de la paix intérieure.</p>

					</div>
					
				</div>

			</div>

		</div>


		
		<!-- SECTION "UN CORPS DETENDU" -->
		<div class="container-fluid corps-detendu">

			<div class="row h-100 justify-content-center">

				<div class="col col-sm-11 col-md-8 col-lg-6 col-xl-5 my-auto encart-detendu text-center ">

					<h2>LE YOGA</h2>

					<p>Chez Zentopia, nous croyons en l'importance d'accorder à son corps le repos et l'attention qu'il mérite. Trop souvent nous le malmenons par accident : la charge de travail, le temps qu'il nous manque, la vie de famille, des soucis de santé ou tout simplement le stress, ne nous permettent parfois plus de prendre le temps.</p>
					
					<p>Le yoga est une pratique millénaire qui, en alliant postures, techniques de respiration et relaxation, permet d'apporter une solution ancestrale à ces problématiques modernes. Nous vous proposons des cours pour tous les niveaux, dans le respect de nos trois principes : la bienveillance, le mode slow et l'éveil corps-esprit, et ouverts à tous et toutes.</p>

					<a href="enseignement.php#coursyogaanchor" class="btn btn-outline-light">EN SAVOIR PLUS</a>
					
				</div> 

			</div>

		</div>



		<!-- SECTION NEWSLETTER -->
		<div class="container-fluid text-center newsletter-homepage">

			<img src="assets/icons/yoga-male.png" class="yoga-male-homepage" width="80" height="82" alt="" />
			
			<div class="row justify-content-center">

				<div class="col col-md-11 col-lg-9 col-xl-6 text-center newsletter-homepage-titre">
					Inscrivez-vous à notre newsletter pour ne rien louper de nos actus et recevez votre invitation à l'une de <span>nos séances découverte</span>* !
				</div>

			</div>

			<div class="row justify-content-center">
				
				<div class="col">
					
					<form class="form-inline justify-content-center">
						
						<input type="email" name="email" placeholder="saisir mon email">
						<button type="submit" class="btn btn-primary shadow-none">M'INSCRIRE</button>

					</form>

				</div>

			</div>

			<p class="newsletter-homepage-disclaimer">*Offre valable pour tout.e nouvel.le élève s'inscrivant à la newsletter, sur l'une des six séances découvertes proposées par Zentopia sur l'année, plus d'informations dans le mail de confirmation de la newsletter.</p>

		</div>



		<!-- SECTION "UN ESPRIT APAISE" -->
		<div class="container-fluid esprit-apaise">

			<div class="row h-100 justify-content-center">

				<div class="col col-sm-11 col-md-8 col-lg-6 col-xl-5 my-auto encart-apaise text-center ">

					<h2>LA MÉDITATION</h2>

					<p>S'il est important de ralentir le rythme de son corps, il est tout aussi essentiel de soumettre son esprit à cette même bienveillance. Les pensées négatives et néfastes liées au stress ainsi qu'à nos peurs inconscientes peuvent être canalisées grâce à la méditation.</p>

					<p>L'objectif de cette pratique est de faire en sorte que ces pensées et ces peurs n'aient plus le contrôle sur nous, pour nous libérer enfin des ruminations qui nous empêchent d'avancer. Pour faire taire ce brouhaha intérieur et pouvoir observer ce qui se passe en nous, Zentopia vous propose des cours de méditation guidée ainsi que des cours de méditation tibétaine.</p>

					<a href="enseignement.php#coursmeditanchor" class="btn btn-outline-light">EN SAVOIR PLUS</a>
					
				</div> 

			</div>

		</div>



		<!-- SECTION BLOCS LIENS -->
		<div class="container liens-middle">
			
			<div class="row h-100 justify-content-center">

				
				<div class="lien-planning mx-auto text-center">

					<img class="yoga1-homepage" src="assets/icons/yoga1.png" width="100" height="100" alt="" />
					
					<p>Trouvez votre prochaine séance</p>

					<a href="planning.php" class="btn-sm btn-primary shadow-none">VOIR LE PLANNING</a>

				</div>


				<div class="lien-centre mx-auto text-center">

					<img class="yoga2-homepage" src="assets/icons/yoga2.png" width="100" height="100" alt="" />
					
					<p>Retrouvez-nous en centre</p>

					<a href="contact.php" class="btn-sm btn-primary shadow-none">NOUS TROUVER</a>

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