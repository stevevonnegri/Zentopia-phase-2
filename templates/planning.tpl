<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>Planning - Zentopia</title>

		<meta name="description" content="Le centre Zentopia à Tours vous propose des cours de yoga et de méditation en centre ville, à deux pas de la place Anatole France. Inscrivez-vous dès maintenant pour une séance découverte."/>

		{include file ='head.tpl'}

	</head>
	<body>



		<!-- SECTION HEADER (contient le bandeau d'info, la navbar et sa background-img + la scroll arrow) -->
		<header class="header-all"> 

			<!-- Le bandeau contenant les coordonnées -->
			{include file = 'banner_coordonnees.tpl'}

			<!-- La navbar -->
			{include file = 'navbar.tpl'}

		</header> 




		<!-- SECTION PLANNING -->
		<div class="container planning-type text-center">
				
			<p class="quote-planning">&laquo; Le yoga nous enseigne à guérir ce qui n’a pas besoin d’être enduré, et à endurer ce qui ne peut pas être guéri &raquo; <br/>- B.K.S. Iyengar</p>

			<div class="planning-img">

				<img src="assets/icons/yoga3.png" class="yoga3-planning" height="80" width="80" alt="" />

				<img src="assets/images/planning.jpg" class="img-fluid" alt="Planning des cours" />

			</div>

		</div>


		<div class="planning-infos-background">

			<div class="container planning-infos text-center">

				<p class="planning-p">L'emploi du temps est le même chaque semaine, vous pouvez donc télécharger notre planning type <a href="assets/images/planning.jpg" download>ici</a>.</p>

				<p class="planning-p">Pour tout cours occasionnellement annulé, nous prévenons tous les participants par mail directement et nous vous tenons à jour en temps réel sur notre <a href="#">Instagram</a>.</p>

				<img src="assets/icons/yoga1.png" class="yoga1" height="100" width="100"/>

			</div>

		</div>



		<!-- section planning dynamique, qui doit être adapté en smarty/php pour afficher les éléments selon la recherche, selon les actions du membre, du prof ou de l'admin -->
		<div class="container planning-dynamique-title" id="planning-dynamique">

			<h1 id="reservation">RESERVATION EN LIGNE</h1>

			

			<!-- Animation arrow -->
			<div class="anim-arrow">
				<i class="fas fa-angle-double-down"></i>
			</div>

						<!--affichage d'une alert pour la resa et l'annulation d'une séance-->
			

			

				<div class="col error-col text-center">

					<p class="error">

					{if isset($RangNonValide)}
					
						{$RangNonValide}

					{/if}

					{if isset($SeanceDejaPrise)}

						{$SeanceDejaPrise}

					{/if}

					{if isset($DatePerimer)}

						{$DatePerimer}

					{/if}

					</p>

				</div>

		
			<div class="planning-dynamique">

			{if isset($RangNonValide)}
				<p class="error text-center">{$RangNonValide}</p>
			{/if}
			{if isset($SeanceDejaPrise)}
				<p class="error text-center">{$SeanceDejaPrise}</p>
			{/if}
			{if isset($DatePerimer)}
				<p class="error text-center">{$DatePerimer}</p>
			{/if}
				<div class="row planning-head justify-content-around align-items-center">
						
					<div class="col text-left order-1">
						
						<p class="titre-head">Trouver un cours</p>

					</div>


					<!-- à afficher seulement pour les admins !-->
					<div class="col-12 col-md-5 col-xl-3 order-3 order-md-2 text-center">
						
						{if $_SESSION['rang'] == admin}

							<!-- affiche le formulaire d'ajout de cours au clic -->
							<button class="btn btn-primary btn-admin shadow-none ajouter-seance-btn" href="ajouter_un_cours" onclick="showElement('ajouter-seance');">+ AJOUTER UN COURS</button>
						{/if}

					</div>

					<div class="col text-right order-2 order-md-3">
						
						<a href="?action=espace_personnel">Mon compte</a>

					</div>

				</div>

				{if $_SESSION['rang'] == admin}

					<!-- formulaire d'ajout de cours qui ne s'affiche qu'au clic du bouton -->
					<div class="row hidden justify-content-around" id="ajouter-seance">
						
						<form class="form_ajax" method="post" action="">
							
							<div class="form-row align-items-end ">
								
								<div class="col-12 col-sm-6 col-lg">
									
									<label for="date-seance">Date :</label>
									<input type="date" name="date-seance" class="form-control">

								</div>

								<div class="col-12 col-sm-6 col-lg">
									
									<!-- optionnel : récupérer tous les types de cours dynamiquement pour les afficher dans le select -->
									<label for="nom_cours">Type de cours :</label>
									<select name="nom_type_cours" class="form-control" id="ajaxCours-0">
										
										{foreach from=$noms_des_cours item=nom_cours}

											<option value="{$nom_cours.id_type_de_cours}">{$nom_cours.nom_type_de_cours|capitalize}</option>

										{/foreach}

									</select>

								</div>

								<div class="col-12 col-sm">
									
									<!-- optionnel : récupérer les profs dynamiquement pour les afficher dans le select -->
									<label for="prenom_professeur">Enseignant :</label>
									<select name="prenom_professeur" class="form-control" id="enseignant-0">
									
										{foreach from=$prenoms_professeurs item=prenom_professeur}

											<option value="{$prenom_professeur.id_professeur}">{$prenom_professeur.prenom_utilisateur|capitalize}</option>

										{/foreach}

									</select>

								</div>

								<div class="col-12 col-sm">
									
									<label for="heure-debut">Heure de début :</label>
									<input type="time" name="heure-debut" class="form-control">

								</div>

								<div class="col-12 col-sm">
									
									<label for="heure-debut">Heure de fin :</label>
									<input type="time" name="heure-fin" class="form-control">

								</div>

								<div class="col-12 col-sm btn-col">
									
									<button class="btn btn-primary btn-admin shadow-none" name="Ajouter_seance" type="submit">AJOUTER</button>

								</div>

							</div>

						</form>

					</div>

				{/if}

				
				<div class="row background-light align-items-center planning-search">
					
					<div class="col-9 col-lg-3" id="semaine">
						
						<a href="?action=planning&page=1#semaine" class="semaine-actuelle {if $page == '1'}active{/if}" >SEMAINE ACTUELLE</a>

					</div>

					<div class="col-3 col-lg-1">
						
						<a href="?action=planning&page=1#semaine" class="{if $page == '1'}active{/if}">1</a>
						<a href="?action=planning&page=2#semaine" class="{if $page == '2'}active{/if}">2</a>
						<a href="?action=planning&page=3#semaine" class="{if $page == '3'}active{/if}">3</a>

					</div>

					<div class="col-12 col-lg-7">
						
						<form method="POST" action="?action=planning&page={if isset($page)}{$page}{else}1{/if}#reservation">

							<div class="form-row align-items-center">

								<div class="col-6 col-md text-right col-search">
		
									<label for="">Type de cours :</label>

									<select name="nom_cours">
											
										<option value="">Tous</option>

										{foreach from=$noms_des_cours item=nom_cours}

											<option value="{$nom_cours.nom_type_de_cours}">{$nom_cours.nom_type_de_cours|capitalize}</option>

										{/foreach}

									</select>

								</div>

								<div class="col col-sm-2 text-left col-search">
									
									<button class="btn btn-primary btn-reserver shadow-none" name="filtre">FILTRER</button>

								</div>

							</div>

						</form>

					</div>

				</div>

			<!--on assigne 2 variables : la 1ere pour afficher la date, si elle n'est pas égale à la date de la précédente boucle
				la 2eme sert de compteur pour identifier les formulaires à surveiller pour l'ajax. -->

			{assign var=date value=1}
			{assign var=cmpt value=0}

			<!--affichage d'une alert pour la resa et l'annulation d'une séance-->
			{if isset($confirmationReservation)}
				<p class="error text-center">{$confirmationReservation}</p>
			{/if}
			{if isset($confirmationAnnulation)}
				<p class="error text-center">{$confirmationAnnulation}</p>
			{/if}
			{if isset($seancePleine)}
				<p class="error text-center">{$seancePleine}</p>
			{/if}
			{if isset($seanceDejaReserver)}
				<p class="error text-center">{$seanceDejaReserver}</p>
			{/if}
			{if isset($ModifOk)}
				<p class="error text-center">{$ModifOk}</p>
			{/if}
			{if isset($AjoutOk)}
				<p class="error text-center">{$AjoutOk}</p>
			{/if}
			{if isset($AnnulationOk)}
				<p class="error text-center">{$AnnulationOk}</p>
			{/if}

			{foreach from=$seances item=seance} {*FIN LIGNE 661 *}
					
				{if $date != $seance.date_seance}

					<div class="row background-jour">
						
						<div class="col">
							
							<p>{$seance.date_seance|date_format:"%A %e %B"|utf8_encode}</p>

						</div>

					</div>

				{/if}

				<!--on assigne la date de cette boucle à notre variable pour s'en "souvenir" au tour de boucle suivant.-->
				{assign var=date value=$seance.date_seance}
					
				<div class="row background-light align-items-center seance-element" id="id-seance-{$seance.id_seance}">
					
					<div class="col-12 col-sm-6 col-lg text-center col-below">
						
						<p>{$seance.heure_debut_seance|date_format:"%Hh%M"|utf8_encode} - {$seance.heure_fin_seance|date_format:"%Hh%M"|utf8_encode}</p>

					</div>

					<div class="col-12 col-sm-6 col-lg text-center col-below">
						
						<p>{$seance.nom_type_de_cours|upper}, avec {$seance.prenom_utilisateur|capitalize} <br/>
							
							{assign var=ancre value=" "|explode:$seance.nom_type_de_cours}

							<!-- ajouter l'ancre menant au type de cours à l'url -->
							<a href="?action=enseignement#{$ancre.0|lower}" class="voir-description">> voir description</a> </p>

					</div>

					<div class="col-12 col-sm-6 col-lg text-center col-below">
						
						<p class="places-dispo">
							{if ($seance.nombre_de_places-$seance.nbr_place_prise) == 0}
								COMPLET
							{elseif ($seance.annule == 1)}
								ANNULÉ
							{else}
								places disponibles : {$seance.nombre_de_places-$seance.nbr_place_prise}
							{/if}
						</p>

					</div>

					<div class="col-12 col-sm-6 col-lg text-center col-below">

						{if isset($_SESSION['id_utilisateur'])}

							{if $seance.A_Reserver == true}

								<!-- à afficher seulement si le membre est connecté et est un participant de la séance -->
								<a href="?action=planning&id_annuler={$seance.id_seance}" class="btn btn-primary shadow-none btn-reserver">ANNULER</a>

							{elseif ($seance.nombre_de_places-$seance.nbr_place_prise) == 0}

								<!--DOIT ETRE LAISSE VIDE : si la personne n'a pas reserver et que le cours est complet, affiche COMPLET-->

							{elseif ($seance.annule == 1)}

								<!--DOIT ETRE LAISSE VIDE -->

							{else}

								<!-- à afficher seulement si le membre est connecté et ne participe pas à la séance -->
								<a href="?action=planning&id_reservation={$seance.id_seance}" class="btn btn-primary shadow-none btn-reserver">RESERVER</a>

							{/if}

						{else}

							<!-- à afficher seulement si le membre n'est pas connecté/inscrit -->
							<a href="?action=connexion" class="btn btn-primary shadow-none btn-reserver">SE CONNECTER</a>

						{/if}


						{if $_SESSION['rang'] == admin OR $_SESSION['id_utilisateur'] == $seance.id_utilisateur}

							<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('admin-seance-{$seance.id_seance}');"><i class="fas fa-user-cog"></i></button>

						{/if}

					</div>

				</div>

				{if $_SESSION['rang'] == admin OR $_SESSION['id_utilisateur'] == $seance.id_utilisateur}

				<!-- à afficher seulement pour les admins OU le prof concerné par le cours, s'il est modérateur -->
				<div class="admin-seance row justify-content-center background-light hidden" id="admin-seance-{$seance.id_seance}">
					
					<div class="col-12 col-lg-4">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('liste-participants-{$seance.id_seance}');">VOIR LES PARTICIPANTS</button>

					</div>

					<div class="col-12 col-lg-4">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('modif-seance-{$seance.id_seance}');">MODIFIER LA SEANCE</button>

					</div>

					<div class="col-12 col-lg-4">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('annuler-seance-{$seance.id_seance}');">ANNULER LA SEANCE</button>

					</div>

				</div>

				<!-- à afficher au clic de l'admin sur le bouton "Voir les participants" -->
				<div class="row hidden background-light" id="liste-participants-{$seance.id_seance}">

					<div class="col-12">
						
						<p>Liste des participants :</p>

					</div>
					
					<div class="col-12">
						
						<ul class="list-style-none">

							{foreach from=$seance.participants item=participant}

								<li>{$participant.prenom_utilisateur|capitalize} {$participant.nom_utilisateur|upper} 
									<a class="btn-link" href="?action=planning&delete_seance_du_participant={$seance.id_seance}&delete_participant_a_une_seance={$participant.id_utilisateur}&page={if isset($page)}{$page}{else}1{/if}#id-seance-{$seance.id_seance}">Supprimer de la liste</a>
								</li>

							{/foreach}

						</ul>

					</div>

					<div class="col-12">

						{if ($seance.nombre_de_places-$seance.nbr_place_prise) == 0}

							<p>Vous ne pouvez pas ajouter de participant car la seance est complète.</p>

						{elseif $seance.annule == true}

							<p>Vous ne pouvez pas ajouter de participant car la seance est annulée.</p>

						{else}

							<button class="btn-link" onclick="showElement('ajouter-participant-{$seance.id_seance}');">+ Ajouter un participant</button>

						{/if}

					</div>

					{if isset($addParticipantSucces)}

						<div class="col-12">

							<p>{$addParticipantSucces}<p>

						</div>
						
					{/if}

					{if ($seance.nombre_de_places-$seance.nbr_place_prise) != 0}

					<!-- à afficher lorsque l'admin clique sur "Ajouter un participant" -->
					<div class="col-12 hidden" id="ajouter-participant-{$seance.id_seance}">

						<div class="col-12 col-lg-6">
						
						<form method="POST" action="?action=planning&page={if isset($page)}{$page}{else}1{/if}#id-seance-{$seance.id_seance}" class="form-recherche">

							<legend>Remplissez au moins un champ de recherche :</legend>

							<div class="form-row">
								
								<div class="col-12 col-md">
									
									<input type="email" name="email_search" placeholder="E-mail" class="form-control form-control-sm input-membre">

								</div>

								<div class="col-12 col-md">
									
									<input type="tel" name="tel_search" placeholder="Téléphone" class="form-control form-control-sm input-membre">

								</div>

								<div>
									
									<input type="number" name="id_seance" value="{$seance.id_seance}" hidden>

								</div>


								<div class="col-12 col-md col-btn">
									
									<button name="rechercher_participant" type="submit" class="btn btn-primary btn-reserver text-center">RECHERCHER</button>

								</div>

							</div>

						</form></div>



						<!-- résultats de la recherche pour Ajouter un participant à la séance -->
						{if isset($users) && $if_users_vide != 'user_vide'}

							<div class="col-12 resultat-recherche">
							
							{foreach from=$users item=user}


								<p>Résultat de la recherche :</p>

								<!-- à afficher lorsque la recherche retourne des éléments de la BDD -->
								<div class="membre-trouve">

									<div class="row">
										
										<div class="col-12 col-lg-6">
											
											<span>Nom :</span> {$user->getNom_utilisateur()|upper}

										</div>

										<div class="col-12 col-lg-6">
											
											<span>Prénom :</span> {$user->getPrenom_utilisateur()|capitalize}

										</div>

									</div>

									<div class="row">
										
										<div class="col-12 col-lg-6">
											
											<span>E-mail :</span> {$user->getEmail()}

										</div>

										<div class="col-12 col-lg-6">
											
											<span>Téléphone :</span> {$user->getTelephone()}

										</div>

									</div>

									<div class="row">
										

										<!-- au clic du bouton, ajout du membre trouvé à la liste des participants de la séance -->
										<div class="col text-center">

											<form method="POST" action="?action=planning&page={if isset($page)}{$page}{else}1{/if}#liste-participants-{$seance.id_seance}" class="form-recherche">

												<input type="number" name="id_seance" value="{$seance.id_seance}" hidden>

												<input type="number" name="id_utilisateur" value="{$user->getId_utilisateur()}" hidden>

												<input type="text" name="nom_utilisateur" value="{$user->getNom_utilisateur()}" hidden>

												<input type="text" name="prenom_utilisateur" value="{$user->getPrenom_utilisateur()}" hidden>

												<button	type="submit" name="ajouter_participant" class="btn btn-primary btn-reserver shadow-none">AJOUTER</button>

											</form>

										</div>

									</div>

								</div>

							</div> <!-- fin div résultat de la recherche -->

							{/foreach}

						{elseif empty($users) && $if_users_vide == 'user_vide'}

							<div class="col-12 resultat-recherche">

								<!-- à afficher lorsque la recherche ne retourne aucun résultat -->
								<p class="text-center">Aucun membre trouvé. Veuillez vérifier les informations de recherche.</p>

							</div> <!-- fin div résultat de la recherche -->

						{/if}

						</div> <!-- fin div "Ajouter un participant" -->

					{/if}

				</div> <!-- fin div "Voir les participants" -->



				<!-- à afficher au clic de l'admin sur le bouton "Modifier la séance" -->
				<div class="row hidden background-light align-items-center justify-content-around" id="modif-seance-{$seance.id_seance}">
					
					<!-- form à pré-remplir avec les informations de la séance concernée -->
					<form class="form_ajax" method="post" action="" >
						
						<div class="form-row align-items-end ">
							
							<div class="col-12 col-sm-6 col-lg">
								
								<label for="date-seance">Date :</label>
								<input type="date" value="{$seance.date_seance}" name="date_seance" class="form-control">

							</div>

							<div class="col-12 col-sm-6 col-lg">

								{assign var="cmpt" value=$cmpt+1}

								<label for="type-cours">Type de cours :</label>
								<select class="form-control" name="nom_cours" id="ajaxCours-{$cmpt}">
									
									{foreach from=$noms_des_cours item=nom_cours}

										<option {if $seance.nom_type_de_cours == $nom_cours.nom_type_de_cours} selected="selected"{/if} value="{$nom_cours.id_type_de_cours}">{$nom_cours.nom_type_de_cours|capitalize}</option>

									{/foreach}

								</select>

							</div>

							<div class="col-12 col-sm">
								

								<label for="type-cours">Enseignant :</label>
								<select class="form-control" name="prenom_professeur" id="enseignant-{$cmpt}">
									
									{foreach from=$prenoms_professeurs item=prenom_professeur}

										<option {if $seance.prenom_utilisateur == $prenom_professeur.prenom_utilisateur} selected="selected"{/if} value="{$prenom_professeur.id_professeur}">{$prenom_professeur.prenom_utilisateur|capitalize}</option>

									{/foreach}

								</select>

							</div>

							<div class="col-12 col-sm">
								
								<label for="heure-debut">Heure de début :</label>
								<input type="time" value="{$seance.heure_debut_seance}" name="heure_debut" class="form-control">

							</div>

							<div class="col-12 col-sm">
								
								<label for="heure-debut">Heure de fin :</label>
								<input type="time" value="{$seance.heure_fin_seance}" name="heure_fin" class="form-control">

							</div>

							<input type="number" value="{$seance.id_seance}" name="id_seance" class="hidden">

							<div class="col-12 col-sm btn-col">
								
								<button class="btn btn-primary btn-admin shadow-none" name="Modif_seance" type="submit">MODIFIER</button>

							</div>

						</div>

					</form>

				</div>



				<!-- à afficher au clic de l'admin sur le bouton "Annuler la séance" -->
				<div class="row hidden background-light align-items-center justify-content-start" id="annuler-seance-{$seance.id_seance}">

					<form method="post" action="" class="col-12">

						<div class="col-12 col-sm-6">
						
							<div class="form-row">

								<input type="number" value="{$seance.id_seance}" name="id_seance" class="hidden">
								<input type="number" value="{$seance.id_professeur}" name="id_professeur" class="hidden">

								
								<input type="checkbox" name="annuler-seance" class="form-check-input">
								<label for="annuler-seance" class="form-check-label">J'annule cette séance. Tous les participants seront informés de l'annulation. </label>
							
							</div>

						</div>

						<div class="col-12 col-sm-6 col-xl-2 text-center">
						
							<!-- au clic du bouton, supprimer la séance concernée de la BDD -->
							<button class="btn btn-primary btn-admin shadow-none" name="annuler_seance" type="submit">ANNULER LA SEANCE</button>

						</div>

					</form>
					

				</div>

				{/if}

				{/foreach} {* DEBUT LIGNE 237 *}

				{if empty($seances)}
					
					<div class="row background-light align-items-center justify-content-start">

						<p>Il n'y a pas de cours prévus sur cette semaine.</p>

					</div>

				{/if}

				<!-- fin affichage dynamique du planning -->


				<div class="row planning-footer justify-content-around">
						
					<div class="col text-left">
						
						<p class="titre-head">Trouver un cours</p>

					</div>

					<div class="col text-right">
						
						<a href="?action=espace_personnel">Mon compte</a>

					</div>

				</div>

			</div>	<!-- fin div planning-dynamique -->

		</div> <!-- fin div container -->

		<!-- Scroll top + footer -->
		{include file = 'footer.tpl'}

		<!--Ajout des scripts qui gèrent la réouverture des onclick si la page est rechargée-->
		<script type="text/javascript" src="assets/js/ajax.js"></script>
		
		{if isset($onclick_admin_seance)}

			
			{$onclick_admin_seance}

		{/if}

		{if isset($onclick_liste_participants)}

			{$onclick_liste_participants}

		{/if}
		
		{if isset($onclick_ajouter_participant)}

			{$onclick_ajouter_participant}

		{/if}
			
	</body>
</html>