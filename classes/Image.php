<?php
 class Image extends Model{

    protected $_id_image;
    protected $_url_image;
    protected $_id_utilisateur;

    protected $_table = "image";
    protected $_cle = "id_image";

    //setters
    public function setId_image(int $id){
        $this->_id_image = $id;
    }
    public function setUrl_image($url){
        $this->_url_image = $url;
    }


    //Getters
    public function getId_image(){
        return $this->_id_image;
    }
    public function getUrl_image(){
        return $this->_url_image;
    }


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

    public static function GetImageLink($largeur, $nom){
        return ('assets/images/slider/'.$largeur.'-'.$nom);
    }

    public function deleteImage($id, $nom) {
        unlink('assets/images/'.$nom);
        unlink('assets/images/slider/100-'.$nom);
        unlink('assets/images/slider/770-'.$nom);

        $sql = $this->_bdd->exec("DELETE FROM image WHERE id_image=".$id);

        return $resultat;
    }

    

}