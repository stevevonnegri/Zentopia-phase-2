<?php
 class Image extends Model{

    protected $_id_image;
    protected $_url_image;
    protected $_id_utilisateur;

    protected $_table = "image"
    protected $_cle = "id_image"

    //setters
    public function setId_image(int $id){
        $this->_id_image = $id;
    }
    public function setUrl_image($url){
        $this->_url_image = $url;
    }


    //Getters
    public function getId_image(){
        return $this->_id_professeur;
    }
    public function getUrl_image(){
        return $this->_url_image;
    }

}