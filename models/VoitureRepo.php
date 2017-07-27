<?php

class VoitureRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    
    // affichage
    public function getVoiture($id){

        $query = 'SELECT * FROM voiture WHERE id = :id';
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

    public function getVoitures(){

        $objet = $this->connexion->prepare('SELECT * FROM voiture');
        $objet->execute();
        $voitures = $objet->fetchAll(PDO::FETCH_ASSOC);
        
        $arrayVoitures = [];

        foreach ( $voitures as $tableauDonneesVoiture){
            $arrayVoitures[]= new Voiture($tableauDonneesVoiture);
        }
        return $arrayVoitures;
    }

    // insertion
    public function saveVoiture ( Voiture $voiture ){
        if ( empty( $voiture->getId() ) == TRUE ){
            $this->insertVoiture($voiture);
        }
        else {
            $this->updateVoiture($voiture);
        }
    }

    public function insertVoiture( Voiture $voiture ){

        $query = "INSERT INTO voiture SET marque = :marque, model = :model, puissance = :puissance, prix = :prix, couleur = :couleur";
        $values = array(
            'marque'=>$voiture->getMarque(),
            'model'=>$voiture->getModel(),
            'puissance'=>$voiture->getPuissance(),
            'prix'=>$voiture->getPrix(),
            'couleur'=>$voiture->getCouleur()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }

    public function updateVoiture( Voiture $voiture ){

        $query = "UPDATE voiture SET marque = :marque, model = :model, puissance = :puissance, prix = :prix, couleur = :couleur WHERE id = :id";
        $values = array(
            'marque'=>$voiture->getMarque(),
            'model'=>$voiture->getModel(),
            'puissance'=>$voiture->getPuissance(),
            'prix'=>$voiture->getPrix(),
            'couleur'=>$voiture->getCouleur(),
            'id'=>$voiture->getId()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }

    // delete voiture
    public function deleteVoiture ( Voiture $voiture ){

        $query = "DELETE FROM voiture WHERE id = :id";
        $values = array(
            'id'=> $voiture->getId()
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        return $objet->rowCount();
    }


    
}