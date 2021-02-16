<?php
        
    //information de la connexion à la bdd
	$bdd = 'desdgfco_steve';
	$server = '127.0.0.1';
    $user = 'desdgfco_ussteve';
    $password = '~Cx0Nmu3H@!a';


    //connexion à la bdd
    try {
        $dbh = [
                'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password)
                ];
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
     }



?>