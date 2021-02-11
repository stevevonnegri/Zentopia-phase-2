<?php
        
    //information de la connexion à la bdd
	$bdd = 'desdgfco_olivier';
	$server = '127.0.0.1';
    $user = 'desdgfco_usolivier';
    $password = '3c.L;X5eI%D9';


    //connexion à la bdd
    try {
        $dbh = [
                'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password)
                ];
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
     }



?>