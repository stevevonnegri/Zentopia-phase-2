<?php
 class Professeur extends Model{

    protected $_id_professeur;
    protected $_description_professeur;
    protected $_photo;
    protected $_id_utilisateur;

    protected $_table = "professeur"
    protected $_cle = "id_professeur"

    //setters
    public function setId_professeur(int $id){
        $this->_id_professeur = $id;
    }
    public function setDescription_professeur($description){
        $this->_description_professeur = $description;
    }
    public function setPhoto($photo) {
        $this->_photo = $photo;
    }


    //Getters
    public function getId_professeur(){
        return $this->_id_professeur;
    }
    public function getDescription_professeur(){
        return $this->_description_professeur;
    }
    public function getPhoto() {
        return $this->_photo;
    }

}