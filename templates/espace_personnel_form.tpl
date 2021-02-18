<div class="col col-right">
	
	<form class="block-coordonnees" action="?action=espace_personnel&form=active" method="POST">

		<h1>MES COORDONNEES</h1>

		<div class="row">

			<div class="col-12 col-lg-6">
				
				<legend>Civilité :</legend>

				<input checked="{if $_SESSION.genre == Femme}checked{/if}"
				type="radio" name="genre" id="femme" value="Femme" required>
				<label for="femme">Mme</label>

				<input checked="{if $_SESSION.genre == Homme}checked{/if}"
				type="radio" name="genre" id="homme" value="Homme">
				<label for="homme">Mr</label>

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Date de naissance :</label>
				<input value="{$_SESSION.date_de_naissance}"
				type="date" name="date_de_naissance" class="form-control">
				{if isset($error_date_naissance_message)}
					{$error_date_naissance_message}
				{/if}

			</div>
			

		</div>

		<div class="row">

			<div class="col-12 col-lg-6">
				
				<label for="">Prénom :</label>
				<input value="{$_SESSION.prenom_utilisateur}"
				type="text" name="prenom" class="form-control">
				{if isset($error_prenom_utilisateur_message)}
					{$error_prenom_utilisateur_message}
				{/if}

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Nom :</label>
				<input value="{$_SESSION.nom_utilisateur}"
				type="text" name="nom" class="form-control">
				{if isset($error_nom_utilisateur_message)}
					{$error_nom_utilisateur_message}
				{/if}

			</div>
			
		</div>

		<div class="row">
			
			<div class="col-12 col-lg-6">
				
				<label for="">Email :</label>
				<input value="{$_SESSION.email}"
				type="email" name="email" class="form-control">
				{if isset($error_email_message)}
					{$error_email_message}
				{/if}

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Téléphone :</label>
				<input value="{$_SESSION.telephone}"
				type="tel" name="telephone" class="form-control">
				{if isset($error_telephone_message)}
					{$error_telephone_message}
				{/if}
			</div>

		</div>

		<div class="row">
			
			<div class="col-12 col-lg-6">
				
				<label for="">Code postal :</label>
				<input value="{$_SESSION.adresse_code_postal}"
				type="number" name="adresse_code_postal" class="form-control">
				{if isset($error_Adresse_code_postal_message)}
					{$error_Adresse_code_postal_message}
				{/if}

			</div>

			<div class="col-12 col-lg-6">

				<label for="">Ville :</label>
				<input value="{$_SESSION.adresse_ville}"
				type="text" name="adresse_ville" class="form-control">
				{if isset($error_Adresse_ville_message)}
					{$error_Adresse_ville_message}
				{/if}

			</div>

		</div>

		<div class="row align-items-center">
			
			<div class="col">
				
				<label for="">Adresse :</label>
				<input value="{$_SESSION.adresse_rue}"
				type="text" name="adresse_rue" class="form-control">

			</div>

			<div class="col">
				
				<legend>Newsletter :</legend>
				{if ($_SESSION.newsletter == false)}
					<!-- si le membre n'est pas encore inscrit à la newsletter on lui propose de le faire -->
					<input type="checkbox" name="newsletter" id="newsletter" value="inscription">
					<label for="newsletter">Je souhaite m'inscrire à la newsletter</label>
				{else}
					<!-- si le membre est déjà inscrit à la newsletter, il peut s'en désabonner -->
					<input type="checkbox" name="newsletter" id="newsletter" value="desinscription">
					<label for="newsletter">Je souhaite me désinscrire de la newsletter</label>
				{/if}

			</div>

		</div>

		<div class="row">

			<div class="col text-center">

				<input type="submit" name="modifier_coordonnees" class="btn btn-primary btn-red shadow-none" value="VALIDER">

			</div>

		</div>

		<img src="assets/icons/yoga4.png" class="yoga4" height="100" width="100"/>
		
	</form> <!-- fin div block-coordonnees -->

	<!-- le reste des rubriques n'est pas display puisqu'on pourra inclure seulement la partie du formulaire avec le POO et l'architecture MVC -->

</div>