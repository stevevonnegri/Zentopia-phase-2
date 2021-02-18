<?php


$user = new Utilisateur($dbh);

	$user->setEmail("olivier.clement88@hotmail.fr");
	$user->setMot_de_passe($_POST['mot_de_passe']);

	$user->setGenre($_POST['genre']);
	$user->setPrenom_utilisateur($_POST['prenom']);
	$user->setNom_utilisateur($_POST['nom']);

	$user->setDate_de_naissance(date("12-02-2003"));

	$user->setAdresse_rue($_POST['adresse_rue']);
	$user->setAdresse_code_postal($_POST['adresse_code_postal']);
	$user->setAdresse_ville($_POST['adresse_ville']);
	$user->setTelephone($_POST['telephone']);
	$user->setNewsletter($_POST['newsletter']);
	
/*
//2003
$date_limite = mktime(0, 0, 0, date("m")  , date("d"), date("Y")-18);

$date = date_parse($user->getDate_de_naissance());

//1990
$date_naissance = mktime(0, 0, 0, $date["month"] , $date["day"], $date["year"]);
*/
/*$date_naissance = date_parse($user->getDate_de_naissance());

$date_limite = mktime(0, 0, 0, date("m")  , date("d"), date("Y")-18);
$date_naissance = mktime(0, 0, 0, $date_naissance["month"] , $date_naissance["day"], $date_naissance["year"]);

$date_limite = date("Y-m-d", $date_limite);
$date_naissance = date("Y-m-d", $date_naissance);

var_dump($date_limite);
echo "<br><br>";
var_dump($date_naissance);

if ($date_naissance <= $date_limite) {
	echo('test + de 18 ans');
} else {
	$erreur = true;
	echo('moins de 18 ans');
}
*/
//$user->setEmail("zentopia-jordan@gmail.com");
var_dump($user->countReserverByEmail());
