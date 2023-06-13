<?php

namespace App\Repository;
use App\Entity\Categorie;

class CategorieRepository {
    public function findAll(): array
    {
        $list = [];
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("SELECT * FROM categorie");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Categorie($line["id"], $line["label"]);
        }

        return $list;
    }

    public function findById(int $id):?Categorie {

        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("SELECT * FROM categorie WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Categorie($line["id"], $line["label"]);
        }

        return null;
    }

    public function persist(Categorie $categorie) {
        $connection = new \PDO("mysql:host=localhost;dbname=blog_db", "root", "1234");

        $query = $connection->prepare("INSERT INTO categorie (label) VALUES (:label)");
        $query->bindValue(':label', $categorie->getLabel());
        $query->execute();

        $categorie->setId($connection->lastInsertId());
    }

}