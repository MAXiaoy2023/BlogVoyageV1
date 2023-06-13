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
