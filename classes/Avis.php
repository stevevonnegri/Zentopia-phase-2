<?php
 class Avis extends Model{

    protected $_id_avis;
    protected $_contenu_avis;
    protected $_niveau_avis;
    protected $_approuve;
    protected $_id_utilisateur;

    protected $_table = "avis";
    protected $_cle = "id_avis";

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



    /**
     * récupère les avis en attente de modération et les infos liés à leurs auteurs via la table utilisateur
     *
     * @return     un tableau contenant les infos de l'avis et de l'utilisateur lié
     */
    public function getAvisNonApprouves() {
        
        $avis = [];
        $sql = $this->_bdd->query(
            'SELECT id_avis, contenu_avis, niveau_avis, prenom_utilisateur, date_de_naissance 
            FROM '.$this->_table.' 
            NATURAL JOIN utilisateur 
            WHERE approuve = 0');

        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){

            $avis[] = $donnees;
            
            }
            
            return $avis; 

    }

}