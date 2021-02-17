<?php

class Model {
	protected $_bdd;


	public function __construct(array $donnees){
		$this->hydrate($donnees);
	}



	public function hydrate(array $donnees){
		foreach ($donnees as $attribut => $valeur) {	
			$method = 'set'.ucfirst($attribut); 
			if(method_exists($this, $method)){ 
				$this->$method($valeur);
			}
		}
	}

	public function setBdd($bdd){
		$this->_bdd = $bdd;
	}

    
	public function getList(){
		$lists = [];
		$sql = $this->_bdd->query('SELECT * FROM '.$this->_table);
		while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
			$lists[] = new $this->_table($donnees);
		}
		return $lists; 
	} 


	/*
    * fonction recuperant un élément d'une BDD selon un ID et un nom de colonne.
    *
    *@param      <int>       $id         l'id l'element
    *@param      <string>   $colonne    nom de la colonne
    *
    *@return     <object>     retourne un objet avec les information de la BDD.
    */
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


	/*
    * fonction suppriment un élément d'une BDD selon un ID et un nom de colonne.
    *
    *@param      <int>       $id         l'id l'element
    *@param      <string>   $colonne    nom de la colonne
    *
    */
	public function Delete($id, $colonne = NULL){

        if ($colonne == NULL) {
            $colonne = $this->_cle;
        }

        $this->_bdd->exec('DELETE FROM '.$this->_table.' WHERE '.$colonne.' = "'.$id.'"');
    }

	public function Add($objet){
		$champs = '';
		$valeurs = '';
		foreach($objet as $key => $value){
			if($value){
				$champs .= substr($key,1).' , ';
				$valeurs .= '"'.$value.'" , ';
			}
		}
		$valeurs = substr($valeurs,0,-2);
		$champs = substr($champs,0,-2);

		$sql = $this->_bdd->prepare('INSERT INTO '.$this->_table.'('.$champs.') VALUES ('.$valeurs.')');
		$sql->execute();
	}

	
	public function Update(array $data, $id){

        $valeurs = '';
		foreach($data as $key => $value) {
			if($value) {
				$valeurs .= $key.' = "'.$value.'" , ';
			}
		}
		$valeurs = substr($valeurs,0,-2);
		$sql = $this->_bdd->prepare('UPDATE '.$this->_table.' SET '.$valeurs.' WHERE id_'.$this->_table.' = '.$id);
		$sql->execute();
	}
}