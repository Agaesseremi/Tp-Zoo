<?php
require_once('./config/db.php');
require_once('./config/autoloadClass.php');
include('./config/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>
<body class="bg-secondary-subtle">
    <?php

        $manager = new AnimalsManager($db);

        $animals = $manager->findAnimalsInEnclosure();


    ?>

    
        <?php foreach ($animals as $animal) : ?>
            <div class="card col-12 col-sm-6 col-lg-2" style=text-align:center;">
                <div class="card-body">
                        <h5 class="card-title">Animals existant</h5>
                        <div class="mb-3">
                                <p> <?= $animal->getName() ?></p>
                                <p> <?= $animal->getClass() ?></p>
                                <p> <?= $animal->getAge() ?> Years</p>
                            <form action="moove.php" method="post">
                                <input type="hidden" name="id" value="<?= $animal->getId() ?>">
                                <button class="btn btn-primary btn-lg px-4 gap-3">Choose</button>
                            </form>
                            <form action="./process/deleteAnimal_process.php" method="post">
                                <input type="hidden" name="id" value="<?= $animal->getid()?>">
                                <button class="btn btn-danger btn-lg px-4 gap-3">Kill it</button>
                            </form>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
</body>
</html>