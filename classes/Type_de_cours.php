<?php
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

    //setters
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



    //Getters
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
     * Cherhce le nombre de place d'une seance par rapport a son type de cours
     * 
     * @param id l'id d'une seance
     * 
     * @return sql renvoie le nombre de place pour la seance
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
    * fonction récupérant la liste des cours enseignés par un prof
    *
    *
    *@return    <array>     un tableau contenant les noms des cours que le prof enseigne
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

}