<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>La team - Zentopia</title>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		{include file ='head.tpl'}

		<!-- Liens Slick -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>

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




		<!-- SECTION "CREATRICES" -->
		<div class="container creatrices-info">

			<h1 class="text-center">De la passion commune de deux femmes pour le yoga...</h1>
			
			<div class="row h-100 creatrices-block">
				
				<div class="col my-auto">
					
					<img src="assets/images/fondatrices-mini.png" width="500" height="500" class="img-fluid" alt="Deux femmes en train de faire du yoga" />
				</div>

				<div class="col-12 col-md-7 my-auto text-center">

					<p class="creatrices-p1 text-justify">L'histoire de Zentopia commence comme bon nombre, par la rencontre de deux êtres singuliers. Née en Ukraine soviétique dans les années 80, Olenna émigre en France en 2011 et s'installe à Paris, avant d'intégrer l'université de Tours. C'est là qu'elle fera la rencontre de Morgane, originaire d'Orléans.</p>

					<p class="creatrices-p2 text-justify">Unies, dans la vie comme au travail, par leur passion des arts ancestraux du yoga et de la méditation, c'est d'abord Olenna qui intègre une formation de professeur en 2012, avant d'être suivie par Morgane l'année suivante. C'est en 2015 qu'Olenna et Morgane sautent le pas et ouvrent Zentopia au 26 rue des Tanneurs, à Tours.</p>

					<a href="#" class="creatrices-lien">RENCONTREZ-NOUS EN VIDEO !</a>

				</div>

			</div>

		</div>


		<div class="container-fluid creatrices-wide">

			<img src="assets/icons/yoga3.png" class="yoga3-team" width="90" height="90" alt="" />
			
			<div class="row h-100 justify-content-center">

				<div class="col col-sm-11 col-md-8 col-lg-6 col-xl-5 my-auto text-center ">

				<p>Toutes deux professeures de yoga depuis des années, Olenna et Morgane sont spécialisées dans le hatha yoga, et dispensent plusieurs cours par semaine, ainsi que des cours particuliers à domicile. Morgane dispense également des cours de méditation tibétaine depuis 2019.</p>

				<a href="?action=enseignement" class="btn btn-outline-light">NOTRE ENSEIGNEMENT</a>
				
				</div>

			</div>

		</div>



		<!-- SECTION "LA TEAM" -->
		<div class="container la-team">
			
			<div class="row">
				
				<div class="col text-center">
					
					<h1 class="text-center">transmise à une team dévouée, toujours à votre écoute...</h1>

					<p class="quote">&laquo; Celui qui est le maître de lui-même est plus grand que celui qui est le maître du monde &raquo; -Bouddha</p>


					<!-- INSERTION DE LA PARTIE DYNAMIQUE PROF, HTML DEJA CREE -->
					<?php include('front-end/prof-description.php'); ?>

				</div>

			</div>

		</div>



		<!-- SECTION SLIDESHOW -->
		<div class="slideshow-bg">
			
			<img src="assets/icons/yoga2.png" class="yoga2-team" width="100" height="100" alt="" />

			<div class="container-fluid container-slides">

				<h2 class="text-center">Nos plus belles réalisations, capturées sur l'instant...</h2>

				<div class="slider">
					<div><img src="assets/images/slideshow1.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
					<div><img src="assets/images/slideshow2.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
					<div><img src="assets/images/slideshow3.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
					<div><img src="assets/images/slideshow4.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
					<div><img src="assets/images/slideshow5.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
					<div><img src="assets/images/slideshow6.jpg" class="img-fluid" alt="Personnes en train de faire du yoga" /></div>
				</div>

			</div>

			<img src="assets/icons/yoga1.png" class="yoga1-team" width="90" height="90" alt="" />

		</div>



		<!-- SECTION AVIS -->
		<div class="container avis-block">

			<div class="row">
				
				<div class="col text-center">
					
					<h1>jusqu'à notre communauté soudée et fidèle</h1>

				</div>

			</div>


			<div class="row testimonial justify-content-center" id="testimonial">
					
				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Jordan, 28 ans</p>

						<p class="avis-p">&laquo; J'adore venir au centre Zentopia méditer après mes parties de jeux vidéos ! Une fois posé au centre de la salle, assis en tailleur, j'oublie tout le stress et la rage que me procurent ces infâmes jeux et je renaît tel un homme nouveau... &raquo;</p>

						<img src="assets/icons/fivestar.png" class="avis-stars" width="150" height="36" alt="5 étoiles" />

					</div>

				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Cassandra, 23 ans</p>

						<p class="avis-p">&laquo; Située à deux pas de ma librairie préférée, j'ai sauté le pas en été et décidé de me joindre à l'une des séances découverte. J'ai adoré, je me suis sentie à l'aise et valorisée. Un mois plus tard, j'avais mon abonnement ! &raquo;</p>

						<img src="assets/icons/fourstar.png" class="avis-stars" width="150" height="36" alt="4 étoiles" />

					</div>
				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Olivier, 28 ans</p>

						<p class="avis-p">&laquo; Etant éleveur de chiens de profession, mon quotidien n'est pas de tout repos ! J'ai trouvé dans la pratique Zentopienne du yoga un exutoire, un moment important pour me recharger les batteries. L'équipe est devenue une véritable famille pour moi. &raquo;</p>

						<img src="assets/icons/fourstarhalf.png" class="avis-stars" width="150" height="36" alt="4.5 étoiles" />

					</div>

				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Emilien, 20 ans</p>

						<p class="avis-p">&laquo; Très exigeant en matière de yoga, j'ai enfin trouvé un enseignement qui me plaît : j'aime sentir mon corps dépasser ses limites et le voir atteindre une souplesse inégalée. Les enseignants de Zentopia savent répondre à mes attentes très précises.  &raquo;</p>

						<img src="assets/icons/fivestar.png" class="avis-stars" width="150" height="36" alt="5 étoiles" />

					</div>

				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Steve, 23 ans</p>

						<p class="avis-p">&laquo; Etant quelqu'un de très zen, que la pression ne saurait affecter, c'est tout naturellement que j'ai adhéré à l'esprit du centre Zentopia. Ici, on avance à notre rythme, on prend le temps et on ne se laisse jamais perturber par les autres ! &raquo;</p>

						<img src="assets/icons/fourstarhalf.png" class="avis-stars" width="150" height="36" alt="4.5 étoiles" />

					</div>

				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Melitta, 27 ans</p>

						<p class="avis-p">&laquo; J'ai trouvé en la communauté de Zentopia un véritable espace où l'on se sent bien, écouté et entouré. Leurs méthodes d'enseignement sont incroyablement pédagogues et adaptées à tous, c'est un vrai instant magique que l'on partage ensemble à chaque séance. &raquo;</p>

						<img src="assets/icons/fivestar.png" class="avis-stars" width="150" height="36" alt="5 étoiles" />

					</div>

				</div>

				<div class="col-12 col-sm-6 col-lg-3 avis text-center">

					<div class="avis-inner">

						<img src="assets/icons/quotationmarks.png" class="quote-img" />
					
						<p class="avis-nom">Fatima, 62 ans</p>

						<p class="avis-p">&laquo; J'ai découvert le yoga il y a peu, à l'initiative d'une amie qui m'a emmenée lors d'une séance découverte au centre Zentopia. J'ai beaucoup apprécié ce moment et j'ai pu faire la rencontre charmante d'Olenna, de Morgane ainsi qu'une partie de l'équipe. Je pense prendre mon abonnement prochainement. &raquo;</p>

						<img src="assets/icons/fourstarhalf.png" class="avis-stars" width="150" height="36" alt="4.5 étoiles" />

					</div>

				</div>


			</div>

		</div>


		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	<!-- lien Slick -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


	<!-- slideshow BX (images) -->
  	<script>

  		$('.slider').slick({
		  infinite: true,
		  dots: true,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  speed: 500,
		  fade: true,
		  cssEase: 'linear',
		  autoplay: true,
 		  autoplaySpeed: 2000
		  });

	</script>


	<!-- slideshow Slick (testimonial) -->
	<script>

		$('.testimonial').slick({
		  infinite: true,
		  dots: true,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  	]
	});

	</script>
	</body>
</html>