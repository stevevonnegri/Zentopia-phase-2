<?php

session_start();

$user = new Utilisateur($dbh);

//TODO steve Finir cookie reste co
/*if (!isset($_SESSION) && (isset($_COOKIE['connexion'])) ){
    //Verifie si email+mdp match
    $cookieENT = $_COOKIE['connexion'];
    $cookieEmail = explode ( '----' , $cookieENT);
    $user = $user->getUserByMail($cookieEmail);
    $key = password_hash($_POST['password_connexion'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT'].$_SERVER['HTTP_ACCEPT_ENCODING'].$_SERVER['HTTP_ACCEPT_LANGUAGE'], PASSWORD_DEFAULT);
    if($key == $auth[1]) {
        
    }

        
    
}*/

require('functions/function.php');
require('config.php');

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