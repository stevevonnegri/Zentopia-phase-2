<?php
 class Professeur extends Model{

    protected $_id_professeur;
    protected $_description_professeur;
    protected $_photo;
    protected $_id_utilisateur;

    protected $_table = "professeur";
    protected $_cle = "id_professeur";

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
    public function setId_utilisateur(int $id) {
        $this->_id_utilisateur = $id;
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
    public function getId_utilisateur() {
        return $this->_id_utilisateur;
    }


    /**
    * fonction récupérant la liste des profs et leurs informations
    *
    *
    *@return    <array>    un tableau contenant les infos de du professeur et de l'utilisateur lié
    **/
    public function getListeProf() {
    
    $prof = [];
    $sql = $this->_bdd->query(
        'SELECT * 
        FROM '.$this->_table.' 
        NATURAL JOIN utilisateur') ;

    while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){

        $donnees["listecours"] = $this->getCoursProf($donnees['id_professeur']);
        array_push($prof, $donnees);

        }
        
        return $prof; 

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
        FROM type_de_cours 
        NATURAL JOIN peut_enseigner
        WHERE peut_enseigner.id_professeur = "'.$id.'"') ;



    while($donnees = $sql->fetchColumn()){

        array_push($cours, $donnees);
        
        }
        
        return $cours; 

    }


}