<?php

require ("models/Connexion.php");
require ("models/DbManager.php");
require ("models/Voiture.php");
require ("models/Course.php");
require ("models/CourseVoiture.php");
require ("models/Spect.php");
require ("models/VoitureRepo.php");
require ("models/CourseRepo.php");
require ("models/SpectRepo.php");

$db = new DbManager();


































// $objet = new DbManager();

// $voiture = $objet->getVoiture(2) ;
// var_dump ($voiture);

// $objet = new DbManager();
// var_dump($objet->getVoitures());


// $newVoiture = new Voiture();
// $newVoiture->setId(7);
// $newVoiture->setMarque("lancia"); // remplie le nouvel objet
// $newVoiture->setModel("delta 4");
// $newVoiture->setPuissance(120);
// $newVoiture->setPrix(5000.00);
// $newVoiture->setCouleur("blanc");

// $newVoiture->save($objet);

// var_dump($objet->getVoitures());


// $bdd = new DbManager();
// $voiture = $bdd->getVoiture(3);
// $courses = $voiture->getMesCourses($bdd);
// var_dump ($courses);


// $bdd = new DbManager();
// $voiture = $bdd->getVoiture(1);
// $voiture->remove($bdd);