<?php
 class Type_de_cours extends Model{

    protected $_id_type_de_cours;
    protected $_nom_type_de_cours;
    protected $_description_type_de_cours;
    protected $_categorie_type_de_cours;
    protected $_nombre_de_place;
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
    public function setNombre_de_place(int $nombreDePlace){
        $this->_nombre_de_place = $nombreDePlace;
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
    public function getNombre_de_place(){
        return $this->_nombre_de_place;
    }
    public function getImage_type_de_cours(){
        return $this->_image_type_de_cours;
    }
    public function getIcone_type_de_cours(){
        return $this->_icone_type_de_cours;
    }

}