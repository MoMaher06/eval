<?php

use App\Repository\articleRepository;
use App\Repository\categoryRepository;
use App\Repository\commentaireRepository;

require '../vendor/autoload.php';

$instance = new articleRepository();
$categories = new categoryRepository();
$commentaires = new commentaireRepository();

$categorie = $categories->findAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <h1>List categorie</h1>
        <div class="row g-3">
        <?php foreach ($categorie as $item) { ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                         <?= $item->getNamecategory() ?>
                        </h3>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>