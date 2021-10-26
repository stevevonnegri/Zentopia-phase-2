<?php
        
    // données de la connexion à la bdd
	$bdd = 'desdgfco_steve';
	$server = '';
    $user = 'desdgfco_ussteve';
    $password = '~Cx0Nmu3H@!a';


    // connexion à la bdd
    try {
        $dbh = [
                'bdd' => new PDO('mysql:dbname='.$bdd.';host='.$server.'', $user, $password, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''))
                ];
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
     }



?>
