<?php

class CourseRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function getAllCourses(){

        $query = "SELECT * FROM course";
        $values = array();

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $courses = $objet->fetchAll(PDO::FETCH_ASSOC);

        
        if (!empty($courses)){
            $tableauCourses = [];
            foreach ($courses as $tableauDonneesCourses){
                $tableauCourses[] =  new Course($tableauDonneesCourses);
            }
            return $tableauCourses;
        }
        return FALSE;
    }

    public function getCoursesByVoiture( Voiture $voiture ){

        $query = "SELECT c.*, v.* FROM courseVoiture AS cv INNER JOIN course AS c	ON  c.id = cv.course_id INNER JOIN voiture as v	on cv.voiture_id = v.id where v.id = :id ;";
        $values = array(
            'id'=> $voiture->getId()
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $courses = $objet->fetchAll(PDO::FETCH_ASSOC);

        
        if (!empty($courses)){
            $tableauCourses = [];
            foreach ($courses as $tableauDonneesCourses){
                $tableauCourses[] =  new Course($tableauDonneesCourses);
            }
            return $tableauCourses;
        }
        return FALSE;
    }

    /* public function createCourse (){
        $query = "SELECT c.*, v.* FROM courseVoiture AS cv INNER JOIN course AS c	ON  c.id = cv.course_id INNER JOIN voiture as v	on cv.voiture_id = v.id where v.id = :id ;";
        $values = array(
            'id'=> $voiture->getId()
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $courses = $objet->fetchAll(PDO::FETCH_ASSOC);
    } */

    // delete course
    public function deleteCourseByVoiture ( Voiture $voiture ){
        
        
        $query = "DELETE FROM course WHERE voiture_id = :id";
        $values = array(
            'id'=> $voiture->getId()
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        return $objet->rowCount();
    }
    
    
}