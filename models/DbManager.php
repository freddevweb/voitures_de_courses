<?php

class DbManager {

    private $connexion;

    private $voitureRepo;
    private $courseRepo;
    private $spectRepo;


    public function __construct(){
        $this->connexion = Connexion::getConnexion();

        $this->setVoitureRepo(new VoitureRepo($this->connexion));
        $this->setCourseRepo(new CourseRepo($this->connexion));
        $this->setSpectRepo(new SpectRepo($this->connexion));
    }


    public function getVoitureRepo(){
        return $this->voitureRepo;
    }
    public function setVoitureRepo($voitureRepo){
        $this->voitureRepo = $voitureRepo;
    }
    public function getCourseRepo(){
        return $this->courseRepo;
    }
    public function setCourseRepo($courseRepo){
        $this->courseRepo = $courseRepo;
    }
    public function getSpectRepo(){
        return $this->courseRepo;
    }
    public function setSpectRepo($spectRepo){
        $this->spectRepo = $spectRepo;
    }
        
}