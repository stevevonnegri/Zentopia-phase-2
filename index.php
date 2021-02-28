<?php

session_start();

require('functions/function.php');
require('config.php');

$user = new Utilisateur($dbh);

if (!isset($_SESSION['id_utilisateur']) && (isset($_COOKIE['connexion'])) ){

    $cookieENT = $_COOKIE['connexion'];
    $cookieENT = explode ( '----' , $cookieENT);
    $user = $user->getUserByMail($cookieENT[0]);
    $key = $user->getMot_de_passe().$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_ACCEPT_LANGUAGE'];

    if(password_verify($key, $cookieENT[1])) {
        session_start();
        $user->addVariableSession();
    }

    
}


$smarty = new Smarty();

$smarty->assign('_SESSION', $_SESSION);


date_default_timezone_set('Europe/Paris');

setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
date_default_timezone_set('Europe/Paris');



if(isset($_GET['action'])){

    $action = $_GET['action'];
    require('controllers/'.ucfirst($action).'Controller.php');
}

else {
    
    require('controllers/IndexController.php');
}
?>