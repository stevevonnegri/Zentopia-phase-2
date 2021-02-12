<?php

$utilisateur = new Utilisateur($dbh);

if(isset($_POST['connexion'])) {
    $mail = $_POST['email_connexion'];

    $nb = $utilisateur->checkEmail($mail);

    if($nb > 0){
        $utilisateur = $utilisateur->getUserByMail($mail);
        if(password_verify($_POST['password_connexion'],$utilisateur->getMot_de_passe())) {
            //On va lance un session est recupere les valeurs a stock dessus
            session_start();

            //Recuperation des informations de l'utilisateur
            
            $_SESSION['id_utilisateur'] = $utilisateur->getId_utilisateur();
            $_SESSION['nom'] = $utilisateur->getNom_utilisateur();
            $_SESSION['prenom'] = $utilisateur->getPrenom_utilisateur();
            $_SESSION['genre'] = $utilisateur->getGenre();
            $_SESSION['date_de_naissance'] = $utilisateur->getDate_de_naissance();
            $_SESSION['adresse_rue'] = $utilisateur->getAdresse_rue();
            $_SESSION['adresse_code_postal'] = $utilisateur->getAdresse_code_postal();
            $_SESSION['adresse_ville'] = $utilisateur->getAdresse_ville();
            $_SESSION['telephone'] = $utilisateur->getTelephone();
            $_SESSION['email'] = $utilisateur->getEmail();
            $_SESSION['newsletter'] = $utilisateur->getNewsletter();
            $_SESSION['seance_decouverte'] = $utilisateur->getSeance_decouverte();
            $_SESSION['rang'] = $utilisateur->getRang();
            
            if($_POST['reste_connection'] == 1){
                //Creer cookies sur 6mois
            }
            
            echo ('<script>document.location.href="http://localhost/zentopia/index.php?action=espace_personnel"</script>');
            
            

        }else {
            $smarty->assign('errormdp', '<p class="alert-danger">Mot de passe incorrect</p>');
        }
    } else {
        $smarty->assign('erroremail', '<p class="alert-danger">Email incorrect</p>');
    }

}


//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'connexion');

$smarty->display('templates/connexion.tpl');
?>