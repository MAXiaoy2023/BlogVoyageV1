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

//$toPersist = new Categorie(10, 'Voyage Amerique du Nord');

//$repository->persist($toPersist);
//var_dump($toPersist);

$categories = $repository->findAll();
//var_dump($categories);


/* Commentaire */
$repoComm = new CommentaireRepository();
//$toPersistComm = new Commentaire(11, 'Laurent', 'test Laurent', '2023-06-13', 1);
//$repoComm->persist($toPersistComm);
//var_dump('Test commentaire');

$commentaires = $repoComm->findAll();
//var_dump($commentaires);


/* Article */ 
$repoArticleAsie = new ArticleRepository();
//$toPersistArticle = new Article(1, 'Julia', '2023-06-13', "Voyage PEK", "test Julia", "http://testJulia", 2);
//$repoArticle->persist($toPersistArticle);
//var_dump('Test Article');

$categorieNameAsie = 'Voyage en Asie';
$articleByCategorieAsie = $repoArticleAsie->findAllByCategorie($categorieNameAsie);
//var_dump ($articleByCategorie[0]->getImage());
//var_dump ($articleByCategorie[1]->getImage());
//var_dump ($articleByCategorie[2]->getImage());

$repoArticleEurope = new ArticleRepository();
$categorieNameEurope = 'Voyage en Europe';
$articleByCategorieEurope = $repoArticleEurope->findAllByCategorie($categorieNameEurope);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogVoyage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"
        rel="icon" href="data:;base64,iVBORw0KGgo=">

</head>
<body>
    <div class="container-fluid">    
        <header>
            <div class="row border border-primary mt-2">
                <div class="col col-lg-6">
                    <div class="d-flex flex-row align-items-center p-2">
                        <div> 
                            <img src="https://www.shutterstock.com/image-illustration/this-picture-background-about-world-600w-2168351411.jpg" class="img-fluid"  alt="logoVoyage" style="width:150px"></div>
                        <div class="text-center text-success border border-primary rounded shadow-lg p-4 mb-2">
                            <h1>BlogVoyage</h1>
                        </div>
                    </div>
                </div>
            <div class="col col-lg-4">
                <div class="d-flex flex-row align-items-center justify-content-between p-2">
                    <div>Accueil</div>
                    <div>Guides Voyage par continent </div>
                    <div>Articles</div>
                </div>     
            </div>
            <div class="col col-lg-2"></div>
            </div> 
        </header>  
        <div class="row text-center mt-2">
            <div class="col col-lg-3" >
                    <div class="row rounded p-2">
                        <div class="col">
                            <button type="button" class="btn btn-primary">Poster un article</button>
                        </div>
                    </div>
                <div class="col border border-primary p-2 m-2 rounded">
                    <h3>Toutes les catégories</h3>
                    <?php foreach ($categories as $item) { ?>
                        <p><?= $item->getLabel() ?></p>
                    <?php }
                    ?>
                </div>
                <div class="col border border-primary rounded p-2 m-2">
                    <h3>Tous les articles</h3>
                    <?php foreach ($articleByCategorieAsie as $item) { ?>
                        <p><?= $item->getTitre() ?></p>
                    <?php }
                    ?>

                    <?php foreach ($articleByCategorieEurope as $item) { ?>
                        <p><?= $item->getTitre() ?></p>
                    <?php }
                    ?>
                </div>
        </div>
        <div class="col col-lg-9 border border-primary rounded p-2">
                <div class="row text-center">
                    <form name="form1" action="pageArticle.php" method="post">
                        <div class="form-group">
                            <input type="int" class="form-control" name="id" placeholder="Ajouter l'ID">
                        </div>    
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="auteur" placeholder="Ajouter le nom de l'auteur">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="datePublication" placeholder="Ajouter une date">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="titre" placeholder="Ajouter un titre">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="content" placeholder="Rédiger votre content">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="image" placeholder="Ajouter une image">
                        </div>

                        <div class="form-group">
                            <input type="int" class="form-control" name="id_categorie" placeholder="Ajouter un continent">
                        </div>

                        <button type="submit" name="persist" class="btn btn-primary">Submit</button>
                    </form>
                </div>            
        </div>
        <div class="row border border-primary mt-2">
            <footer>
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
            </footer>
        </div>
    </div>
</body>
