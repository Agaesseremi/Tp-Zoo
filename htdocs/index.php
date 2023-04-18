<?php
require_once('./config/autoloadClass.php');
include('./config/navbar.php');
$db = require_once("./config/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Zoo</title>
</head>

<body class="bg-secondary-subtle">
    <?php
    $manager = new AnimalsManager($db);




    $enclosures = $manager->findAllAliveEnclosure();



    ?>
    <div class="container m-auto my-5">
        <div class="" style=text-align:center;">
            <div class="card-body">


                <form action='./process/creatEnclosures_process.php' method="post">
                    <h5 class="card-title">Create your Enclosure</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Create an enclosure</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>
                    <select name="type" id="class">
                        <option value="Forest">Forest</option>
                        <option value="Felin">Felin</option>
                        <option value="Water">Water</option>
                        <option value="Flying">Flying</option>
                    </select>
                    <button class="btn btn-primary">Create</button>
                </form>

            </div>
        </div>
    </div>
    <div class="container m-auto my-5">
        <div class="row justify-content-center">
            <?php foreach ($enclosures as $enclosure) : ?>
                <div class="card col-12 col-sm-6 col-lg-2 m-4" style=text-align:center;">
                    <div class="card-body">
                        <div class="mb-3">
                            <p><?= $enclosure->getName() ?></p>
                            <p><?= $enclosure->getType() ?></p>
                            <p><?= $enclosure->getNbAnimal() ?></p>
                        </div>
                    </div>
                    <form class="my-2" action="animalsInEnclosures.php" method="post">
                        <input type="hidden" name="id" value="<?= $enclosure->getid() ?>">
                        <button class="btn btn-primary">List Animals</button>
                    </form>
                    <form class="my-2" action="./process/deleteEnclosure_process.php" method="post">
                        <input type="hidden" name="id" value="<?= $enclosure->getid() ?>">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>