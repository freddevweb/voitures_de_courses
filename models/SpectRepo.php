<?php

class SpectRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    // affichage
    public function getTicketByCourse( Course $course ){

        $query = "SELECT c.*, v.* FROM courseVoiture AS cv INNER JOIN course AS c	ON  c.id = cv.course_id INNER JOIN voiture as v	on cv.voiture_id = v.id WHERE v.id = :id ";
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

    // insert
    public function createTicket( Course $course ){

        $query = "INSERT INTO spectateur SET nom = :nom, date_achat = :achat, email = :email, sexe = :sexe, course_id = :course";
        $values = array(
            'nom'=>$this->getMarque(),
            'achat'=>now(),
            'email'=>$this->getEmail(),
            'sexe'=>$this->getSexe(),
            'course'=>$course->getId()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }


    // delete
     public function deleteTicket ( Voiture $voiture ){

        $query = "DELETE FROM spectateur WHERE id = :id";
        $values = array(
            'id'=> $this->getId()
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        return $objet->rowCount();
    }
    






}