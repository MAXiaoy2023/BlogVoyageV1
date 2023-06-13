<?php

namespace App\Repository;
use App\Entity\Commentaire;

class CommentaireRepository {
    public function findAll(): array
    {
        $list = [];
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("SELECT * FROM commentaire");
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Commentaire(
                    $line["id"], $line["userName"], $line["commentaire"], 
                    $line["dateInsertion"], $line["id_article"]
            );
        }

        return $list;
    }

    public function persist(Commentaire $commentaire) {
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("INSERT INTO commentaire (userName, commentaire, dateInsertion, id_article) 
                                VALUES (:userName, :commentaire, :dateInsertion, :id_article)");
        $query->bindValue(':userName', $commentaire->getUserName());
        $query->bindValue(':commentaire', $commentaire->getCommentaire());
        $query->bindValue(':dateInsertion', $commentaire->getDateInsertion());
        $query->bindValue(':id_article', $commentaire->getId_article());

        $query->execute();

        $commentaire->setId($connection->lastInsertId());
    }

}