<?php
 class Avis extends Model{

    protected $_id_avis;
    protected $_contenu_avis;
    protected $_niveau_avis;
    protected $_approuve;
    protected $_id_utilisateur;

    protected $_table = "avis"
    protected $_cle = "id_avis"

    //setters
    public function setId_avis(int $id){
        $this->_id_avis = $id;
    }
    public function setContenu_avis($contenu){
        $this->_contenu_avis = $contenu;
    }
    public function setNiveau_avis($niveau){
        $this->_niveau_avis = $niveau;
    }
    public function setApprouve($approuve){
        $this->_approuve = $approuve;
    }



    //Getters
    public function getId_avis(){
        return $this->_id_avis;
    }
    public function getContenu_avis(){
        return $this->_contenu_avis;
    }
    public function getNiveau_avis(){
        return $this->_niveau_avis;
    }
    public function getApprouve(){
        return $this->_approuve;
    }

}