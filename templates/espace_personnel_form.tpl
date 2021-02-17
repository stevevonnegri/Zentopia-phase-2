<div class="col col-right">
	
	<form class="block-coordonnees" action="?action=espace_personnel&form=active" method="POST">

		<h1>MES COORDONNEES</h1>

		<div class="row">

			<div class="col-12 col-lg-6">
				
				<legend>Civilité :</legend>

				<input checked="{if $_SESSION.genre == Femme}checked{/if}"
				type="radio" name="genre" id="femme" value="Mme" required>
				<label for="femme">Mme</label>

				<input checked="{if $_SESSION.genre == Homme}checked{/if}"
				type="radio" name="genre" id="homme" value="Mr">
				<label for="homme">Mr</label>

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Date de naissance :</label>
				<input value="{$_SESSION.date_de_naissance}"
				type="date" name="date_de_naissance" class="form-control">

			</div>
			

		</div>

		<div class="row">

			<div class="col-12 col-lg-6">
				
				<label for="">Prénom :</label>
				<input value="{$_SESSION.prenom_utilisateur}"
				type="text" name="prenom" class="form-control">

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Nom :</label>
				<input value="{$_SESSION.nom_utilisateur}"
				type="text" name="nom" class="form-control">

			</div>
			
		</div>

		<div class="row">
			
			<div class="col-12 col-lg-6">
				
				<label for="">Email :</label>
				<input value="{$_SESSION.email}"
				type="email" name="" class="form-control">

			</div>

			<div class="col-12 col-lg-6">
				
				<label for="">Téléphone :</label>
				<input value="{$_SESSION.telephone}"
				type="tel" name="telephone" class="form-control">

			</div>

		</div>

		<div class="row">
			
			<div class="col-12 col-lg-6">
				
				<label for="">Code postal :</label>
				<input value="{$_SESSION.adresse_code_postal}"
				type="number" name="adresse_code_postal" class="form-control">

			</div>

			<div class="col-12 col-lg-6">

				<label for="">Ville :</label>
				<input value="{$_SESSION.adresse_ville}"
				type="text" name="adresse_ville" class="form-control">

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
				{if {$_SESSION.newsletter} == false}
					<!-- si le membre n'est pas encore inscrit à la newsletter on lui propose de le faire -->
					<input type="checkbox" name="newsletter" id="newsletter" value="1">
					<label for="newsletter">Je souhaite m'inscrire à la newsletter</label>
				{else}
					<!-- si le membre est déjà inscrit à la newsletter, il peut s'en désabonner -->
					<input type="checkbox" name="newsletter" id="newsletter" value="0">
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