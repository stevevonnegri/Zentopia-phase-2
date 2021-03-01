<?php

/**
* <h2>Classe Type_de_cours, fille de Model</h2>
* <p>Celle-ci contient :</p>
* <ul>
*   <li>Les getters et les setters</li>
*   <li>Les fonctions custom liées aux types de cours dispensés</li>
* </ul>
* @author Anaïs Bironneau, Olivier Clément & Steve von Negri
* @date 11/02/2021
*/

 class Type_de_cours extends Model{

    protected $_id_type_de_cours;
    protected $_nom_type_de_cours;
    protected $_description_type_de_cours;
    protected $_categorie_type_de_cours;
    protected $_nombre_de_places;
    protected $_image_type_de_cours;
    protected $_icone_type_de_cours;

    protected $_table = "type_de_cours";
    protected $_cle = "id_type_de_cours";


    /***********/
    /* SETTERS */
    /***********/
      
    public function setId_type_de_cours(int $id){
        $this->_id_type_de_cours = $id;
    }
    public function setNom_type_de_cours($nom){
        $this->_nom_type_de_cours = $nom;
    }
    public function setDescription_type_de_cours($description){
        $this->_descritpion_type_de_cours = $description;
    }
    public function setCategorie_type_de_cours($categorie){
        $this->_categorie_type_de_cours = $categorie;
    }
    public function setNombre_de_places(int $nombreDePlace){
        $this->_nombre_de_places = $nombreDePlace;
    }
    public function setImage_type_de_cours($image){
        $this->_image_type_de_cours = $image;
    }
    public function setIcone_type_de_cours($icone){
        $this->_icone_type_de_cours = $icone;
    }


    /***********/
    /* GETTERS */
    /***********/

    public function getId_type_de_cours(){
        return $this->_id_type_de_cours;
    }
    public function getNom_type_de_cours(){
        return $this->_nom_type_de_cours;
    }
    public function getDescription_type_de_cours(){
        return $this->_descritpion_type_de_cours;
    }
    public function getCategorie_type_de_cours(){
        return $this->_categorie_type_de_cours;
    }
    public function getNombre_de_places(){
        return $this->_nombre_de_places;
    }
    public function getImage_type_de_cours(){
        return $this->_image_type_de_cours;
    }
    public function getIcone_type_de_cours(){
        return $this->_icone_type_de_cours;
    }



    /**
     * Fonction "getItemForSeance"
     * cherche le nombre de places disponibles d'une séance par rapport à son type de cours
     * 
     * @param $id : l'id d'une séance
     * 
     * @return le nombre de places pour la seance
     */
    public function getItemForSeance($id) {


        $sql = $this->_bdd->query('SELECT nombre_de_places FROM type_de_cours NATURAL JOIN seance where id_seance = '.$id);
		//test si le SELECT a recupere des info ou non
		if ($sql == false) {
			return false;
		}        
        return $sql->fetchColumn();

    }


    /**
    * Fonction "getCoursProf"
    * récupère la liste des cours enseignés par un prof
    *
    * @param $id (int) : l'id d'un professeur
    *
    *@return un tableau contenant les noms des cours que le prof enseigne
    **/
    public function getCoursProf(int $id) {
    
    $cours = [];
    $sql = $this->_bdd->query(
        'SELECT nom_type_de_cours 
        FROM '.$this->_table.' 
        NATURAL JOIN peut_enseigner
        WHERE peut_enseigner.id_professeur = "'.$id.'"') ;

    while($donnees = $sql->fetchColumn()){

        $cours[] = $donnees;
        
        }
        
        return $cours; 

    }


    /**
    * Fonction "getListYoga"
    * récupère la liste des cours de la catégorie "yoga"
    *
    *@return un tableau contenant les données des types de cours
    **/
    public function getListYoga(){
        $lists = [];
        $sql = $this->_bdd->query('SELECT * FROM '.$this->_table. ' WHERE categorie_type_de_cours = "yoga"');
        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
            $lists[] = new $this->_table($donnees);
        }
        return $lists; 
    } 


    /**
    * Fonction "getListMeditation"
    * récupère la liste des cours de la catégorie "méditation"
    *
    *@return un tableau contenant les données des types de cours
    **/
    public function getListMeditation(){
        $lists = [];
        $sql = $this->_bdd->query('SELECT * FROM '.$this->_table. ' WHERE categorie_type_de_cours = "meditation"');
        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
            $lists[] = new $this->_table($donnees);
        }
        return $lists; 
    } 

}