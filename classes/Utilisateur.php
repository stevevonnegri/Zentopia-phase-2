<?php
 class Utilisateur extends Model{

    protected $_id_utilisateur;
    protected $_genre;
    protected $_nom_utilisateur;
    protected $_prenom_utilisateur;
    protected $_date_de_naissance;
    protected $_adresse_rue;
    protected $_adresse_code_postal;
    protected $_adresse_ville;
    protected $_telephone;
    protected $_email;
    protected $_mot_de_passe;
    protected $_newsletter;
    protected $_cours_decouverte;
    protected $_rang;
    
    protected $_table = "utilisateur";
    protected $_cle = "id_utilisateur";

    //setters
    public function setId_utilisateur(int $id){
        $this->_id_utilisateur = $id;
    }
    public function setGenre($genre){
        $this->_genre = $genre;
    }
    public function setNom_utilisateur($nom){
        $this->_nom_utilisateur = $nom;
    }
    public function setPrenom_utilisateur($prenom){
        $this->_prenom_utilisateur = $prenom;
    }
    public function setDate_de_naissance($dateDeNaissance){
        $this->_date_de_naissance = $dateDeNaissance;
    }
    public function setAdresse_rue($adresseRue){
        $this->_adresse_rue = $adresseRue;
    }
    public function setAdresse_code_postal($adresseCodePostal){
        $this->_adresse_code_postal = $adresseCodePostal;
    }
    public function setAdresse_ville($adresseVille){
        $this->_adresse_ville = $adresseVille;
    }
    public function setTelephone($telephone){
        $this->_telephone = $telephone;
    }
    public function setEmail($email){
        $this->_email = $email;
    }
    public function setMot_de_passe($motDePasse){
        $this->_mot_de_passe = $motDePasse;
    }
    public function setNewsletter($newsletter){
        $this->_newsletter = $newsletter;
    }
    public function setCours_decouverte($coursDecouverte){
        $this->_cours_decouverte = $coursDecouverte;
    }
    public function setRang($rang){
        $this->_rang = $rang;
    }


    //Getters
    public function getId_utilisateur(){
        return $this->_id_utilisateur;
    }
    public function getGenre(){
        return $this->_genre;
    }
    public function getNom_utilisateur(){
        return $this->_nom_utilisateur;
    }
    public function getPrenom_utilisateur(){
        return $this->_prenom_utilisateur;
    }
    public function getDate_de_naissance(){
        return $this->$_date_de_naissance;
    }
    public function getAdresse_rue(){
        return $this->_adresse_rue;
    }
    public function getAdresse_code_postal(){
        return $this->_adresse_code_postal;
    }
    public function getAdresse_ville(){
        return $this->_adresse_ville;
    }
    public function getMot_de_passe(){
        return $this->_mot_de_passe;
    }
    public function getNewsletter(){
        return $this->_newsletter;
    }
    public function getCours_decouverte(){
        return $this->_cours_decouverte;
    }
    public function getRang(){
        return $this->_rang;
    }

    //modification fonction Add pour ajouter un utlisateur
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

}