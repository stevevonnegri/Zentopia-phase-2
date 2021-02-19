						<h2>Images de la galerie</h2>

						<div class="galerie-inner">
							
							<div class="row">

								{foreach from=$imagesAll item="image"}
									<div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
										<img src="{Image::GetImageLink(100,$image->getUrl_image())}" class="img-fluid" />
										<a class="suppr-img" href="?action=interface_moderateur&galerie=true&id={$image->getId_image()}&nom={$image->getUrl_image()}">Supprimer</a>
									</div>
								{/foreach}

							</div>

							<!--@TODO Faire une message pour avertir des tailles supprotes par le slider du site -->
							

							<div class="row justify-content-center">
							
								<div class="col-12 col-lg-6 text-center">
								{if isset($errorQuantite)}
									<p>Vous avez déjà plus que 10 photos quand le slider, veuillez en supprimez une pour en rajouter une nouvelle</p>
								{/if}
								{if isset($errorFichier)}
									<p>Une erreur est survenue lors du déplacement du fichier</p>
								{/if}								
								{if isset($errorUpload)}
									<p>Une erreur est survenu lors de l\'upload sur le serveur</p>
								{/if}
								{if isset($errorTaille)}
									<p>L\'image chargée sur le serveur n\'est pas conforme à taille du diaporama. (Merci de choisir une image dont la taille est comprise entre 450px et 550px de hauteur sur 770px de large)</p>
								{/if}
								{if isset($errorSuppr)}
									<p>Une erreur est survenu lors de la suppression sur le serveur</p>
								{/if}
									
									<button class="btn btn-primary btn-admin shadow-none" onclick="showElement('ajout-img-form');">+ AJOUTER UNE PHOTO</button>

								</div>

							</div>

							<div class="hidden" id="ajout-img-form">


								
								<form method="post" enctype="multipart/form-data" action="?action=interface_moderateur&galerie=true">
									
									<input type="file" name="image" accept="image/jpeg, image/jpg" required>
									<input type="submit" name="image_add" value="ENVOYER">

								</form>

							</div>

						</div>