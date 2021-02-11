<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<title>Zentopia - Centre de yoga et méditation à Tours</title>
		
		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		{include file ='head.tpl'}

	</head>	
	<body>


		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-homepage"> 
			
			<!-- Le bandeau contenant les coordonnées -->
			<!-- <?php include("banner-coordonnees.php") ?>-->
			{include file = 'banner-coordonnees.tpl'}

			<!-- La navbar -->
			<!-- <?php include("navbar.php") ?> -->
			{include file = 'navbar.tpl'}

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

					<a href="?action=enseignement#coursyogaanchor" class="btn btn-outline-light">EN SAVOIR PLUS</a>
					
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

					<a href="?action=enseignement#coursmeditanchor" class="btn btn-outline-light">EN SAVOIR PLUS</a>
					
				</div> 

			</div>

		</div>



		<!-- SECTION BLOCS LIENS -->
		<div class="container liens-middle">
			
			<div class="row h-100 justify-content-center">

				
				<div class="lien-planning mx-auto text-center">

					<img class="yoga1-homepage" src="assets/icons/yoga1.png" width="100" height="100" alt="" />
					
					<p>Trouvez votre prochaine séance</p>

					<a href="?action=planning" class="btn-sm btn-primary shadow-none">VOIR LE PLANNING</a>

				</div>


				<div class="lien-centre mx-auto text-center">

					<img class="yoga2-homepage" src="assets/icons/yoga2.png" width="100" height="100" alt="" />
					
					<p>Retrouvez-nous en centre</p>

					<a href="?action=contact" class="btn-sm btn-primary shadow-none">NOUS TROUVER</a>

				</div>

			</div>

		</div>



		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}
	</body>
</html>