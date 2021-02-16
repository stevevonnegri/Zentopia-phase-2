<?php

$user = new Utilisateur($dbh);


if(isset($_POST['connexion'])) {

    $user->setEmail($_POST['email_connexion']);
    $user->setMot_de_passe($_POST['password_connexion']);
    $resultat = $user->OpenSession();

    //Verifie selon le retour de la fonction OpenSession, si != de true, renvoie une erreur sinon redirige vers l'espace personnel
    if($resultat === true) {
        echo ('<script>document.location.href="http://localhost/zentopia/index.php?action=espace_personnel"</script>');
    } elseif($resultat === 'MDP') {
        $smarty->assign('errormdp', '<p class="alert-danger">Mot de passe incorrect</p>');
    } elseif($resultat === 'EMAIL') {
        $smarty->assign('erroremail', '<p class="alert-danger">Email incorrect</p>');
    }

}


//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'connexion');

$smarty->display('templates/connexion.tpl');
?>