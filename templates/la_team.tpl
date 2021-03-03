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
			{include file = 'banner_coordonnees.tpl'}

			<!-- La navbar -->
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


					<!-- affichage dynamique de la liste des profs -->
					{if isset($listeprof)}

						{foreach from=$listeprof item=prof key=i}

							<div class="row team-member-block align-items-center">
			
								<div class="col-12 col-md-4 {if $i%2==1} order-2 {else} order-1 {/if}">
									
									<img src="{$prof.photo}" alt="Portrait d'un professeur" class="img-fluid img-prof">

								</div>

								<div class="col {if $i%2==1} order-1 {else} order-2 {/if}">
									
									<p class="nom-prof">{$prof.prenom_utilisateur}</p>

									<p class="description-prof">{$prof.description_professeur}</p>

									<p class="cours-prof">
										{foreach from=$prof.listecours item=cours}

											<a href="?action=enseignement#

											{if $cours == 'hatha yoga'}

												hatha

											{elseif $cours == 'vinyasa yoga'}

												vinyasa

											{elseif $cours == 'slow yoga'}

												slow

											{elseif $cours == 'kid yoga'}

												kid

											{elseif $cours == 'meditation guidee'}

												meditation

											{elseif $cours == 'meditation tibetaine'}

												meditation

											{/if}


											"><span># {$cours}</span></a>

										{/foreach}

									</p>

								</div>

							</div>

						{/foreach}

					{/if}

				</div>

			</div>

		</div>



		<!-- SECTION SLIDESHOW -->
		<div class="slideshow-bg">
			
			<img src="assets/icons/yoga2.png" class="yoga2-team" width="100" height="100" alt="" />

			<div class="container-fluid container-slides">

				<h2 class="text-center">Nos plus belles réalisations, capturées sur l'instant...</h2>

				<!-- à afficher de façon dynamique avec les images contenues dans la BDD -->
				<div class="slider">
					
					{foreach from=$imagesAll item="image"}
						<div>
							<img src="{Image::GetImageLink(770,$image->getUrl_image())}" class="img-fluid text-center" alt="Personnes en train de faire du yoga"/>
						</div>
					{/foreach}{**}
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


			{if isset($avis_list)}

				<div class="row testimonial justify-content-center" id="testimonial">

					{foreach from=$avis_list item=avis}
						
					<div class="col-12 col-sm-6 col-lg-3 avis text-center">

						<div class="avis-inner">

							<img src="assets/icons/quotationmarks.png" class="quote-img" />
						
							<p class="avis-nom">{$avis.prenom_utilisateur}, {$avis.age} ans</p>

							<p class="avis-p">&laquo; {$avis.contenu_avis} &raquo;</p>

							<img src="assets/icons/

							{if $avis.niveau_avis == 1}

							onestar

							{elseif $avis.niveau_avis == 2}

							twostar

							{elseif $avis.niveau_avis == 3}

							threestar

							{elseif $avis.niveau_avis == 4}

							fourstar

							{elseif $avis.niveau_avis == 5}

							fivestar

							{/if}

							.png" class="avis-stars" width="150" height="36" alt="5 étoiles" />

						</div>

					</div>

					{/foreach}

				</div> <!-- fin div testimonial -->

			{/if}


			<!-- section Ajouter un avis -->
			<div class="ajouter-avis-block text-center" id="ajout-avis">
				
				<h3>Partagez vous aussi votre expérience Zentopia !</h3>

				<!-- partie cachée tant que le membre n'a pas cliqué sur le bouton ci-dessus -->
				<div id="ajouter-avis">
					
					<div class="ajouter-avis-inner">

						
						{if isset($avis_manquant)}
						<!-- à afficher si le membre n'a pas encore écrit un avis -->
						<form method="post" action="">

							<div class="form-row">

								<div class="col-12 text-left">
									
									<label for="avis-contenu">Votre avis : (250 caractères maximum)</label>
									<textarea class="form-control" name="avis-contenu" required></textarea>

								</div>

								<div class="col-12 col-md-6 col-lg-2 text-left">
									
									<label for="note">Votre note :</label>
									<select class="form-control" name="avis-note" required>
										
										<option value="">--Note--</option>
										<option value="5">5/5</option>
										<option value="4">4/5</option>
										<option value="3">3/5</option>
										<option value="2">2/5</option>
										<option value="1">1/5</option>

									</select>

								</div>

							</div>

	
							{if isset($message_error)}

								<p class="error">{$message_error}</p>

							{/if}

							<button type="submit" class="btn-lg btn-primary shadow-none">SOUMETTRE</button>
							

						</form>
						{/if}


						<!-- à afficher lors que le membre n'est pas connecté ou inscrit -->
						{if isset($est_connecte)}
						<p>Vous devez posséder un compte pour laisser un avis client sur notre site.</p>

						<div class="row">
							
							<div class="col compte-manquant">
								
								<a href="?action=connexion" class="btn btn-primary shadow-none">SE CONNECTER</a>
								<a href="?action=inscription" class="btn btn-primary shadow-none">S'INSCRIRE</a>

							</div>

						</div>
						{/if}


						<!-- à afficher lorsque le membre a déjà déposé un avis -->
						{if isset($avis_present)}

							<div class="row avis-depose">
								
								<div class="col">
									
									<p>Vous avez bien déposé votre avis client. Une fois validé, vous pouvez le consulter directement dans votre <a href="?action=espace_personnel#mon-avis">espace personnel</a> ou parmi les avis ci-dessus.</p>

								</div>

							</div>

						{/if}

					</div>

				</div>

			</div>

			

		</div> <!-- fin div section avis -->


		<!-- Scroll top + footer -->
		{include file = 'footer.tpl'}
		

	</script>

	</body>
</html>