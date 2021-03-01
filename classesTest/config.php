<?php
        
    //information de la connexion à la bdd
	$bdd = 'zentopia-start';
	$server = '127.0.0.1';
    $user = 'uxian';
    $password = '';


    //connexion à la bdd
    try {
        $dbh = new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
     }



?>