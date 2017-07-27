<?php

class CourseVoiture {

    private $id;
    private $courseId;
    private $voitureId;

    // *********** constructor
    public function __construct($donnees=array()){
        $this->hydrate($donnees);
    }

    // *********** hydrate
    public function hydrate(array $donneesTableau){

        if(empty($donneesTableau) == false){
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
    public function getCourseId(){
        return $this->courseId;
    }
    public function setCourseId($nom){
        $this->courseId = $courseId;
    }
    public function getVoitureId(){
        return $this->voitureId;
    }
    public function setVoitureId($voitureId){
        $this->voitureId = $voitureId;
    }

    // select for control
    public function getCourseVoitureByVoitureId($id){

        $query = 'SELECT * FROM courseVoiture WHERE voiture_id = :id';
        $values = array( 
            'id'=>$id 
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $course = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($course)){
            return new Voiture($course[0]);
        }
        return FALSE;
    }

    public function getCourseVoitureByCourseId($id){

        $query = 'SELECT * FROM courseVoiture WHERE course_id = :id';
        $values = array( 
            'id'=>$id 
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $voiture = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($voiture)){
            return new Voiture($voiture[0]);
        }
        return FALSE;
    }



    // insert
    public function insertCourseVoiture( Voiture $voiture, Course $course){
        $query = "INSERT INTO courseVoiture SET courseId = :courseId, voitureId = :voitureId";
        $values = array(
            'courseId'=>$course->getId(),
            'model'=>$voiture->getId()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }

    // delete
    public function deleteCourseVoitureForCourse( Course $course){
        $query = "DELETE FROM courseVoiture WHERE course_id = :id";
        $values = array(
            'id'=> $course->getId
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        return $objet->rowCount();
    }

    public function deleteCourseVoitureForVoiture(){
        $query = "DELETE FROM courseVoiture WHERE voiture_id = :id";
        $values = array(
            'id'=> $voiture->getId()
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        return $objet->rowCount();
    }
    
}