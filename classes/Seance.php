<?php
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

    //setters
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



    //Getters
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
    *@param id de l'utilisateur
    *
    * fonction qui recupere la liste des information nécessaire a l'affichage des seance reserver 
    * dans l'espace personnel
    *
    *@return array un tableau contenant la liste des sceance et leur information
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
    *@param int l'id du professeur
    *
    * fonction qui trouve et renvoie le prenom dun professeur avec son id
    *
    *@return string le prenom d'un professeur
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
    * @param int l'id de la seance
    * @param int l'id de l'utilisateur
    *
    * supprime la jointure entre une seance et l'utilisateur qui la reserver.
    **/
    public function DeleteReservationById(int $id_seance, int $id_utilisateur) {

        $this->_bdd->exec('DELETE FROM reserver 
            WHERE id_seance = '.$id_seance.' 
            AND id_utilisateur = '.$id_utilisateur
        );

    }

    
    /**
     * Ajoute une Reservation dans la table reserve
     * 
     * @param objet est un tableau qui doit avoir l'id d'une seance et l'id d'un utilisateur pour fonctioner
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
	* fonction suppriment un élément d'une BDD selon un ID et un nom de colonne.
	*
	*@param      data un tableau l'id seance et l'id utilisateur
	*
	**/
	public function DeleteSeance($data){

		$this->_bdd->exec('DELETE FROM reserver WHERE id_seance = '.$data['id_seance'].' AND id_utilisateur = '.$data['id_utilisateur']);
        
	}

    /**
     * Renvoie les seance depuis la date envoyer, jusqu'au dimanche suivant
     *
     * @param      <mktime>  date a partir de laquel on veux les seance, prend la date du jour si NULL
     *
     * @return     un tableau avec toute les information utile sur les seance demander.
     */
    public function getSeance($filtre = "", $date = NULL) {
        //ajoute un filtre selon le type de seance si option utiliser
        $where = "";
        if ($filtre != "") {
            $where .= 'AND nom_type_de_cours = "'.$filtre.'"';
        }

        //creation des variable utilisé
            //teste si $date est NULL
            if (!isset($date)) {
                //si pas de date, on recupere celle d'aujourd'hui
                $jourActuel = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                //on recupere l'heure
                $heureActuel = date('H:i:s');
               
            } else {
                //si une date est donnée on la prend et on set l'heure a zero pour recupere toute les seance de la journée.
                $jourActuel = $date;
                $heureActuel = "00:00:00";
            }


            //on recupere le jour de la semaine)
            $jourSemaineActuel = date('w', $jourActuel);

        //calcul des variable
            //calcul le nombre de jour restant dans la semaine
            $jourDiff = 7 - $jourSemaineActuel;
            //calcule la date a laquel on sera a la fin de la semaine.

            $jourLimite  = date('Y:m:d', mktime(0, 0, 0, date("m", $jourActuel)  , date("d", $jourActuel)+$jourDiff, date("Y", $jourActuel)));
            

            //on transforme la variable jourActuel de mktime vers une date
            $jourActuel = date('Y:m:d', $jourActuel);

        //envoie de la commande SQL
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
            //on recupere le nombre de reservation pour la seance donnée pour pouvoir calculer le nombre de place restante
            $sql_2 = $this->_bdd->query('
                SELECT COUNT(*) 
                FROM reserver 
                WHERE id_seance = '.$donnees['id_seance']);

            $donnees['nbr_place_prise'] =  $sql_2->fetchColumn();

            //verifie si le membre connecter a deja reserver la seance et l'ajoute au tableau $données
            if (isset($_SESSION['id_utilisateur'])) {

                $donnees['A_Reserver'] = in_array($donnees['id_seance'], $this->getReservationById_SESSION());
                
            }
            

            //on ajoute la liste des participant de chaque cours.
            $donnees['participants'] = $this->getListParticipant($donnees['id_seance']);

            //ajouter la liste des participant au cours

            array_push($lists, $donnees);

        }

        return $lists;
    }

    /**
     *@param in id de seance.
     *
     * recupere la liste des nom et prenom et id des participant a un cours selon id_seance
     * 
     * @return un tableau associatif avec la liste les 3 valeur demander.
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
     * recupere les id des seance reserver par le membre connecter
     *
     * @return     un tableau simple avec la liste des id de seance  
     */
    public function getReservationById_SESSION() {
        //modification de la varible de session pour faire des TEST
        //$save = $_SESSION['id_utilisateur'];
        //$_SESSION['id_utilisateur'] = 7;
        
        $lists_id_seances = [];
 
        if (isset($_SESSION['id_utilisateur'])) {
            $sql = $this->_bdd->query('SELECT id_seance FROM reserver WHERE id_utilisateur = '.$_SESSION['id_utilisateur']);
            
            while ($donnees = $sql->fetchColumn()) {
                array_push($lists_id_seances, $donnees);
            }

            return $lists_id_seances;
        }


        //$_SESSION['id_utilisateur'] = $save;

    }


    /**
     * retourne sous forme de tableau simple tout les nom des type de cours present dans la BDD
     *
     * @return     array  retourne les nom des type de cours
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
     * compte le nombre de participant a une seance
     * 
     * @param id l'id de la seance
     * 
     * @return sql return le nombre de participant à cette seance
     */
    public function CountParticipantSeance($id) {
        $sql = $this->_bdd->query('SELECT count(*) FROM reserver WHERE id_'.$this->_table.' = '.$id);
        return $sql->fetchColumn();
    }

    
    /**
     * cherche les seance a laquel participe un utilisateur
     * 
     * @param id l'id d'une colone et son nom dans la BDD
     * 
     * @return lists return un tableau avec l'id_utilisateur des membres inscrits sur cette seance 
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
     * supprime un participant d'une seance en fonction de son id.
     *
     * @param      string  $id_seance       The identifier seance
     * @param      string  $id_utilisateur  The identifier utilisateur
     */
    public function deleteParticipant($id_seance, $id_utilisateur) {

        $sql = $this->_bdd->exec('DELETE 
            FROM reserver 
            WHERE id_seance ='.$id_seance.'
            AND id_utilisateur ='.$id_utilisateur.'
            ');

    }

    /**
     * Ajoute un participant a une seance
     *
     * @param      string  $id_seance       l'identifiant de la seance
     * @param      string  $id_utilisateur  l'identifiant de l'utilisateur
     */
    public function addParticipant($id_seance, $id_utilisateur) {
        $sql = $this->_bdd->prepare('INSERT INTO reserver (id_seance, id_utilisateur) VALUES ('.$id_seance.', '.$id_utilisateur.')');
        $sql->execute();
    }


    /**
     * Fonction qui compte le nombre de seance présente lors d'un ajoute ou d'une modification de seance pour eviter le chevauchement se seance durnat la meme periode
     * 
     * @param id-> Defauld a NULL   id de la seance a modifier (permet de ne pas compter dessus lors de la modification d'un prof par exemple)
     * 
     * @return sql retour le nombre de resultat
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
     * Verifie la validiter d une date lors de la modif d une seance ou l ajout 
     * (verifie que la date et l'heure n'est pas encore passer, que l heure de fin soit plus grand que l heure de debut )
     * 
     * @param date date saisi lors de l ajout ou de la modification de la seance
     * @param heure_debut heure de debut saisi lors de l ajout ou de la modification de la seance
     * @param heure_fin heure de fin saisi lors de l ajout ou de la modification de la seance
     * 
     * @return retour si c'est erreur ou non
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
     * Fonction pour l ajout de seance a la bdd
     */
    public function AddSeance() {

        $sql = $this->_bdd->prepare('INSERT INTO seance (date_seance, heure_debut_seance, heure_fin_seance, id_type_de_cours, id_professeur) 
            VALUES ("'.$this->getDate_seance().'", "'.$this->getHeure_debut_seance().'", "'.$this->getHeure_fin_seance().'", 
            "'.$this->getId_type_de_cours().'", "'.$this->getId_professeur().'")');
        $sql->execute();
    }
}