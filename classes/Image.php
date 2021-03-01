<?php

/**
* <h2>Classe Image, fille de Model</h2>
* <p>Celle-ci contient :</p>
* <ul>
*   <li>Les getters et les setters</li>
*   <li>Les fonctions custom liées aux images du site</li>
* </ul>
* @author Anaïs Bironneau, Olivier Clément & Steve von Negri
* @date 11/02/2021
*/

 class Image extends Model{

    protected $_id_image;
    protected $_url_image;
    protected $_id_utilisateur;

    protected $_table = "image";
    protected $_cle = "id_image";


    /***********/
    /* SETTERS */
    /***********/
       
    public function setId_image(int $id){
        $this->_id_image = $id;
    }
    public function setUrl_image($url){
        $this->_url_image = $url;
    }


    /***********/
    /* GETTERS */
    /***********/

    public function getId_image(){
        return $this->_id_image;
    }
    public function getUrl_image(){
        return $this->_url_image;
    }

    /**
     * Fonction "resizeImage"
     * redimmensionne la taille d'une image
     *
     * @param $image_source : lien de l'image a resize
     * @param $largeur : largeur cible pour la taille de l'image
     * @param $nom : nom de l'image
     *
     */
    public function resizeImage($image_source, $largeur, $nom) {


        $largeur = (int) $largeur;

        $source = imagecreatefromjpeg($image_source); 

        $reduction = ( ($largeur * 100)/imagesx($source));
        $hauteur = ((imagesy($source) * $reduction)/100 );


        $image_destination = imagecreatetruecolor($largeur, $hauteur); 

        imagecopyresampled($image_destination, $source, 0, 0, 0, 0, imagesx($image_destination), imagesy($image_destination), imagesx($source), imagesy($source)); //rezise


        $nom = str_replace(" ", "-", $nom);
        
        $nouvelle_image = imagejpeg($image_destination, "assets/images/slider/".$largeur."-".$nom);

    }

    /**
     * Fonction "getImageLink"
     * génère le lien d'une image
     *
     * @param $largeur : largeur de de l'image
     * @param $nom : nom de l'image
     * @return le chemin d'une image avec la largeur + nom d'une image
     */
    public static function GetImageLink($largeur, $nom){
        return ('assets/images/slider/'.$largeur.'-'.$nom);
    }


    /**
     * Fonction "deleteImage"
     * supprime les photos du slider du serveur puis de la bdd
     * 
     * @param $id : id de l'image 
     * @param $nom : nom de l'image
     * @return renvoie le résultat de la requête
     */
    public function deleteImage($id, $nom) {
        unlink('assets/images/'.$nom);
        unlink('assets/images/slider/100-'.$nom);
        unlink('assets/images/slider/770-'.$nom);

        $sql = $this->_bdd->exec("DELETE FROM image WHERE id_image=".$id);

        return $resultat;
    }

}