<?php

// ajoute une variable pour déterminer la partie "active" de la navbar
$smarty->assign('active', 'les_cours');

$smarty->display('templates/tarifs.tpl');
?>