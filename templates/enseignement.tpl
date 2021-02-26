<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Enseignement - Zentopia</title>

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




		<!-- SECTION "QUOTE" -->
		<div class="quote-block-enseignement">

			<div class="container text-center">

				<div class="row justify-content-center">

					<div class="col-12 col-md-10 col-lg-8">
				
						<p>&laquo; Le yoga est une lumière, qui une fois allumée ne s’éteint jamais. Le mieux vous pratiquez, plus fort brille la lumière &raquo; <br/> -B.K.S. Iyengar</p>

						<img src="assets/icons/yoga-male.png" width="80" height="82" alt="" />

					</div>

				</div>

			</div>

		</div>



		<!-- SECTION "PRESENTATION-BLOCK" -->
		<div class="container presentation-block">
			
			<div class="row justify-content-center team-block">
				
				<div class="team-block-p text-justify order-1 order-lg-1">
					
					<p>C'est <span>une équipe passionnée</span> qui vous attend au centre Zentopia, composée de cinq femmes et d'un homme aux parcours différents. Tous enseignent en suivant nos trois principes : <span>la bienveillance</span>, qui permet d'installer un climat d'écoute et de tolérance ; <span>le mode slow</span>, qui demande à ce qu'on ralentisse tous volontairement notre rythme habituel ; et <span>l'éveil corps-esprit</span>, qui permet d'ouvrir sa conscience à des niveaux supérieurs.</p>

				</div>

				<div class="team-block-img order-2 order-lg-2">
					
					<a href="?action=la_team" class="btn btn-dark">RENCONTREZ NOTRE TEAM</a>

				</div>

			</div>


			<div class="row justify-content-center yt-block">
				
				<div class="yt-block-img order-4 order-lg-3">
					
					<a href="https://www.youtube.com" class="btn btn-dark ">DECOUVREZ NOS VIDEOS</a>

				</div>

				<div class="yt-block-p text-justify order-3 order-lg-4">
					
					<p>Si à Zentopia, nous prônons un fonctionnement plus lent que nos vies à 200 à l'heure, cela ne veut pas dire que nous ne sommes pas dans l'air du temps ! Nous organisons régulièrement <span>des ateliers et des événements</span> au long de l'année, et nous postons régulièrement <span>nos plus belles réalisations</span> sur nos réseaux. Nous proposons aussi ponctuellement <span>des cours en ligne</span> sur notre chaîne YouTube ! </p>

				</div>

			</div>

		<div id="coursyogaanchor"></div>

		</div>

		

		<!-- SECTION COURS DE YOGA -->
		<div class="cours-bg">

			<img src="assets/icons/yoga-mat.png" class="yoga-mat" width="60" height="60" alt="" />

			<h1  class="text-center">NOS COURS DE YOGA</h1>

			{if isset($yogaliste)}

				{foreach from=$yogaliste item=cours key=i}

					<div  class="container cours-bg hatha-block">		

						<div class="row align-items-center">
							
							<div class="col-12 col-lg {if $i%2==1} order-2 {else} order-1 {/if}">
								
								<div class="cours-img text-center">

									<img src="{$cours->getImage_type_de_cours()}" width="400" height="266" alt="Illustration de yoga"/>

								</div>

							</div>

							<div class="col text-center {if $i%2==1} order-1 {else} order-2 {/if}">
								
								<h2 class="

								{if $i%2==1} text-left {else} text-right {/if}

								 nom-cours" id="hatha">{$cours->getNom_type_de_cours()|upper}</h2>

								<p class="text-justify">{$cours->getDescription_type_de_cours()}</p>

								<a href="?action=planning" class="btn btn-primary shadow-none">CONSULTEZ LE PLANNING</a>

							</div>

						</div>

					</div>

				{/foreach}

			{/if}

			<div id="coursmeditanchor"></div>

		</div>

		<div class="container contactez-nous">

			<div class="row">
				
				<div class="col text-center">
					
					<p>Pour toute demande d'information sur nos cours, contactez-nous via notre <a href="?action=contact">formulaire de contact</a> ou sur les réseaux sociaux !</p>

				</div>

			</div>
			

		</div>



		<!-- SECTION COURS DE MEDITATION -->

		<div class="medit-bg">
			
			<img src="assets/icons/lotus.png" class="lotus" width="60" height="60" alt="" />

			<h1 class="text-center">NOS COURS DE MEDITATION</h1>

			{if isset($meditationliste)}

				{foreach from=$meditationliste item=cours key=i}

					<div  class="container cours-bg hatha-block">		

						<div class="row align-items-center">
							
							<div class="col-12 col-lg {if $i%2==1} order-2 {else} order-1 {/if}">
								
								<div class="cours-img text-center">

									<img src="{$cours->getImage_type_de_cours()}" width="400" height="266" alt="Illustration de yoga"/>

								</div>

							</div>

							<div class="col text-center {if $i%2==1} order-1 {else} order-2 {/if}">
								
								<h2 class="

								{if $i%2==1} text-left {else} text-right {/if}

								 nom-cours" id="hatha">{$cours->getNom_type_de_cours()|upper}</h2>

								<p class="text-justify">{$cours->getDescription_type_de_cours()}</p>

								<a href="?action=planning" class="btn btn-primary shadow-none">CONSULTEZ LE PLANNING</a>

							</div>

						</div>

					</div>

				{/foreach}

			{/if}

		</div>




		<!-- SECTION TARIFS -->
		<div class="container text-center lien-tarifs">
			
			<p>Vous pouvez consulter nos tarifs <a href="?action=tarifs">ici</a>.</p>

		</div>



		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}
	</body>
</html>