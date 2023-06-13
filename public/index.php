<?php
use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentaireRepository;

require '../vendor/autoload.php';

/* Categorie */
$repository = new CategorieRepository();

$categories = $repository->findAll();
//var_dump($categories);

$categorie = $repository->findById(5);
//var_dump($categorie);

$toPersist = new Categorie(10, 'Voyage Amerique du Nord');

$repository->persist($toPersist);
//var_dump($toPersist);

$categories = $repository->findAll();
//var_dump($categories);


/* Commentaire */
$repoComm = new CommentaireRepository();
$toPersistComm = new Commentaire(11, 'Laurent', 'test Laurent', '2023-06-13', 1);
$repoComm->persist($toPersistComm);
//var_dump('Test commentaire');

$commentaires = $repoComm->findAll();
//var_dump($commentaires);


/* Article */ 
$repoArticle = new ArticleRepository();
$toPersistArticle = new Article(1, 'Julia', '2023-06-13', "Voyage PEK", "test Julia", "http://testJulia", 2);
$repoArticle->persist($toPersistArticle);
//var_dump('Test Article');

$categorieName = 'Voyage en Europe';
$articleByCategorie = $repoArticle->findAllByCategorie($categorieName);
//var_dump($articleByCategorie);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogVoyage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row border border-primary" >
            <div class="col col-lg-6">
                <div class="d-flex flex-row align-items-center p-2">
                <div> <img src="https://www.shutterstock.com/image-illustration/this-picture-background-about-world-600w-2168351411.jpg" class="img-fluid"  alt="logoVoyage" style="width:150px"></div>
                <div>
                    <h1>Blog </br> Voyage</h1>
                </div>
            </div>
            </div>
            <div class="col col-lg-4">
                <div class="d-flex flex-row justify-content-between align-items-center p-2">
                    <div>Accueil</div>
                    <div>Guides Voyage par continent </div>
                    <div>Articles</div>
                </div>     
            </div>
            <div class="col col-lg-2"></div>
        </div>
        <div class="row border border-primary text-center">
            <div class="col col-lg-3 border border-primary" >
                <div class="row rounded p-2">
                <div class="col"><button type="button" class="btn btn-primary">Poster un article</button></div>
                </div>
                <div class="col border border-primary p-2 m-2 rounded">
                    <h3>Toutes les catégories</h3>
                    <p><?= $categorie->getLabel() ?></p>
                    <p><?= $categorie->getLabel() ?></p>
                    <p><?= $categorie->getLabel() ?></p>
                    <p><?= $categorie->getLabel() ?></p>
                    <p><?= $categorie->getLabel() ?></p>
                </div>
                <div class="col border border-primary rounded"><h3>Tous les articles</h3>
                </div>
            </div>
            <div class="col col-lg-9 border border-primary">
            <div class="row text-center"><h2>Guide voyage</h2></div>
            <div class="row text-center"><h3>En Europe</h3></div>
            <div class="row g-3">
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">text</p>
                <a href="#" class="btn btn-primary">Accéder à ce guide voyage</a>
                </div>
            </div>
                
            </div>
            </div>
        </div>
        <div class="row border border-primary h-150px">
            <div class="row">
            <div class="col">
                <div>Liens vers les réseaux sociaux</div>
            </div>
            <div class="col">
                <div>A propos</div>
            </div>
            <div class="col">
                <div>Contact</div>
            </div>
            </div>
            <div class="row">
                <div class="col">Copyright</div>
            </div>
        </div>
    </div>
</body>
