<?php
require_once('../config/autoloadClass.php');
$db = require_once("../config/db.php");


$manager = new AnimalsManager($db);

if(isset($_POST['name']) && isset($_POST['type'])) {
             
    // récupération du nom du héros et du class choisi : 
    $data = [
             'name' => $_POST['name'],
             'type' => $_POST['type']
         ];
         
         // création d'une instance de la type correspondant au type choisi
         switch ($_POST['type']) {
        case 'Forest':
          $enclosures = new BearEnclosure($data);
          $manager->addEnclosure($enclosures); 
          header('location: ../index.php');
          break;
        case 'Water':
          $enclosures = new FishEnclosure($data);
          $manager->addEnclosure($enclosures); 
          header('location: ../index.php');
          break;
        case 'Felin':
            $enclosures = new TigerEnclosure($data);
            $manager->addEnclosure($enclosures); 
            header('location: ../index.php');
            break;
       case 'Flying':
            $enclosures = new EagleEnclosure($data);
            $manager->addEnclosure($enclosures); 
            header('location: ../index.php');
            break;
            
      } }

      
?>