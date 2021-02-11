<?php

//ajoute une variable pour determiner la partie "active" de la navbar.
$smarty->assign('active', 'contact');

$smarty->display('templates/contact.tpl');
?>