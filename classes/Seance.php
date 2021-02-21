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
     * @param objet est un tableau qui dit avoir l'id d'une seance et l'id d'un utilisateur pour fonctioner
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
	*@param      <int>   	$id     	l'id l'element
	*@param      <string>   $colonne    nom de la colonne
	*
	**/
	public function DeleteSeance($data){

		$this->_bdd->exec('DELETE FROM reserver WHERE id_seance = '.$data['id_seance'].' AND id_utilisateur = '.$data['id_utilisateur']);
        
	}
}