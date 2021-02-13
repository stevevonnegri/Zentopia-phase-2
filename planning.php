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


			<div class="planning-dynamique">
			
				<div class="row planning-head justify-content-around align-items-center">
						
					<div class="col text-left">
						
						<p class="titre-head">Trouver un cours</p>

					</div>


					<!-- à afficher seulement pour les admins !-->
					<div class="col-3">
						
						<!-- affiche le formulaire d'ajout de cours au clic -->
						<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('ajouter-seance');">+ AJOUTER UN COURS</button>

					</div>

					<div class="col text-right">
						
						<a href="espace-personnel.php">Mon compte</a>

					</div>

				</div>

				<!-- formulaire d'ajout de cours qui ne s'affiche qu'au clic du bouton -->
				<div class="row hidden " id="ajouter-seance">
					
					<form method="post" action="">
						
						<div class="form-row align-items-end">
							
							<div class="col">
								
								<label for="date-seance">Date :</label>
								<input type="date" name="date-seance" class="form-control">

							</div>

							<div class="col">
								
								<!-- optionnel : récupérer tous les types de cours dynamiquement pour les afficher dans le select -->
								<label for="type-cours">Type de cours :</label>
								<select class="form-control">
									
									<option value="hatha">Hatha</option>
									<option value="vinyasa">Vinyasa</option>
									<option value="slow-yoga">Slow yoga</option>
									<option value="kid-yoga">Kid yoga</option>
									<option value="meditation-guidee">Méditation guidée</option>
									<option value="meditation-tibetaine">Méditation tibétaine</option>

								</select>

							</div>

							<div class="col">
								
								<!-- optionnel : récupérer les profs dynamiquement pour les afficher dans le select -->
								<label for="type-cours">Enseignant :</label>
								<select class="form-control">
									
									<option value="olenna">Olenna</option>
									<option value="morgane">Morgane</option>
									<option value="helene">Hélène</option>
									<option value="lena">Léna</option>
									<option value="marie">Marie</option>
									<option value="bastien">Bastien</option>

								</select>

							</div>

							<div class="col">
								
								<label for="heure-debut">Heure de début :</label>
								<input type="time" name="heure-debut" class="form-control">

							</div>

							<div class="col">
								
								<label for="heure-debut">Heure de fin :</label>
								<input type="time" name="heure-fin" class="form-control">

							</div>

							<div class="col">
								
								<button class="btn btn-primary btn-admin shadow-none" type="submit">AJOUTER</button>

							</div>

						</div>

					</form>

				</div>


				<div class="row background-light align-items-center planning-search">
					
					<div class="col-3">
						
						<!-- optionnel: implémenter une règle 'active' (avec border-bottom qui souligne) pour indiquer où on se trouve dans les pages du planning (SEMAINE ACTUELLE + Page "1" ou Page "2" ou Page "3") -->
						<a href="#" class="semaine-actuelle">SEMAINE ACTUELLE</a>

					</div>

					<div class="col-2">
						
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>

					</div>

					<div class="col-7">
						
						<form method="post" accept="">

							<div class="form-row align-items-center justify-content-end">
							
							<!-- optionnel : récupérer tous les types de cours dynamiquement pour les afficher dans le select -->
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

							<button class="btn btn-primary btn-reserver shadow-none">FILTRER</button></div>

						</form>

					</div>

				</div>

				<div class="row background-jour">
					
					<div class="col">
						
						<p>lundi 25 janvier</p>

					</div>

				</div>

				<div class="row background-light align-items-center seance-element">
					
					<div class="col">
						
						<p>8h30 - 10h</p>

					</div>

					<div class="col">
						
						<p>SLOW YOGA <br/>
							<!-- ajouter l'ancre menant au type de cours à l'url -->
							<a href="enseignement.php" class="voir-description">> voir description</a> </p>

					</div>

					<div class="col">
						
						<p>avec Marie</p>

					</div>

					<div class="col">
						
						<p class="places-dispo">places disponibles</p>

					</div>

					<div class="col">

						<!-- à afficher seulement si le membre est connecté et ne participe pas à la séance -->
						<!-- au clic du bouton, le membre doit être ajouté à la liste des participants, et la page devrait se recharger. (à voir comment ça se comporte avec le Modal de confirmation, il faudra peut-être intégrer la redirection dans le Modal?)-->
						<button class="btn btn-primary shadow-none btn-reserver" data-toggle="modal" data-target="#confirmation-reservation">RESERVER</button>

						<!-- à afficher seulement si le membre est connecté et est un participant de la séance -->
						<!-- au clic du bouton, le membre doit être retiré de la liste des participants, et la page devrait se recharger. (à voir comment ça se comporte avec le Modal de confirmation d'annulation, il faudra peut-être intégrer la redirection dans le Modal?)-->
						<!--<button class="btn btn-primary shadow-none btn-reserver" data-toggle="modal" data-target="#confirmation-annulation">ANNULER</button>-->

						<!-- à afficher seulement si le membre n'est pas connecté/inscrit -->
						<a href="connexion.php" class="btn btn-primary shadow-none btn-reserver">SE CONNECTER</a>

						<!-- à afficher seulement pour les admins et les profs/modé dont c'est le cours -->
						<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('admin-seance');"><i class="fas fa-user-cog"></i></button>

					</div>


					<!-- Modal de confirmation de réservation à afficher lors que le membre clique sur le bouton RESERVER -->
					<div class="modal fade" id="confirmation-reservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  
						<div class="modal-dialog modal-dialog-centered" role="document">

					    	<div class="modal-content">

					    		<div class="modal-header">

					        		<h5 class="modal-title" id="exampleModalLongTitle">Confirmation de réservation</h5>

					        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					          			<span aria-hidden="true">&times;</span>

					        		</button>

					      		</div>

					      		<div class="modal-body">

					        		Votre séance a bien été réservée. Vous allez bientôt recevoir un mail de confirmation.

					      		</div>

					      		<div class="modal-footer">

					        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					      		</div>

					    	</div>

					  	</div>

					</div> <!-- fin div modal -->

					<!-- Modal de confirmation d'annulation à afficher lors que le membre clique sur le bouton ANNULER sur une séance où il participe -->
					<div class="modal fade" id="confirmation-annulation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  
						<div class="modal-dialog modal-dialog-centered" role="document">

					    	<div class="modal-content">

					    		<div class="modal-header">

					        		<h5 class="modal-title" id="exampleModalLongTitle">Confirmation d'annulation</h5>

					        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					          			<span aria-hidden="true">&times;</span>

					        		</button>

					      		</div>

					      		<div class="modal-body">

					        		La réservation à cette séance a bien été annulée. Vous allez bientôt recevoir un mail de confirmation.

					      		</div>

					      		<div class="modal-footer">

					        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

					      		</div>

					    	</div>

					  	</div>

					</div> <!-- fin div modal -->

				</div>


				<!-- à afficher seulement pour les admins OU le prof concerné par le cours, s'il est modérateur -->
				<div class="admin-seance row justify-content-start background-light hidden" id="admin-seance">
					
					<div class="col-3">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('liste-participants');">VOIR LES PARTICIPANTS</button>

					</div>

					<div class="col-3">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('modif-seance');">MODIFIER LA SEANCE</button>

					</div>

					<div class="col-3">
						
						<button class="btn btn-primary shadow-none btn-admin" onclick="showElement('annuler-seance');">ANNULER LA SEANCE</button>

					</div>

				</div>

				<!-- à afficher au clic de l'admin sur le bouton "Voir les participants" -->
				<div class="row hidden background-light" id="liste-participants">

					<div class="col-12">
						
						<p>Liste des participants :</p>

					</div>
					
					<div class="col-12">
						
						<!-- à remplacer par les données de la BDD -->
						<ul class="list-style-none">

							<!-- bouton doit supprimer le participant de la séance -->
							<li>Jordan Herth <button class="btn-link">Supprimer de la liste</button></li>

							<li>Emilien Fuchs <button class="btn-link">Supprimer de la liste</button></li>
						</ul>

					</div>

					<div class="col-12">
						
						<button class="btn-link" onclick="showElement('ajouter-participant');">+ Ajouter un participant</button>

					</div>


					<!-- à afficher lorsque l'admin clique sur "Ajouter un participant" -->
					<div class="col-12 hidden" id="ajouter-participant">

						<div class="col-6">
						
						<form method="post" action="" class="form-recherche">

							<legend>Remplissez au moins un champ de recherche :</legend>

							<div class="form-row">
								
								<div class="col">
									
									<input type="email" name="email" placeholder="E-mail" class="form-control form-control-sm input-membre">

								</div>

								<div class="col">
									
									<input type="tel" name="telephone" placeholder="Téléphone" class="form-control form-control-sm input-membre">

								</div>

								<div class="col">
									
									<button type="submit" class="btn btn-primary btn-reserver text-center">RECHERCHER</button>

								</div>

							</div>

						</form></div>



						<!-- résultats de la recherche pour Ajouter un participant à la séance -->
						<div class="col-12 resultat-recherche">
							
							<p>Résultat de la recherche :</p>
								
							<!-- à afficher lorsque la recherche ne retourne aucun résultat -->
							<!--<p class="text-center">Aucun membre trouvé. Veuillez vérifier les informations de recherche.</p>-->

							<!-- à afficher lorsque la recherche retourne des éléments de la BDD -->
							<div class="membre-trouve">

								<div class="row">
									
									<div class="col">
										
										<span>Nom :</span> Bironneau

									</div>

									<div class="col">
										
										<span>Prénom :</span> Anaïs

									</div>

								</div>

								<div class="row">
									
									<div class="col">
										
										<span>E-mail :</span> monadressemail@gmail.com

									</div>

									<div class="col">
										
										<span>Téléphone :</span> 0677777777

									</div>

								</div>

								<div class="row">
									

									<!-- au clic du bouton, ajout du membre trouvé à la liste des participants de la séance -->
									<div class="col text-center">
										
										<button class="btn btn-primary btn-reserver shadow-none">AJOUTER</button>

									</div>

								</div>

							</div>

						</div> <!-- fin div résultat de la recherche -->

					</div> <!-- fin div "Ajouter un participant" -->

				</div> <!-- fin div "Voir les participants" -->



				<!-- à afficher au clic de l'admin sur le bouton "Modifier la séance" -->
				<div class="row hidden background-light align-items-center" id="modif-seance">
					
					<!-- form à pré-remplir avec les informations de la séance concernée -->
					<form method="post" action="">
						
						<div class="form-row align-items-end">
							
							<div class="col">
								
								<label for="date-seance">Date :</label>
								<input type="date" name="date-seance" class="form-control">

							</div>

							<div class="col">
								
								<!-- optionnel : récupérer tous les types de cours dynamiquement pour les afficher dans le select -->
								<label for="type-cours">Type de cours :</label>
								<select class="form-control">
									
									<option value="hatha">Hatha</option>
									<option value="vinyasa">Vinyasa</option>
									<option value="slow-yoga">Slow yoga</option>
									<option value="kid-yoga">Kid yoga</option>
									<option value="meditation-guidee">Méditation guidée</option>
									<option value="meditation-tibetaine">Méditation tibétaine</option>

								</select>

							</div>

							<div class="col">
								
								<!-- optionnel : récupérer les profs dynamiquement pour les afficher dans le select -->
								<label for="type-cours">Enseignant :</label>
								<select class="form-control">
									
									<option value="olenna">Olenna</option>
									<option value="morgane">Morgane</option>
									<option value="helene">Hélène</option>
									<option value="lena">Léna</option>
									<option value="marie">Marie</option>
									<option value="bastien">Bastien</option>

								</select>

							</div>

							<div class="col">
								
								<label for="heure-debut">Heure de début :</label>
								<input type="time" name="heure-debut" class="form-control">

							</div>

							<div class="col">
								
								<label for="heure-debut">Heure de fin :</label>
								<input type="time" name="heure-fin" class="form-control">

							</div>

							<div class="col">
								
								<button class="btn btn-primary btn-admin shadow-none" type="submit">MODIFIER</button>

							</div>

						</div>

					</form>

				</div>



				<!-- à afficher au clic de l'admin sur le bouton "Annuler la séance" -->
				<div class="row hidden background-light align-items-center justify-content-start" id="annuler-seance">

					<div class="col">
						
						<form method="post" action="">

							<div class="form-row">
							
							<input type="checkbox" name="annuler-seance" class="form-check-input">
							<label for="annuler-seance" class="form-check-label">J'annule cette séance. Tous les participants seront informés de l'annulation. </label></div>

						</form>

					</div>

					<div class="col-2 text-center">
						
						<!-- au clic du bouton, supprimer la séance concernée de la BDD -->
						<button class="btn btn-primary btn-admin shadow-none">ANNULER LA SEANCE</button>

					</div>
					
					

				</div>


				<!-- fin affichage dynamique du planning -->


				<div class="row planning-footer justify-content-around">
						
					<div class="col text-left">
						
						<p class="titre-head">Trouver un cours</p>

					</div>

					<div class="col text-right">
						
						<a href="espace-personnel.php">Mon compte</a>

					</div>

				</div>

			</div>	<!-- fin div planning-dynamique -->

		</div> <!-- fin div container -->



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

	<script type="text/javascript" src="js/script.js"></script>

	</body>
</html>