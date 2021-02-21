<!DOCTYPE html>
<html lang="fr-FR">
	<head>

		<title>
		{if $_SESSION.rang == 'moderateur'}
		Interface modérateur - Zentopia
		{/if}

		{if $_SESSION.rang == 'admin'}
		Interface administrateur - Zentopia
		{/if}
		</title>

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


		<div class="container espace-content">

			<div class="row">
			
				<div class="col-12 col-md-4 col-lg-3 col-left">

					<div class="menu-left text-center">
						
						<img src="assets/icons/yoga-male.png" class="img-fluid"/>

						<!-- à remplacer par une variable prénom de l'utilisateur -->
						<p>Bonjour Anaïs</p>

						<a href="?action=espace_personnel" class="btn btn-primary btn-menu-left shadow-none">MES INFORMATIONS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace_personnel#mes-cours" class="btn btn-primary btn-menu-left shadow-none">MES COURS <i class="fas fa-caret-right text-right"></i></a>

						<a href="?action=espace_personnel#mon-avis" class="btn btn-primary btn-menu-left shadow-none">MON AVIS CLIENT<i class="fas fa-caret-right text-right"></i></a>

						<!-- afficher seulement si modérateur / admin -->
						<a href="?action=interface_moderateur" class="btn btn-primary btn-admin shadow-none">

							{if $_SESSION.rang == 'moderateur'}
							MODERATION
							{/if}

							{if $_SESSION.rang == 'admin'}
							ADMINISTRATION
							{/if}							
							

							<i class="fas fa-caret-right text-right"></i></a>

						<!-- déconnecter la session et quitter la page au clic -->
						<a href="?action=interface_moderateur&deconnexion=true" class="btn btn-primary btn-red shadow-none">DECONNEXION</a>

					</div>

				</div>

				<div class="col col-right">
					
					<div class="block-moderation">
						
						<h1>

						{if $_SESSION.rang == 'moderateur'}
						MODERATION
						{/if}

						{if $_SESSION.rang == 'admin'}
						ADMINISTRATION
						{/if}

						</h1>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_moderateur&amp;avis=true" class="btn btn-primary btn-admin shadow-none">GERER LES AVIS CLIENTS</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="#" class="btn btn-primary btn-admin shadow-none">GERER LA GALERIE</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="?action=interface_moderateur&amp;membres=true" class="btn btn-primary btn-admin shadow-none">

									{if $_SESSION.rang == 'admin'}
									GERER LES MEMBRES
									{/if}

									{if $_SESSION.rang == 'moderateur'}
									RECHERCHER UN MEMBRE
									{/if}

									</a>

							</div>

						</div>

						<div class="row">
							
							<div class="col text-center">
									
									<a href="#" class="btn btn-primary btn-admin shadow-none">ACCEDER AU PLANNING</a>

							</div>

						</div>

					


						<!-- BLOC AVIS CLIENT -->
						<!-- apparaît si le modé/admin a cliqué sur "Gérer les avis client"-->
						{if isset($gerer_avis)}

							<h2>Gérer les avis clients</h2>


							<!-- à afficher s'il y a des avis en attente de modération-->
							{if isset($avis_en_attente)}
								<p>Avis en attente de modération :</p>

								{foreach from=$avis_en_attente item=avis}
									<div class="avis-client">

										<div class="avis-client-inner">
											
											<p>Auteur : {$avis.prenom_utilisateur}, {$avis.age} ans</p>
											<p>Note : {$avis.niveau_avis}/5</p>
											<p>Avis : {$avis.contenu_avis}</p>

										</div>

										<div class="row justify-content-start">
											
											<div class="col-6 col-lg-3">

												<a href="?action=interface_moderateur&amp;avis=true&amp;valider=true&amp;id={$avis.id_avis}" class="btn btn-primary btn-admin shadow-none">VALIDER</a>

											</div>

											<div class="col-6 col-lg-3">
												
												<a href="?action=interface_moderateur&amp;avis=true&amp;refuser=true&amp;id={$avis.id_avis}" class="btn btn-primary btn-admin shadow-none">REFUSER</a>

											</div>

										</div>

									</div>
								{/foreach}

							<!-- à afficher lorsqu'il n'y a pas d'avis en attente-->
							{else}
								<p class="text-center">Il n'y a pas d'avis client en attente de modération.</p>

							{/if}


							{if isset($liste_avis)}

								<p>Avis validés :</p>

								{foreach from=$avis_valides item=avis}
									<div class="avis-client">

										<div class="avis-client-inner">
											
											<p>Auteur : {$avis.prenom_utilisateur}, {$avis.age} ans</p>
											<p>Note : {$avis.niveau_avis}/5</p>
											<p>Avis : {$avis.contenu_avis}</p>

										</div>

										<div class="row justify-content-start">
											

											<div class="col-6 col-lg-3">
												
												<a href="?action=interface_moderateur&amp;avis=true&amp;liste=true&amp;supprimer=true&amp;id={$avis.id_avis}" class="btn btn-primary btn-admin shadow-none">SUPPRIMER</a>

											</div>

										</div>

									</div>
								{/foreach}

							{/if}
							

							<div class="col text-right">

								<!-- bouton qui va charger la liste de TOUS les avis, à commencer par ceux qui sont encore en attente de modération s'il y en a, puis les autres du plus récent au plus ancien -->
								<!-- pour le html/css, récupérer la même structure que les avis en attente de modération -->
								<a href="?action=interface_moderateur&amp;avis=true&amp;liste=true" class="afficher-liste">Afficher la totalité des avis</a>

							</div>

						{/if} <!-- FIN BLOCK AVIS CLIENT -->



						<!-- BLOC RECHERCHER UN MEMBRE -->
						<!-- apparaît si le modé/admin a cliqué sur "Rechercher un membre"-->
						{if isset($rechercher_membre)}

							<h2>Rechercher un membre</h2>

							<form method="post" action="?action=interface_moderateur&amp;membres=true" class="form-recherche">

								<legend>Spécifiez au moins un critère de recherche :</legend>

								<div class="form-row">
									
									<div class="col-12 col-lg">
										
										<input type="text" name="nom_search" placeholder="Nom" class="form-control input-membre">

									</div>

									<div class="col-12 col-lg">
										
										<input type="text" name="prenom_search" placeholder="Prénom" class="form-control input-membre">

									</div>

									<div class="col-12 col-lg">
										
										<input type="telephone" name="telephone_search" placeholder="Téléphone" class="form-control input-membre">

									</div>

									{if isset($admin)}

										<div class="col-12 col-lg">
										
											<select name="rang_search" class="form-control">
												
												<option value="">--Rang--</option>
												<option value="membre">Membre</option>
												<option value="moderateur">Modérateur</option>
												<option value="admin">Admin</option>

											</select>

										</div>

									{/if}

								</div>


								<div class="row">
									
									<div class="col text-center">
										
										<button type="submit" class="btn btn-primary btn-red text-center">RECHERCHER</button>

										{if isset($champs_vides)}

											<p class="error">Veuillez spécifier au moins un champ de recherche.</p>

										{/if}


										{if isset($confirm_suppr)}

											<p class="error">Le compte client a bien été supprimé.</p>

										{/if}



									</div>

								</div>	

							</form>


							{if isset($resultat_vide)}

								<p>Résultat de la recherche :</p>

								<p class="error text-center">Aucun membre trouvé.</p>

							{/if}


							{if isset($users)}

								<div class="resultat-recherche">

									<p>Résultat de la recherche :</p>

									
									{foreach from=$users item=user}

										<!-- à afficher lorsque la recherche retourne des éléments de la BDD -->
										<div class="membre-trouve">

											<div class="row">
												
												<div class="col-12 col-lg">
													
													<span>Nom :</span> {$user->getNom_utilisateur()}

												</div>

												<div class="col-12 col-lg">
													
													<span>Prénom :</span> {$user->getPrenom_utilisateur()}

												</div>

											</div>

											<div class="row">
												
												<div class="col-12 col-lg">
													
													<span>E-mail :</span> {$user->getEmail()}

												</div>

												<div class="col-12 col-lg">
													
													<span>Téléphone :</span> {$user->getTelephone()}

												</div>

											</div>

											{if isset($admin)}

												<div class="row">
											
													<div class="col-12 col-lg">
														
														<span>Genre :</span> {$user->getGenre()}

													</div>

													<div class="col-12 col-lg">
														
														<span>Date de naissance :</span> {$user->getDate_de_naissance()}

													</div>

												</div>

												<div class="row">
													
													<div class="col-12 col-lg">
														
														<span>Adresse (rue) :</span> {$user->getAdresse_rue()}

													</div>

													<div class="col-12 col-lg">
														
														<span>Code postal :</span> {$user->getAdresse_code_postal()}

													</div>

												</div>

												<div class="row">
													
													<div class="col-12 col-lg">
														
														<span>Ville :</span> {$user->getAdresse_ville()}

													</div>

													<div class="col-12 col-lg">
														
														<span>Rang :</span> {$user->getRang()}

													</div>

												</div>


												<div class="row row-btn">
											
													<div class="col-12 col-lg text-center">
														
														<a href="?action=interface_moderateur&amp;membres=true&amp;id_modif={$user->getId_utilisateur()}" class="btn btn-primary btn-admin shadow-none">MODIFIER</a>

													</div>

													<div class="col-12 col-lg text-center">
														
														<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('confirmation-suppr-membre-{$user->getId_utilisateur()}');">SUPPRIMER LE MEMBRE</button>

													</div>

												</div>

												<!-- confirmation de suppression du compte du membre, ne s'affiche qu'au clic de l'admin sur le bouton supprimer compte -->
												<div id="confirmation-suppr-membre-{$user->getId_utilisateur()}" class="hidden">

													<p class="error text-center">Attention, cette action est irrémédiable. Une fois le compte supprimé, vous ne pourrez plus le récupérer.</p>

													<form action="?action=interface_moderateur&amp;membres=true&amp;id_suppr={$user->getId_utilisateur()}" method="post" class="form-check">
														
														<input type="checkbox" name="suppr-compte" class="form-check-input" required>
														<label for="confirmation-suppression-compte" class="form-check-label">Je souhaite supprimer définitivement ce compte. </label>

														<div class="row justify-content-center">

															<div class="row text-center">
																
																<input type="submit" name="supprimer-membre" class="btn btn-primary btn-red" value="SUPPRIMER LE COMPTE">

															</div>

														</div>

													</form>
												
												</div>

											{/if}

										</div> <!-- fin div élément trouvé -->

									{/foreach}

								</div>

							{/if}

						{/if}



						<!-- BLOC MODIFIER LES INFOS MEMBRES -->
						<!-- apparaît si l'admin a cliqué sur "Modifier" pour modifier les infos d'un membre-->
						{if isset($modif_form) && isset($user_modif)}

							<form class="membre-trouve" method="post" action="?action=interface_moderateur&amp;membres=true&amp;id_modif={$user_modif->getId_utilisateur()}">

								<div class="row">

									<div class="col-12 col-lg-6">
										
										<legend>Civilité :</legend>

										<input type="radio" name="genre" id="femme" value="Femme" required 
										{if $user_modif->getGenre() == 'Femme' } checked {/if}>

										<label for="femme">Mme</label>

										<input type="radio" name="genre" id="homme" value="Homme"
										{if $user_modif->getGenre() == 'Homme' } checked {/if}>

										<label for="homme">Mr</label>

									</div>

									<div class="col-12 col-lg-6">
										
										<label for="">Date de naissance :</label>
										<input type="date" name="date_de_naissance" class="form-control" value="{$user_modif->getDate_de_naissance()}">

									</div>
									

								</div>

								<div class="row">

									<div class="col-12 col-lg-6">
										
										<label for="">Prénom :</label>
										<input type="text" name="prenom_utilisateur" class="form-control" value="{$user_modif->getPrenom_utilisateur()}">

									</div>

									<div class="col-12 col-lg-6">
										
										<label for="">Nom :</label>
										<input type="text" name="nom_utilisateur" class="form-control" value="{$user_modif->getNom_utilisateur()}">

									</div>
									
								</div>

								<div class="row">
									
									<div class="col-12 col-lg-6">
										
										<label for="">Email :</label>
										<input type="email" name="email" class="form-control" value="{$user_modif->getEmail()}">

									</div>

									<div class="col-12 col-lg-6">
										
										<label for="">Téléphone :</label>
										<input type="tel" name="telephone" class="form-control" value="{$user_modif->getTelephone()}">

									</div>

								</div>

								<div class="row">
									
									<div class="col-12 col-lg-6">
										
										<label for="">Code postal :</label>
										<input type="number" name="adresse_code_postal" class="form-control" value="{$user_modif->getAdresse_code_postal()}">

									</div>

									<div class="col-12 col-lg-6">

										<label for="">Ville :</label>
										<input type="text" name="adresse_ville" class="form-control" value="{$user_modif->getAdresse_ville()}">

									</div>

								</div>

								<div class="row align-items-center">
									
									<div class="col">
										
										<label for="">Adresse :</label>
										<input type="text" name="adresse_rue" class="form-control" value="{$user_modif->getAdresse_rue()}">

									</div>

								</div>

								<div class="row align-items-center">

									<div class="col">
										
										<select name="rang" class="form-control">
										
										<option value="membre" {if $user_modif->getRang() == 'membre' } selected {/if}>--Membre--</option>
										<option value="moderateur" {if $user_modif->getRang() == 'moderateur' } selected {/if}>--Modérateur--</option>
										<option value="admin" {if $user_modif->getRang() == 'admin' } selected {/if}>--Admin--</option>

									</select>

									</div>
									
								</div>
								

								<div class="row">

									<div class="col text-center">

										{if isset($champ_invalide)}

											<p class="error">{$champ_invalide}</p>

										{/if}
			
										<input type="submit" class="btn btn-primary btn-red shadow-none" value="VALIDER">



									</div>

								</div>

							</form>

						{/if}


					</div> <!-- fin block modération -->

				</div>

			</div>

		</div>

		<!-- Scroll top + footer -->
		<!-- <?php include("footer.php"); ?> -->
		{include file = 'footer.tpl'}

	</body>
</html>