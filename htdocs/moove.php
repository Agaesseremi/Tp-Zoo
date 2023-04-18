<?php
require_once('./config/autoloadClass.php');
$db = require_once('./config/db.php');

        $Manager = new AnimalsManager($db);
        $enclosures = $Manager->findAllAliveEnclosure();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="moove.css">
        <title>Document</title>
</head>
<body class='bg-secondary-subtle'>
        
<div class='container d-flex bg-secondary-subtle'>
        <div class='m-auto'>
                <form action="./process/moove_process.php" method="post">      
                        <h5 class="card-title">Select your Enclosure</h5>
                        <select name="id_enclosure" id="class">
                                <?php foreach ($enclosures as $enclosure) : ?>
                                        <option value="<?= $enclosure->getId()?>"><?= $enclosure->getName() ?></option>       
                                <?php endforeach; ?>
                                        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                         </select>
                        <button class="btn btn-primary">Déplacer</button>
                </form>  
        </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>

