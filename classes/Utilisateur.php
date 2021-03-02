<?php

/**
* <h2>Classe Utilisateur, fille de Model</h2>
* <p>Celle-ci contient :</p>
* <ul>
*   <li>Les getters et les setters</li>
*   <li>Les fonctions custom liées aux utilisateurs</li>
* </ul>
* @author Anaïs Bironneau, Olivier Clément & Steve von Negri
* @date 11/02/2021
*/


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


    /***********/
    /* SETTERS */
    /***********/
      
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


    /***********/
    /* GETTERS */
    /***********/

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
     * Fonction "AddUtilisateur"
     * ajoute un objet utilisateur dans la BDD
     */
    public function AddUtilisateur() {

        // teste si la personne veux s'inscrire à la newletter si oui, envoie le booléen true pour les colonnes 
        // "newsletter" et "seance_decouverte" -> la personne venant de s'inscrire, il n'y a pas besoin de tester si elle a deja fait des cours puisque cela n'est pas possible
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
     * Fonction "countItemByEmail"
     * cherche à savoir s'il y a un utilisateur associé au mail contenu dans l'objet appelant la fonction
     *
     * @return le nombre d'entrées ayant l'email donnée
     */
    public function countItemByEmail() {
        $sql = $this->_bdd->query('SELECT COUNT(*) FROM utilisateur where email = "'.$this->getEmail().'"');
        return $sql->fetchColumn();
    }


    /**
     * Fonction "countReserverByEmail"
     * compte le nombre de réservations associées à l'id de l'objet appelant la fonction.
     * 
     * @return le nombre de réservations effectuées par l'utilisateur.
     */
    public function countReserverByEmail() {
        $sql = $this->_bdd->query('SELECT COUNT(*) FROM reserver 
            NATURAL JOIN utilisateur
            WHERE email ="'.$this->getEmail().'"');

        return $sql->fetchColumn();
    }


    /**
    * Fonction "getUserByMail"
    * récupère les données d'un utilisateur en fonction de son email
    *
    * @param $mail : le mail dont on souhaite récupérer un possible utilisateur
    *
    *@return retourne un objet utilisateur
    **/
    public function getUserByMail($mail) {
        $sql = $this->_bdd->query('SELECT * FROM '.$this->_table.' WHERE email = "'.$mail.'"');
        $utilisateur = $sql->fetch();

        if ($utilisateur == NULL) {
            
            return false;

        } else {

            $utilisateur = new Utilisateur($utilisateur);
            return $utilisateur;
        }


        
    }


    /**
     * Fonction "OpenSession"
     * vérifie si le mail de l'objet est bien dans la BDD, récupère les informations correspondant au mail, ouvre une session et set les infos dans les variables de session
     *
     * @return     true si la session est ouverte, 'MDP' si le mot de passe donné et celui de la BDD ne correspondent pas, 'EMAIL' si l'email n'existe pas dans la BDD
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
     * Fonction "addVariableSession"
     * crée ou met à jour les variables de session.
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


    /**
    * Fonction "EmailBonFormat"
    * vérifie si l'email est présent dans la BDD et s'il est au bon format
    *
    * @param $modifier : NULL par défaut, à renseigner si on ne veut pas que l'email soit vérifié dans la BDD
    *
    *@return string 'ok' si tout va bien, sinon revoie le message d'erreur correspondant.
    **/
    public function EmailBonFormat($modifier = NULL) {

            // on set la variable $error_email_message a OK
            $error_email_message = 'ok';
            //email au bon format
            if (filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {

                //test si l'email est deja dans la BDD

                if ($this->countItemByEmail() != 0 AND $modifier == NULL) {

                    $error_email_message = '<p class="error">Cet email est déjà lié à un compte existant.</p>';

                }

             } else {

                $error_email_message = '<p class="error">Le format de l\'email est invalide.</p>';
                    
            }

            return $error_email_message;

        }



    /**
    * Fonction "VerifPlusDe18ans"
    * vérifie si l'âge de l'utilisateur est supérieur à 18 ans
    *
    *@return true s'il a 18 ans ou plus, false dans le cas contraire
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
     * Fonction "getRechercheMembre"
     * construit la requête SQL de recherche de membres en fonction des champs remplis, et l'envoie à la BDD
     *
     * @param $nom : NULL par défaut, contient le nom de l'utilisateur si renseigné
     * @param $prenom : NULL par défaut, contient le prénom de l'utilisateur si renseigné
     * @param $tel : NULL par défaut, contient le téléphone de l'utilisateur si renseigné
     * @param $email : NULL par défaut, contient le mail de l'utilisateur si renseigné
     *
     * @return un tableau de données contenant les infos du ou des membres correspondant à la recherche
     */

    public function getRechercheMembre($nom = NULL, $prenom = NULL, $tel = NULL, $rang = NULL, $email = NULL){

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

        if ($email) {
            
            $where .= 'AND email = "' .$email. '" '; 
        }

        

        if ($where != '') {

            // si pas de condition, dans le cas ou toutes les options sont NULL, la fonction substr renvoie false, ce qui provoque une erreur dans la requête
            $where = substr($where, 4);

            $sql = $this->_bdd->query(
            'SELECT * FROM '.$this->_table.' WHERE '.$where);
          
            while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){
                $lists[] = new $this->_table($donnees);
            }

            return $lists;
        
        } else {

            // si la variable where vaut '' c'est qu'il n'y a pas de paramètres, donc la fonction renvoie un tableau vide.
            return $lists;

        }
        
    } 

}