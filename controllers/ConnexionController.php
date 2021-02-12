<?php

$utilisateur = new Utilisateur($dbh);
$nb = $utilisateur->checkUser();

$smarty->assign(array(
    'nb'=>$nb
));

if(isset($_POST['connexion'])) {
    $mail = $_POST['email_connexion'];

    $nb = $utilisateur->checkEmail($mail);
    //var_dump($nb);

    if($nb > 0){
        $utilisateur = $utilisateur->getUserByMail($mail);
        if(password_verify($_POST['password_connexion'],$utilisateur->getMot_de_passe())) {
            echo ('Connexion etablie');
        }else {
            $smarty->assign('error', '<span style="color: red; font-size="20px">Mot de passe incorrect</span>');
        }
    } else {
        $smarty->assign('error', 'L\'adresse mail est incorrect');
    }

}


//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'connexion');

$smarty->display('templates/connexion.tpl');
?>