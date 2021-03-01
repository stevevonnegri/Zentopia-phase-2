<?php

$user = new Utilisateur($dbh);


if(isset($_POST['connexion'])) {

    $user->setEmail($_POST['email_connexion']);
    $user->setMot_de_passe($_POST['password_connexion']);
    
    
    $resultat = $user->OpenSession();
    if( isset($_POST['reste_connection']) && $resultat == true && isset($_COOKIE['accepteCookie'])) {

        if($resultat == true) {
            $userCookie = $user->getUserByMail($_POST['email_connexion']);
            setcookie('connexion', $_POST['email_connexion'].'----'.password_hash($userCookie->getMot_de_passe().$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_ACCEPT_LANGUAGE'], PASSWORD_DEFAULT), time() + 60*60*24*7, null, null, false, true);

        }
    }

    // vérifie selon le retour de la fonction OpenSession, si != true, renvoie une erreur sinon redirige vers l'espace personnel
    if($resultat === true) {
        echo ('<script>document.location.href="?action=espace_personnel"</script>');
    } elseif($resultat === 'MDP') {
        $smarty->assign('ErrorMDP', '<p class="error">Mot de passe incorrect</p>');
    } elseif($resultat === 'EMAIL') {
        $smarty->assign('ErrorEMAIL', '<p class="error">Email incorrect</p>');
    }

}

if (isset($_GET['reini'])) {

    $smarty->assign('reinitialisation', 'reinitialisation');
}


// ajoute une variable pour déterminer la partie "active" de la navbar.
$smarty->assign('active', 'connexion');

$smarty->display('templates/connexion.tpl');
