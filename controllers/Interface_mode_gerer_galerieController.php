<?php
 
$image = new Image($dbh);

//On regarde combien de photo sont mis dans la bdd, si plus que 10, ca bloque l'envoye de nouveau
if($image->count() >= 10) {
	$smarty->assign('error', 'Vous avez déjà plus que 10 photos quand le slider, veuillez en supprimez une pour en rajouter une nouvelle');
} else {

	//Ca verifie qu'il a bien une image quand on clique sur envoye
	if(isset($_POST['image_add'])){

		//ca verifie qu'il n'y a pas d'erreur dans l'image
		if($_FILES['image']['error'] == 0){

			$resultat = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/'.$_FILES['image']['name']);

			$image2 = new Image($dbh);

			$image2->resizeImage('assets/images/'.$_FILES['image']['name'], 770, $_FILES['image']['name']);
			$image2->resizeImage('assets/images/'.$_FILES['image']['name'], 100, $_FILES['image']['name']);

			$data['url_image'] = $_FILES['image']['name'];
			$data['id_utilisateur'] = $_SESSION['id_utilisateur'];

			$image->Add($data);

			if(!$resultat){

				//$smarty->assign('error', 'Une erreur est survenue lors du déplacement du fichier');
			}
			$smarty->assign('error', 'Une erreur est survenu lors de l\'upoload sur le serveur');				
			echo ($_FILES['image']['error']);
			//echo 'test';
		}
	}
}

if(isset($_GET['id']) && ($_GET['nom'])) {
	$image->deleteImage($_GET['id'], $_GET['nom']);
	if(!$resultat) {
		$smarty->assign('error', 'Une erreur est survenu lors de la suppression sur le serveur');
	}
}

$imagesAll = $image->getList();

$smarty->assign(array(
	'imagesAll' => $imagesAll,
));

$smarty->display('templates/interface_mode_gerer_galerie.tpl');
?>