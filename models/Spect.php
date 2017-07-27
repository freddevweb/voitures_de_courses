<?php

class Spect {

    private $id;
    private $nom;
    private $dateAchat;
    private $email;
    private $sexe;
    private $courseId;

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

    // *********** getters setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getDateAchate(){
        return $this->dateAchat;
    }
    public function setDateAchat($dateAchat){
        $this->dateAchat = $dateAchat;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getSexe(){
        return $this->sexe;
    }
    public function setSexe($sexe){
        $this->sexe = $sexe;
    }
    public function getCourseId(){
        return $this->courseId;
    }
    public function setCourseId($courseId){
        $this->courseId = $courseId;
    }



    public function save(){
        
    }

    public function delete(){

    }






    


    
}