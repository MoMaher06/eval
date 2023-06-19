<?php

use App\Repository\articleRepository;
use App\Repository\categorieRepository;
use App\Repository\commentaireRepository;

require '../vendor/autoload.php';

$instance = new articleRepository();

$commentaires = new CommentaireRepository();

$Article = $instance->findAll();

?>
<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste d'article</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</head>

<body>
<header class="headercontent">
    <div class="row">
    <img src="data:image/png;base64,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" alt="" id="logo" class="col-lg-1 img-fluid " alt="Logo"
        style="width: 90px; height: 80px;">
      <H1 class=" col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5 text-center p-4" style="font-family: 'Dancing Script', cursive; color: #94DF60 ">The New Generation of the 308 </H1>


      <div class="nav-scroller col-lg-5 py-1 mb-2  col-xs-5 col-sm-5 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
        <nav class="nav d-flex justify-content-between justify-content-center ">

          <a class="p-4 fw-bold text-decoration-none text-center " href="index.php" style="color: #1A7F93;">Accueil</a></li>
          <a class="p-4 fw-bold text-decoration-none text-center" href="article.php" style="color: #1A7F93;">article</a>
          <a class="p-4 fw-bold text-decoration-none text-center" href="categorie.php" style="color: #1A7F93;">categorie</a>


        </nav>
      </div>
    </div>
  </header>



    <div class="container-fluid">
        <h1 class="text-center text-primary">Listes d'articles</h1>
        <div class="row g-3">
            <?php foreach ($Article as $item) { ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 text-center">
                    <div class="card text-center">
                    <img src="<?= $item->getImage() ?>" alt="">

                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $item->getTitre() ?>
                            </h3>
                            <p class="card-text">
                                <?= htmlspecialchars($item->getAuteur()) ?>
                            </p>
                            <p class="card-text">

                                <?= htmlspecialchars($item->getContenu()) ?>
                            </p>
                            <p class="card-text text-end">
                                <?= $item->getId_categorie() ?>
                            </p>
                            <a href="article.php?id=<?= $item->getId() ?>" class="card-link">Details</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

<footer>
    <p> &#xa9 2023 Rouis Tous droits reservés</p>
</footer>

</html>