<?php

session_start();

/*if (!isset($_SESSION)){
    //Verifier si dans le cookie existe
    if(isset($_COOKIE)) {
        //Verifie si email+mdp match

        //Faire la connexion ensuite

        session_start;

    }
}*/

require('functions/function.php');
require('config.php');

$smarty = new Smarty();

$smarty->assign('_SESSION', $_SESSION);



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