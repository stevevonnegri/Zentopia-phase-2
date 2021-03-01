<?php

/**
* <h2>Classe Seance, fille de Model</h2>
* <p>Celle-ci contient :</p>
* <ul>
*   <li>Les getters et les setters</li>
*   <li>Les fonctions custom liées aux séances présentes sur le planning dynamique du site</li>
* </ul>
* @author Anaïs Bironneau, Olivier Clément & Steve von Negri
* @date 11/02/2021
*/

 class Seance extends Model{

    protected $_id_seance;
    protected $_date_seance;
    protected $_heure_debut_seance;
    protected $_heure_fin_seance;
    protected $_annule;
    protected $_id_type_de_cours;
    protected $_id_professeur;
    
    protected $_table = "seance";
    protected $_cle = "id_seance";

    
    /***********/
    /* SETTERS */
    /***********/
      
    public function setId_seance(int $id){
        $this->_id_seance = $id;
    }
    public function setDate_seance($date){
        $this->_date_seance = $date;
    }
    public function setHeure_debut_seance($heure_debut){
        $this->_heure_debut_seance = $heure_debut;
    }
    public function setHeure_fin_seance($heure_fin){
        $this->_heure_fin_seance = $heure_fin;
    }
    public function setAnnule($annule) {
        $this->_annule = $annule;
    }
    public function setId_type_de_cours($id_cours) {
        $this->_id_type_de_cours = $id_cours;
    }
    public function setId_professeur($id_professeur) {
        $this->_id_professeur = $id_professeur;
    }



    /***********/
    /* GETTERS */
    /***********/

    public function getId_seance(){
        return $this->_id_seance;
    }
    public function getDate_seance(){
        return $this->_date_seance;
    }
    public function getHeure_debut_seance(){
        return $this->_heure_debut_seance;
    }
    public function getHeure_fin_seance(){
        return $this->_heure_fin_seance;
    }
    public function getAnnule() {
        return $this->_annule;
    }
    public function getId_type_de_cours() {
        return $this->_id_type_de_cours;
    }
    public function getId_professeur() {
        return $this->_id_professeur;
    }

    /**
    * Fonction "getSeanceById"
    * récupère la liste des informations nécessaire à l'affichage des séances réservées dans l'espace personnel
    * 
    * @param $id (int) : id de l'utilisateur
    *
    * @return un tableau contenant la liste des séances et leurs données
    **/
    public function getSeanceById(int $id) {

        $sql = $this->_bdd->query('
            SELECT seance.id_seance, date_seance, heure_debut_seance, heure_fin_seance, nom_type_de_cours, professeur.id_professeur
            FROM '.$this->_table.' 
            INNER JOIN type_de_cours ON seance.id_type_de_cours = type_de_cours.id_type_de_cours
            INNER JOIN professeur ON seance.id_professeur = professeur.id_professeur
            INNER JOIN reserver ON seance.id_seance = reserver.id_seance
            INNER JOIN utilisateur ON reserver.id_utilisateur = utilisateur.id_utilisateur
            WHERE utilisateur.id_utilisateur = '.$id
        );

        $lists = [];
        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){

            array_push($lists, $donnees);

        }

        return $lists;
    }


    /**
    * Fonction "getProfesseurNameById"
    * récupère le prénom d'un professeur avec son id
    * 
    * @param $id (int) : id du professeur
    * @return le prénom du professeur
    **/
    public function getProfesseurNameById(int $id) {
        $sql = $this->_bdd->query('SELECT prenom_utilisateur 
            FROM utilisateur 
            NATURAL JOIN professeur
            WHERE id_professeur = '.$id
            );

        return $sql->fetchColumn();
    }


    /**
    * Fonction "DeleteReservationById"
    * supprime la jointure entre une seance et l'utilisateur qui l'a réservée
    *
    * @param $id_seance (int) : l'id de la seance
    * @param $id_utilisateur (int) : l'id de l'utilisateur
    *
    **/
    public function DeleteReservationById(int $id_seance, int $id_utilisateur) {

        $this->_bdd->exec('DELETE FROM reserver 
            WHERE id_seance = '.$id_seance.' 
            AND id_utilisateur = '.$id_utilisateur
        );

    }

    
    /**
     * Fonction "AddReservation"
     * ajoute une réservation dans la table "reserver"
     * 
     * @param $objet : un tableau qui doit avoir l'id d'une séance et l'id d'un utilisateur pour fonctionner
     */
    public function AddReservation($objet){
		$champs = '';
		$valeurs = '';
		foreach($objet as $key => $value){
			if($value){
				$champs .= $key.' , ';
				$valeurs .= '"'.$value.'" , ';
			}
		}
		$valeurs = substr($valeurs,0,-2);
		$champs = substr($champs,0,-2);

		$sql = $this->_bdd->prepare('INSERT INTO reserver ('.$champs.') VALUES ('.$valeurs.')');
        $sql->execute();
	}

    /**
    * Fonction "DeleteSeance"
	* supprime une réservation de la table "reserver"
	*
	*@param $data : un tableau contenant l'id de la séance et l'id de l'utilisateur
	*
	**/
	public function DeleteSeance($data){

		$this->_bdd->exec('DELETE FROM reserver WHERE id_seance = '.$data['id_seance'].' AND id_utilisateur = '.$data['id_utilisateur']);
        
	}


    /**
     * Fonction "getSeance"
     * renvoie les séances depuis la date envoyée, jusqu'au dimanche suivant
     *
     * @param $filtre : ajoute un filtre si sélectionné par l'utilisateur
     * @param $date : date à partir de laquelle on veux les séances, prend la date du jour si NULL
     *
     * @return un tableau avec toutes les informations utiles sur les séances demandées
     */
    public function getSeance($filtre = "", $date = NULL) {

        // ajoute un filtre selon le type de séance si option utilisée
        $where = "";
        if ($filtre != "") {
            $where .= 'AND nom_type_de_cours = "'.$filtre.'"';
        }

        // création des variables utilisées
            // teste si $date est NULL
            if (!isset($date)) {

                // si pas de date, on récupère celle d'aujourd'hui
                $jourActuel = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

                // on récupère l'heure
                $heureActuel = date('H:i:s');
               
            } else {

                // si une date est donnée on la prend et on set l'heure à zero pour récupérer toutes les séances de la journée
                $jourActuel = $date;
                $heureActuel = "00:00:00";
            }


            // on récupère le jour de la semaine
            $jourSemaineActuel = date('w', $jourActuel);

        // calcul des variables
            // calcule le nombre de jours restants dans la semaine
            $jourDiff = 7 - $jourSemaineActuel;

            // calcule la date à laquelle on sera à la fin de la semaine
            $jourLimite  = date('Y:m:d', mktime(0, 0, 0, date("m", $jourActuel)  , date("d", $jourActuel)+$jourDiff, date("Y", $jourActuel)));

            // on transforme la variable jourActuel de mktime vers une date
            $jourActuel = date('Y:m:d', $jourActuel);

        // envoi de la requête SQL
        $sql = $this->_bdd->query('SELECT seance.id_seance, date_seance, heure_debut_seance, heure_fin_seance, annule, nom_type_de_cours, nombre_de_places, utilisateur.prenom_utilisateur, utilisateur.id_utilisateur
            FROM seance
            NATURAL JOIN type_de_cours
            NATURAL JOIN professeur
            NATURAL JOIN utilisateur
            WHERE date_seance BETWEEN "'.$jourActuel.'" AND "'.$jourLimite.'"
            AND NOT (date_seance = "'.$jourActuel.'" AND heure_debut_seance <= "'.$heureActuel.'")
            '.$where.'
            ORDER BY date_seance ASC, heure_debut_seance ASC            
            ');

        $lists = [];
        while($donnees = $sql->fetch(PDO::FETCH_ASSOC)){

            // on récupère le nombre de réservations pour la séance donnée pour pouvoir calculer le nombre de places restantes
            $sql_2 = $this->_bdd->query('
                SELECT COUNT(*) 
                FROM reserver 
                WHERE id_seance = '.$donnees['id_seance']);

            $donnees['nbr_place_prise'] =  $sql_2->fetchColumn();

            // vérifie si le membre connecté a déjà réservé la séance et l'ajoute au tableau $donnees
            if (isset($_SESSION['id_utilisateur'])) {

                $donnees['A_Reserver'] = in_array($donnees['id_seance'], $this->getReservationById_SESSION());
                
            }
            
            // on ajoute la liste des participants de chaque cours
            $donnees['participants'] = $this->getListParticipant($donnees['id_seance']);

            // ajouter la liste des participants au cours

            array_push($lists, $donnees);

        }

        return $lists;
    }



    /**
     * Fonction "getListParticipant"
     * récupère la liste des noms, prénoms et id des participants à un cours
     *
     * @param $id_seance : l'id de la séance à partir de laquelle la fonction doit retourner des données
     * 
     * @return un tableau associatif avec la liste les valeurs demandées
     */
    public function getListParticipant($id_seance) {

        $sql = $this->_bdd->query('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur 
            FROM reserver 
            NATURAL JOIN utilisateur
            WHERE id_seance = '.$id_seance.'
            ');

        $lists_participant = [];

        while ($donnees = $sql->fetch(PDO::FETCH_ASSOC)) {
                array_push($lists_participant, $donnees);
            }
       
        return $lists_participant;

    }


    /**
     * Fonction getReservationById_SESSION
     * récupère les ids des séances réservées par le membre connecté
     * 
     * @return un tableau simple avec la liste des ids de séance  
     */
    public function getReservationById_SESSION() {
        
        $lists_id_seances = [];
 
        if (isset($_SESSION['id_utilisateur'])) {
            $sql = $this->_bdd->query('SELECT id_seance FROM reserver WHERE id_utilisateur = '.$_SESSION['id_utilisateur']);
            
            while ($donnees = $sql->fetchColumn()) {
                array_push($lists_id_seances, $donnees);
            }

            return $lists_id_seances;
        }

    }


    /**
     * Fonction "allTypeDeCours"
     * retourne tous les noms des types de cours présents dans la BDD
     *
     * @return retourne un tableau contenant les noms des types de cours
     */
    public function allTypeDeCours() {

        $sql = $this->_bdd->query('SELECT nom_type_de_cours, id_type_de_cours FROM type_de_cours');

        $lists = [];

        while ($donnees = $sql->fetch()) {
            array_push($lists, $donnees);
        }

        return $lists;

    }


    /**
     * Fonction "CountParticipantSeance"
     * compte le nombre de participants à une seance
     * 
     * @param $id : l'id de la séance
     * 
     * @return le nombre de participants à cette seance
     */
    public function CountParticipantSeance($id) {
        $sql = $this->_bdd->query('SELECT count(*) FROM reserver WHERE id_'.$this->_table.' = '.$id);
        return $sql->fetchColumn();
    }

    
    /**
     * Fonction "getItemFromReserver"
     * cherche les séances auxquelles participe un utilisateur
     * 
     * @param $id : l'id de l'utilisateur
     * @param $colonne : le nom de la colonne où on veut chercher
     * 
     * @return un tableau avec l'id_utilisateur des membres inscrits sur cette séance 
     */
    public function getItemFromReserver($id, $colonne) {

        $sql =$this->_bdd->query('SELECT id_utilisateur FROM reserver WHERE '.$colonne.' = "'.$id.'"');
        
        $lists = [];
        while ($donnees = $sql->fetchColumn()) {
            array_push($lists, $donnees);
        }

        return $lists;

    }

    /**
     * Fonction "deleteParticipant"
     * supprime un participant d'une séance
     *
     * @param $id_seance : l'id de la séance
     * @param $id_utilisateur : l'id de l'utilisateur
     */
    public function deleteParticipant($id_seance, $id_utilisateur) {

        $sql = $this->_bdd->exec('DELETE 
            FROM reserver 
            WHERE id_seance ='.$id_seance.'
            AND id_utilisateur ='.$id_utilisateur.'
            ');

    }

    /**
     * Fonction "addParticipant"
     * ajoute un participant à une seance
     *
     * @param $id_seance : l'id de la séance
     * @param $id_utilisateur : l'id de l'utilisateur
     */
    public function addParticipant($id_seance, $id_utilisateur) {
        $sql = $this->_bdd->prepare('INSERT INTO reserver (id_seance, id_utilisateur) VALUES ('.$id_seance.', '.$id_utilisateur.')');
        $sql->execute();
    }


    /**
     * Fonction "VerificationPlageHoraireDispo"
     * compte le nombre de séances présentes lors d'un ajout ou d'une modification de séance pour éviter le chevauchement de séance durant la même période
     * 
     * @param $id : par défaut à NULL, sinon id de la séance à modifier (permet de ne pas compter dessus lors de la modification d'un prof par exemple)
     * 
     * @return le résultat de la requête
     */
    public function VerificationPlageHoraireDispo($id = NULL){

        if( isset($id) ) {
            $sql =$this->_bdd->query("SELECT count(*) FROM seance WHERE date_seance = date('".$this->_date_seance."') 
            AND heure_fin_seance > time('".$this->_heure_debut_seance."') 
            AND heure_debut_seance < time('".$this->_heure_fin_seance."') 
            AND annule = 0 AND id_seance <> ".$id.";");

        } else {
            $sql =$this->_bdd->query("SELECT count(*) FROM seance WHERE date_seance = date('".$this->_date_seance."') 
            AND heure_fin_seance > time('".$this->_heure_debut_seance."') 
            AND heure_debut_seance < time('".$this->_heure_fin_seance."') 
            AND annule = 0
            ;");


        }
        return $sql->fetchColumn();
    }

    /**
     * Fonction "VerifDateHeure"
     * vérifie la validité d'une date lors de la modif ou l'ajout d'une séance (par exemple que la date et l'heure ne soient pas encore passés, que l'heure de fin soit ultérieure à l'heure de début)
     * 
     * @param $date : la date saisie lors de l'ajout ou de la modification de la séance
     * @param $heure_debut : heure de début saisie
     * @param $heure_fin : heure de fin saisie
     * 
     * @return true or false
     */
    public function VerifDateHeure($date, $heure_debut, $heure_fin) {

        if(date('Y-m-d') < $date) {
            if($heure_debut < $heure_fin) {
                return true;
            }
        } else if (date('Y-m-d') == $date ) {
            if(date('H:i') < $heure_debut) {
                if($heure_debut <  $heure_fin) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    /**
     * Fonction "AddSeance"
     * ajoute une séance à la BDD
     */
    public function AddSeance() {

        $sql = $this->_bdd->prepare('INSERT INTO seance (date_seance, heure_debut_seance, heure_fin_seance, id_type_de_cours, id_professeur) 
            VALUES ("'.$this->getDate_seance().'", "'.$this->getHeure_debut_seance().'", "'.$this->getHeure_fin_seance().'", 
            "'.$this->getId_type_de_cours().'", "'.$this->getId_professeur().'")');
        $sql->execute();
    }
}