<?php

$image = new Image($dbh);

if(isset($_POST['image_add'])){

    // on regarde combien de photos sont déjà stockées, s'il y en a plus que 10, ca bloque l'envoi de nouvelles images
    if($image->count() >= 10) {
        $smarty->assign('errorQuantite', 'Vous avez déjà plus que 10 photos quand le slider, veuillez en supprimez une pour en rajouter une nouvelle');
    } else {

        // vérifie qu'il y a bien une image quand on clique sur envoyer
        if($_SESSION['rang'] == 'admin' || $_SESSION['rang'] == 'moderateur'){

            // vérifie qu'il n'y a pas d'erreur dans l'image
            if($_FILES['image']['error'] == 0){

                $image2 = new Image($dbh);

                //Deplace l'image du dossier temp, puis redimensionne l'image en 770px de largeur
                $resultat = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/'.$_FILES['image']['name']);
                $image2->resizeImage('assets/images/'.$_FILES['image']['name'], 770, $_FILES['image']['name']);

                //Renvoie les infos de l'image 
                $tailleImage = getImageSize('assets/images/slider/770-'.$_FILES['image']['name']);

                if(!$resultat){
                    //Verifie qu'il n'y a pas eu d'erreur lors du deplacement de l'image
                    $smarty->assign('errorFichier', 'Une erreur est survenue lors du déplacement du fichier');
                }

                //Si la taille de l'image est entre 400 et 600px de hauteur pour 770px de largeur, alors on la conserve
                if($tailleImage['1'] <= 600 && $tailleImage['1'] >= 400 && $tailleImage['0'] < 780 ) {

                    //image pour les miniatures de la parti moderateur
                    $image2->resizeImage('assets/images/'.$_FILES['image']['name'], 100, $_FILES['image']['name']);

                    $data['url_image'] = $_FILES['image']['name'];
                    $data['id_utilisateur'] = $_SESSION['id_utilisateur'];

                    $image->Add($data);
                    
                } else {
                    //Fait une erreur pour la taille puis supprime les fichiers du serveur
                    $smarty->assign('errorTaille', 'L\'image chargée sur le serveur n\'est pas conforme à taille du diaporama. (Merci de choisir une image dont la taille est comprise entre 400px et 600px de hauteur sur 770px de large)');				
                    unlink('assets/images/'.$_FILES['image']['name']);
                    unlink('assets/images/slider/770-'.$_FILES['image']['name']);
                }
            }else {
            $smarty->assign('errorUpload', 'Une erreur est survenu lors de l\'upload sur le serveur');				
            
            }						
        }	
    }
}
/**
 * Test si on récupère bien l'id et le nom d'une image, puis la delete et informe en cas d'erreur
 */
if(isset($_GET['id']) && ($_GET['nom'])) {
    $image->deleteImage($_GET['id'], $_GET['nom']);
    if($resultat) {
        $smarty->assign('errorSuppr', 'Une erreur est survenu lors de la suppression sur le serveur');
    }
}

$imagesAll = $image->getList();

$smarty->assign(array(
    'imagesAll' => $imagesAll,
));
?>