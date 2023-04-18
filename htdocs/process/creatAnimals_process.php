<?php
require_once('../config/autoloadClass.php');
$db = require_once("../config/db.php");


$manager = new AnimalsManager($db);

if(isset($_POST['name']) && isset($_POST['class'])) {
                
    // récupération du nom du héros et du class choisi : 
    $data = [
            'name' => $_POST['name'],
            'class' => $_POST['class']
        ];
        
        // création d'une instance de la classe correspondant au class choisi
        switch ($_POST['class']) {
        case 'Bear':
            $animals = new Bear($data);
            $manager->add($animals); 
            header('location: ../creatAnimals.php');
            break;
        case 'Fish':
            $animals = new Fish($data);
            $manager->add($animals); 
            header('location: ../creatAnimals.php');
            break;
        case 'Tiger':
            $animals = new Tiger($data);
            $manager->add($animals); 
            header('location: ../creatAnimals.php');
            break;
        case 'Eagle':
            $animals = new Eagle($data);
            $manager->add($animals);
            header('location: ../creatAnimals.php'); 
            break;
            

    } }

?>