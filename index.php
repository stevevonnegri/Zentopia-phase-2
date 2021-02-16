<?php

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



if(isset($_GET['action'])){

    $action = $_GET['action'];
    require('controllers/'.ucfirst($action).'Controller.php');
}

else {
	echo('BOUH');
    require('controllers/IndexController.php');
}
?>