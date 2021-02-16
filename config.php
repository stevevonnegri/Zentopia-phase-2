<?php
        
    //information de la connexion à la bdd
	$bdd = 'zentopia-start';
	$server = '127.0.0.1';
    $user = 'root';
    $password = 'root';


    //connexion à la bdd
    try {
        $dbh = [
                'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password)
                ];
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
     }



?>