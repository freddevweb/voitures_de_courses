<?php

class Course {
    private $id;
    private $titre;
    private $duree;
    private $dateCourse;
    private $voitureId;

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
    public function getTitre(){
        return $this->titre;
    }
    public function getDuree(){
        return $this->duree;
    }
    public function getDateCourse(){
        return $this->dateCourse;
    }
    public function getVoitureId(){
        return $this->voitureId;
    }

    // *********** setters -> mutateurs
    public function setId($id){
        $this->id = $id;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    public function setDuree($duree){
        $this->duree = $duree;
    }
    public function setDateCourse($dateCourse){
        $this->dateCourse = $dateCourse;
    }
    public function setVoitureId($voitureId){
        $this->voitureId = $voitureId;
    }

}