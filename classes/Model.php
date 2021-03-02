<?php

/**
* <h2>Classe Model, classe mère de toutes les autres classes</h2>
* <p>Celle-ci contient :</p>
* <ul>
*   <li>Le constructeur, la fonction hydrate</li>
*   <li>Les fonctions générales qui seront utilisées via ses classes filles</li>
* </ul>
* @author Anaïs Bironneau, Olivier Clément & Steve von Negri
* @date 11/02/2021
*/

class Model {
	protected $_bdd;

	/**
	* Constructeur
	* @param $donnees (array) : tableau des données permettant l'hydratation de l'objet
	*/
	public function __construct(array $donnees){
		$this->hydrate($donnees);
	}


	/**
	* Fonction d'hydratation
	* @param $donnees (array) : tableau des données permettant l'hydratation de l'objet
	*/
	public function hydrate(array $donnees){
		foreach ($donnees as $attribut => $valeur) {	
			$method = 'set'.ucfirst($attribut); 
			if(method_exists($this, $method)){ 
				$this->$method($valeur);
			}
		}
	}


	/***********/
    /* SETTERS */
    /***********/
    
	public function setBdd($bdd){
		$this->_bdd = $bdd;
	}


	/***********/
    /* GETTERS */
    /***********/


	public function getBdd(){
		return $this->_bdd;
	}


	/**
	 * Fonction "setBDDTableau"
	 * récupère la BDD et garde uniquement la valeur dans l'objet
	 *
	 * @param $bdd : les infos de la BDD sous forme de tableau
	 *
	*/
    public function setBddTableau($bdd) {
		foreach ($bdd as $attribut => $valeur) {	
			$method = 'set'.ucfirst($attribut); 
			if(method_exists($this, $method)){ 
				$this->$method($valeur);
			}
		}
	}


	/**
	 * Fonction "getList"
	 * récupère la liste des entrées d'une table dans la BDD
	 *
	 * @return un tableau contenant les données
	*/
	public function getList(){
		$lists = [];
		$sql = $this->_bdd->query('SELECT * FROM '.$this->_table);
		while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
			$lists[] = new $this->_table($donnees);
		}
		return $lists; 
	} 


	/**
	* Fonction "getItem"
	* récupère un élément dans la BDD selon les paramètres qu'on lui passe
	*
	*@param $id : id de l'élément
	*@param $colonne : nom de la colonne visée s'il y en a 
	*
	*@return retourne un objet contenant les données.
	**/
	public function getItem($id, $colonne = NULL){

		if ($colonne == NULL) {
			$colonne = $this->_cle;
		}

		$sql =$this->_bdd->query('SELECT * FROM '.$this->_table.' where '.$colonne.' = "'.$id.'"');
		$donnees = $sql->fetch(PDO::FETCH_ASSOC);

		//test si le SELECT a recupere des info ou non
		if ($donnees == false) {
			return false;
		}
		//retourne l'objet si la requete a recupere des info
		return new $this->_table($donnees);
	}


	/**
	* Fonction "Delete"
	* supprime un élément de la BDD.
	*
	*@param $id : id de l'élément
	*@param $colonne : nom de la colonne visée s'il y en a 
	*
	**/
	public function Delete($id, $colonne = NULL){

		if ($colonne == NULL) {
			$colonne = $this->_cle;
		}

		$this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE '.$colonne.' = "'.$id.'"');
	}


	/**
	* Fonction "Add"
	* ajoute un élément à la BDD.
	*
	*@param $array : le tableau contenant les données qu'on souhaite ajouter
	*
	**/
	public function Add($array){
		$champs = '';
		$valeurs = '';
		foreach($array as $key => $value){
			if($value){
				$champs .= $key.' , ';
				$valeurs .= '"'.$value.'" , ';
			}
		}
		$valeurs = substr($valeurs,0,-2);
		$champs = substr($champs,0,-2);

		$sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.'('.$champs.') VALUES ('.$valeurs.')');
		$sql->execute();
	}


	/**
	* Fonction "Update"
	* met à jour un élément à la BDD.
	*
	*@param $data (array) : le tableau contenant les données qu'on souhaite mettre à jour
	*@param $id : id de l'élément ciblé
	**/
	public function Update(array $data, $id){
        $valeurs = '';
		foreach($data as $key => $value) {
			if(!is_null($value)) {
				$valeurs .= $key.' = "'.$value.'" , ';
			}
		}
		$valeurs = substr($valeurs,0,-2);

		$sql = $this->_bdd->prepare('UPDATE '.$this->_table.' SET '.$valeurs.' WHERE id_'.$this->_table.' = '.$id);
		$sql->execute();
	}


	/**
	 * Fonction "Count"
	 * compte le nombre d'entrées dans la table
	 *
	 * @return le résultat de la requête
	 */
	public function Count() {
		
        $sql = $this->_bdd->query('SELECT count(*) FROM '.$this->_table);
        
        return $sql->fetchColumn();
    }
}