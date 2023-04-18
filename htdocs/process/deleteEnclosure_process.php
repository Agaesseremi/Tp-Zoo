<?php
require_once('../config/db.php');
require_once('../config/autoloadClass.php');

$manager = new AnimalsManager($db);

$animals = $manager->deleteEnclosure();

header('location: ../index.php');
?>