<?php

class Voiture {
    private $id;
    private $marque;
    private $model;
    private $puissance;
    private $prix;
    private $couleur;

    // *********** constructor
    public function __construct($donnees=array()){
        $this->hydrate($donnees);
    }

    // *********** hydrate
    public function hydrate(array $donneesTableau){

        if(empty($donneesPdo) == false){
            foreach ($donneesTableau as $key => $value){
                $newString=$key;
                if(preg_match("#_#",$key)){
                    $word = explode("_",$key);
                    $newString = "";
                    foreach ($word as $w){
                        $newString.=ucfirst($w);
                    }
                }
                $method = "set".ucfirst($newString);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }
    }

    // *********** getters -> accesseurs
    public function getId(){
        return $this->id;
    }
    public function getMarque(){
        return $this->marque;
    }
    public function getModel(){
        return $this->model;
    }
    public function getPuissance(){
        return $this->puissance;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getCouleur(){
        return $this->couleur;
    }

    // *********** setters -> mutateurs
    public function setId($id){
        $this->id = $id;
    }
    public function setMarque($marque){
        $this->marque = $marque;
    }
    public function setModel($model){
        $this->model = $model;
    }
    public function setPuissance($puissance){
        $this->puissance = $puissance;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
    public function setCouleur($couleur){
        $this->couleur = $couleur;
    }

    
// ******************************** functions -> méthodes ***************
    // appelle la fonction save de dbmanager
    public function save(DbManager $dbmanager){
        $dbmanager->getVoitureRepo()->saveVoiture( $this );
    }

    // appelle la fonction get voitures par courses
    public function getMesCourses( DbManager $dbmanager ){

        return $dbmanager->getVoitureRepo()->getCoursesByVoiture( $this );

    }

    public function remove (DbManager $dbmanager){
        $courses = $dbmanager->getCourseVoitureByVoitureId( $this );
        
        if(!empty($courses)){
            foreach ($courses as $courses){
                $dbmanager->deleteCourseVoitureForVoiture( $this );
            }
        }
        $dbmanager->getVoitureRepo()->deleteVoiture( $this );
    }

}
