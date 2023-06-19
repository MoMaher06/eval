<?php

namespace App\Repository;

use App\Entity\categorie;


class categoryRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = DataBase::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM category  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new categorie($line["id"], $line["namecategorie"]);
        }
        return $list;
    }

    public function findById(int $id): ?categorie
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("SELECT * FROM categorie WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new categorie($line["id"], $line["namecategorie"]);
        }
        return null;
    }

    public function persist(categorie $categorie): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("INSERT INTO categories (namecategory) VALUES (:namecategory)");
        $query->bindValue(':namecategory', $categorie->getNamecategorie());
        $query->execute();

        $categorie->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("DELETE FROM categorie WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(categorie $categorie): void
    {

        $connection = DataBase::getConnection();

        $query = $connection->prepare("UPDATE categorie SET namecategorie=:namecategorie WHERE id=:id");
        $query->bindValue(':namecategorie', $categorie->getNamecategorie());
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = DataBase::getConnection();

        $query = $connection->prepare("SELECT * FROM category WHERE namecategory LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new categorie($line["id"], $line["namecategorie"]);
        }
        return $list;
}
}