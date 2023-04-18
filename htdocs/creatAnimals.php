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

    $animals = $manager->findAnimalsWithoutEnclosure();


    ?>


    <div class="container my-5">
        <div class="row">
            <div class="card col-12 col-sm-6 col-lg-2" style=text-align:center;">
                <div class="card-body">


                    <form action='./process/creatAnimals_process.php' method="post">
                        <h5 class="card-title">Create your Animals</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Create an animal</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        <select name="class" id="class">
                            <option value="Bear">Bear</option>
                            <option value="Tiger">Tiger</option>
                            <option value="Fish">Fish</option>
                            <option value="Eagle">Eagle</option>
                        </select>
                        <button class="btn btn-primary">Create</button>
                    </form>

                </div>
            </div>
            <?php foreach ($animals as $animal) : ?>
                <div class="card col-12 col-sm-6 col-lg-2 m-4" style=text-align:center;">
                    <div class="card-body">
                        <h5 class="card-title">Animals existant</h5>
                        <div class="mb-3">
                            <p> <?= $animal->getName() ?></p>
                            <p><?= $animal->getClass() ?></p>
                            <p>❤️ <?= $animal->getAge() ?> Years</p>
                            <form class="my-2" action="moove.php" method="post">
                                <input type="hidden" name="id" value="<?= $animal->getId() ?>">
                                <button class="btn btn-primary ">Choose</button>
                            </form>
                            <form class="my-2" action="./process/deleteAnimal_process.php" method="post">
                                <input type="hidden" name="id" value="<?= $animal->getid() ?>">
                                <button class="btn btn-danger ">Kill it</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</body>

</html>