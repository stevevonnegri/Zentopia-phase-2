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
    protected $_seance_decouverte;
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
        $this->_nom_utilisateur = htmlspecialchars($nom);
    }
    public function setPrenom_utilisateur($prenom){
        $this->_prenom_utilisateur = htmlspecialchars($prenom);
    }
    public function setDate_de_naissance($dateDeNaissance){
        $this->_date_de_naissance = $dateDeNaissance;
    }
    public function setAdresse_rue($adresseRue){
        $this->_adresse_rue = htmlspecialchars($adresseRue);
    }
    public function setAdresse_code_postal($adresseCodePostal){
        $this->_adresse_code_postal = $adresseCodePostal;
    }
    public function setAdresse_ville($adresseVille){
        $this->_adresse_ville = htmlspecialchars($adresseVille);
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
    public function setSeance_decouverte($seanceDecouverte){
        $this->_seance_decouverte = $seanceDecouverte;
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
    public function getSeance_decouverte(){
        return $this->_seance_decouverte;
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
            $sql = $this->_bdd->prepare('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, genre, date_de_naissance, adresse_rue, adresse_code_postal, adresse_ville, telephone, email, mot_de_passe) 
            VALUES ("'.$this->getNom_utilisateur().'", "'.$this->getPrenom_utilisateur().'", "'.$this->getGenre().'", "'.$this->getDate_de_naissance().'", "'.$this->getAdresse_rue().'",
             "'.$this->getAdresse_code_postal().'", "'.$this->getAdresse_ville().'", "'.$this->getTelephone().'", "'.$this->getEmail().'", "'.$this->getMot_de_passe().'")');
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
        $sql = $this->_bdd->query('SELECT COUNT(*) FROM utilisateur where email = "'.$this->getEmail().'"');
        return $sql->fetchColumn();
    }

    /**
     * compte le nombre de reservation avec l'id de l'objet appelant la fonction.
     * 
     * @return     <int>  nombre de reservation deja faite par l'utilisateur.
     */
    public function countReserverByEmail() {
        $sql = $this->_bdd->query('SELECT COUNT(*) FROM reserver 
            NATURAL JOIN utilisateur
            WHERE email ="'.$this->getEmail().'"');

        return $sql->fetchColumn();
    }


    //Recupere les informations de l'utilisateur qui sont egal à l'email et les stocks dans un objet
    /**
    * recupere les information de la BDD en fonction d'un email.
    *
    *@return retourne un objet utilisateur qui correspond a l'email envoyer
    **/
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
     * @return     true si la session est ouverte, 'MDP' si le mot de passe donnée et celui de la BDD ne corresponde pas, 'EMAIL' si l'email n'existe pas dans la BDD.
     */
    public function OpenSession() {
        //si l'objet appelant la fonction possede un email dans la BDD
        if ($this->countItemByEmail() == 1) {

            //recupere les info don on a besoin dans la bdd en fonction de l'email

            $utilisateur = $this->getUserByMail($this->getEmail());

            //on verifie le mot de passe

            if (password_verify($this->getMot_de_passe(), $utilisateur->getMot_de_passe())) {

                //on ouvre la session et on set les variable de session
                session_start();
                $utilisateur->addVariableSession();

                return true;
            }

            return 'MDP';
            
        } 

        return 'EMAIL';
            
    }
    

    /**
     * crée ou met a jours les variable de session.
     */
    public function addVariableSession() {

        $_SESSION['id_utilisateur'] = $this->getId_utilisateur();
        $_SESSION['nom_utilisateur'] = $this->getNom_utilisateur();
        $_SESSION['prenom_utilisateur'] = $this->getPrenom_utilisateur();
        $_SESSION['genre'] = $this->getGenre();
        $_SESSION['date_de_naissance'] = $this->getDate_de_naissance();
        $_SESSION['adresse_rue'] = $this->getAdresse_rue();
        $_SESSION['adresse_code_postal'] = $this->getAdresse_code_postal();
        $_SESSION['adresse_ville'] = $this->getAdresse_ville();
        $_SESSION['telephone'] = $this->getTelephone();
        $_SESSION['email'] = $this->getEmail();
        $_SESSION['newsletter'] = $this->getNewsletter();
        $_SESSION['seance_decouverte'] = $this->getSeance_decouverte();
        $_SESSION['rang'] = $this->getRang();
    }



    //PARTIE VERIFICATION DES INFO INSCRIPTION/MODIFICATION
    //VERIFICATION DE L'EMAIL

    /**
    * verifie si l'email est present dans la BDD et si il est au bon format
    *
    *@return string 'ok' si tout va bien, sinon revoie le message d'erreur correspondant.
    **/
    public function EmailBonFormat($modifier = NULL) {
            //on set la variable $error_email_message a OK
            $error_email_message = 'ok';
            //email au bon format
            if (filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {

                //test si l'email est deja dans la BDD

                if ($this->countItemByEmail() != 0 AND isset($modifier) === NULL) {
                    
                    $error_email_message = '<p class="alert-danger">Cet email existe deja, merci de vous connecter (ou cliquer ici pour vous connecter).</p>';

                }

             } else {

                $error_email_message = '<p class="alert-danger"> format de l\'email invalide.</p>';
                    
            }

            return $error_email_message;

        }



    /**
    * verifie si l'age de l'utilisateur est superieur a 18 ans
    *
    *@return true si il a 18ans ou plus, false dans le cas contraire.
    **/
    public function VerifPlusDe18ans() {
        //verification que l'utilisateur a plus de 18 ans

            //on recupere l'age et on le separe en Jour, Mois, Année
            $date_naissance = date_parse($this->getDate_de_naissance());

            //on recupere la date du jour en mktime,
            //a laquel on retranche 18(notre limite d'age)
            $date_limite = mktime(0, 0, 0, date("m")  , date("d"), date("Y")-18);

            //on convertit date_naissance en mktime
            $date_naissance = mktime(0, 0, 0, $date_naissance["month"] , $date_naissance["day"], $date_naissance["year"]);

            //on formatte les 2 date pour pouvoir les commparer.
            $date_limite = date("Y-m-d", $date_limite);
            $date_naissance = date("Y-m-d", $date_naissance);
            
            //on verifie si l'utilisateur a plus de 18 ans.
            if ($date_naissance > $date_limite) {
                
                return true;
                
            } else {

                return false;

            }
    }



     /**
     * Fonction de recherche de membre par critères
     * construit la requête SQL en fonction des champs remplis avant de l'envoyer à la BDD
     *
     * @return     un tableau de données contenant les infos du ou des membres correspondant à la recherche
     */

    public function getRechercheMembre($nom = NULL, $prenom = NULL, $tel = NULL, $rang = NULL){

        $lists = [];
        $where = '';

        if ($nom) {
            
            $where .= 'AND nom_utilisateur = "' .$nom. '" '; 
        }

        if ($prenom) {
            
            $where .= 'AND prenom_utilisateur = "' .$prenom. '" '; 
        }

        if ($tel) {
            
            $where .= 'AND telephone = "' .$tel. '" '; 
        }

        if ($rang) {
            
            $where .= 'AND rang = "' .$rang. '" '; 
        }



        $where = substr($where, 4);


        $sql = $this->_bdd->query(
            'SELECT * FROM '.$this->_table.' WHERE '.$where);

        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
            $lists[] = new $this->_table($donnees);
        }

        return $lists; 

    } 

}