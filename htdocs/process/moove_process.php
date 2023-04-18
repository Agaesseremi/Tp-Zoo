<?php
require_once('../config/autoloadClass.php');
$db = require_once('../config/db.php');

$Manager = new AnimalsManager($db);

$data = [
    'id_enclosure' => $_POST['id_enclosure'],
    'id_animal' => $_POST['id']
 ];

 $Manager->addAnimalToEnclosure($data);

 header("location: ../index.php");
 