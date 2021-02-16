<?php

$image = new Image($dbh);


if(isset($_POST['image_add'])){

	if($_FILES['image']['error'] == 0){
		$resultat = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/'.$_FILES['image']['name']);

		$image2 = new Image($dbh);

		$image2->resizeImage('assets/images/'.$_FILES['image']['name'], 500, $_FILES['image']['name']);
        $image2->resizeImage('assets/images/'.$_FILES['image']['name'], 65, $_FILES['image']['name']);


        $data['url_image'] = $_FILES['image']['name'];
        $data['id_utilisateur'] = $_SESSION['id_utilisateur'];

		$image->Add($data);


		if(!$resultat){
			$smarty->assign('error', 'Une erreur est survenue lors du déplacement du fichier');
		}
	}
	else{
		$smarty->assign('error', 'Une erreur est survenu lors de l\'upoload sur le serveur');
	}
}

$imagesAll = $image->getList();

$smarty->assign(array(
	'imagesAll' => $imagesAll,
));

$smarty->display('templates/interface_mode_gerer_galerie.tpl');
?>