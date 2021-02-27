<?php 

	include('../../config.php');

	foreach($dbh as $attribut=>$valeur){
		$bdd = $valeur;
	}

	$id = $_POST['id_type_de_cours'];

	$sql = $bdd->query('SELECT id_professeur, prenom_utilisateur FROM utilisateur NATURAL JOIN professeur NATURAL JOIN peut_enseigner WHERE id_type_de_cours = '.$id);
	
	$list = '<select class="form-control" id="enseignant">';

	while ($donnees = $sql->fetch(PDO::FETCH_ASSOC)) {
		$list .= '<option value="'.$donnees['id_professeur'].'">'.ucfirst($donnees['prenom_utilisateur']).'</option>';
	}

	$list .= '</select>';

	echo($list);


?>