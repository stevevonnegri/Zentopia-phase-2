
<!-- contenu de la basile header (qui a les classes header-homepage et header-all pour différencier les background) -->

<div class="nav-bg"> <!-- set le bandeau de la nav -->

	<div class="container-fluid"> <!-- set les marges intérieures du bandeau -->

		<div class="rs-logos"> 
			<a href="#"><i class="fab fa-youtube"></i></a>
			<a href="#"><i class="fab fa-instagram-square"></i></a>
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
		</div>

		
		<div class="row">

			<nav class="col navbar navbar-expand-xl navbar-light"> <!-- navbar dark/light nécessaire pour que l'icon burger apparaisse! -->
				<a class="navbar-brand col-logo" href="index.php">
					<img src="assets/logos/logo_horizontal.png" width="250" height="100" alt="logo"/>
				</a>


				<!-- le menu burger responsive (ID doit être le même que le collapse plus bas) -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>


				<div id="navbarContent" class="collapse navbar-collapse">

					
					<ul class="navbar-nav ml-auto"> <!-- ml/mr/mx-auto pour centrer la nav -->


						<li class="nav-item {if $active==accueil}active{/if}"><a class="nav-link" href="index.php">ACCUEIL</a></li>


						<li class="nav-item {if $active==la_team}active{/if}"><a class="nav-link" href="?action=la_team">LA TEAM</a></li>
						

						<li class="nav-item {if $active==enseignement}active{/if}"><a class="nav-link" href="?action=enseignement">ENSEIGNEMENT</a></li>
						

						<!-- la partie dropdown contenant les pages Planning et Tarifs -->
						<li class="nav-item dropdown {if $active==les_cours}active{/if}"><a class="nav-link dropdown-toggle" href="..." id="navbarDropDownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >LES COURS</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropDownMenuLink">
								<a href="?action=planning" class="dropdown-item">PLANNING</a>
								<a href="?action=tarifs" class="dropdown-item">TARIFS</a>
							</div>
						</li>
						

						<li class="nav-item {if $active==contact}active{/if}"><a class="nav-link" href="?action=contact">CONTACT</a></li>

						<!-- si session non active : affiche ESPACE MEMEBRE et lien vers la page de connexion 
							 si session active : affiche MON ESPACE et lien vers la pace "Espace personnel" -->

						{if !isset($_SESSION['id_utilisateur'])}
							<li><a href="?action=connexion" class="btn btn-primary btn-espace-membre shadow-none">ESPACE PERSONNEL</a></li>
						{else}
							<li><a href="?action=espace_personnel" class="btn btn-primary btn-espace-membre shadow-none">MON ESPACE</a></li>
						{/if}
						

					</ul>

				</div>

			</nav>	

		</div>
			
	</div>
	
</div>