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
        return $this->_date_de_naissance;
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
    public function getTelephone(){
        return $this->_telephone;
    }
    public function getEmail(){
        return $this->_email;
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

    
    /**
     * fonction pour ajouter l'objet utilisateur dans la BDD
     */
    public function AddUtilisateur() {
        //test si la personne veux s'inscrire a la newletter si oui, envoie le booleen true pour les colonne 
        //"newsletter" et "seance_decouverte" -> la personne venant de s'inscrire, il n'y a pas besoin de tester si elle a deja fait des cours puisque cela n'est pas possible.
         if ($this->getNewsletter() != 1) {
            $sql = $this->_bdd->prepare('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, genre, date_de_naissance, adresse_rue, adresse_code_postal, adresse_ville, telephone, email, mot_de_passe) VALUES ("'.$this->getNom_utilisateur().'", "'.$this->getPrenom_utilisateur().'", "'.$this->getGenre().'", "'.$this->getDate_de_naissance().'", "'.$this->getAdresse_rue().'", "'.$this->getAdresse_code_postal().'", "'.$this->getAdresse_ville().'", "'.$this->getTelephone().'", "'.$this->getEmail().'", "'.$this->getMot_de_passe().'")');

        } else {
            $sql = $this->_bdd->prepare('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, genre, date_de_naissance, adresse_rue, adresse_code_postal, adresse_ville, telephone, email, mot_de_passe, newsletter, seance_decouverte) VALUES ("'.$this->getNom_utilisateur().'", "'.$this->getPrenom_utilisateur().'", "'.$this->getGenre().'", "'.$this->getDate_de_naissance().'", "'.$this->getAdresse_rue().'", "'.$this->getAdresse_code_postal().'", "'.$this->getAdresse_ville().'", "'.$this->getTelephone().'", "'.$this->getEmail().'", "'.$this->getMot_de_passe().'", 1, 1)');

        }

        $sql->execute();
    }

    /**
     * compte le nombre d'utilisateur avec le mail de l'objet appelant la fonction.
     *
     * @return     <int>  nombre d'entrer ayant l'email donnée.
     */
    public function countItemByEmail() {
        $sql =$this->_bdd->query('SELECT COUNT(*) FROM utilisateur where email = "'.$this->getEmail().'"');
        return $sql->fetchColumn();
    }

    //Recupere les informations de l'utilisateur qui sont egal à l'email et les stocks dans un objet
    public function getUserByMail($mail) {
        $sql = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE email = "'.$mail.'"');
        $utilisateur = $sql->fetch();
        $utilisateur = new Utilisateur($utilisateur);
        return $utilisateur;
    }

    //a tester : fonction d'ouverture de session.
    /**
     * verifie si le mail de l'aobjet est bien dans la BDD
     * recupere les information coresspondant au mail
     * ouvre une session et set les info dans les variable de session
     *
     * @return     <booleen> si la session est ouverte ou pas
     */
    public function OpenSession {
        //si l'objet appelant la fonction possede un email dans la BDD
        if ($this->countItemByEmail() == 1) {

            //recupere les info don on a besion dans la bdd en fonction de l'email
            $utilisateur = $this->getUserByMail();

            //on ouvre la session et on set les variable de session
            session_start();
            $_SESSION['id_utilisateur'] = $utilisateur->getId_utilisateur();
            $_SESSION['nom'] = $utilisateur->getNom_utilisateur();
            $_SESSION['prenom'] = $utilisateur->getPrenom_utilisateur();
            $_SESSION['genre'] = $utilisateur->getGenre();
            $_SESSION['date_de_naissance'] = $utilisateur->getDate_de_naissance();
            $_SESSION['adresse_rue'] = $utilisateur->getAdresse_rue();
            $_SESSION['adresse_code_postal'] = $utilisateur->getAdresse_code_postal();
            $_SESSION['adresse_ville'] = $utilisateur->getAdresse_ville();
            $_SESSION['telephone'] = $utilisateur->getTelephone();
            $_SESSION['email'] = $utilisateur->getEmail();
            $_SESSION['newsletter'] = $utilisateur->getNewsletter();
            $_SESSION['seance_decouverte'] = $utilisateur->getSeance_decouverte();
            $_SESSION['rang'] = $utilisateur->getRang();

            return true;
        }

        return false
    }
}