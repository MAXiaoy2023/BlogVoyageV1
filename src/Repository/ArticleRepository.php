<?php

namespace App\Repository;
use App\Entity\Article;

class ArticleRepository {

    public function persist(Article $article) {
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("INSERT INTO article (auteur, datePublication, title, content, image, id_categorie) 
                                VALUES (:auteur, :datePublication, :title, :content, :image, :id_categorie)");
        $query->bindValue(':auteur', $article->getAuteur());
        $query->bindValue(':datePublication', $article->getDatePublication());
        $query->bindValue(':title', $article->getTitle());
        $query->bindValue(':content', $article->getContent());
        $query->bindValue(':image', $article->getImage());
        $query->bindValue(':id_categorie', $article->getId_categorie());

        $query->execute();

        $article->setId($connection->lastInsertId());
    }

    public function findById(int $id):?Article {

        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("SELECT * FROM article WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Article(
                    $line["id"], $line["auteur"], $line["datePublication"], $line["title"], 
                    $line["content"], $line["image"], $line["id_categorie"]);
        }

        return null;
    }
    public function findAllByCategorie(string $label): array
    {
        $list = [];
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("
                    SELECT distinct * 
                    FROM article 
                    LEFT JOIN categorie ON article.id_categorie = categorie.id
                    WHERE categorie.label=:label 
        ");
        $query->bindValue(":label", $label);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Article(
                    $line["id"], $line["auteur"], $line["datePublication"], 
                    $line["title"], $line["content"], $line["image"], $line["id_categorie"]
            );
        }

        return $list;
    }

}