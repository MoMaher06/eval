<?php

namespace App\Repository;

use App\Entity\commentaire;


class commentaireRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = DataBase::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM commentaire  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Commentaire ($line["comment"], $line["id_article"], $line["id"]);
        }
        return $list;
    }

    public function findById(int $id): ?Commentaire
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Commentaire ($line["comment"], $line["id_article"], $line["id"]);
        }
        return null;
    }

    public function persist(Commentaire $commentaire): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("INSERT INTO commentaire (comment) VALUES (:comment, :id_article)");
        $query->bindValue(':commentaire', $commentaire->getCommentaire());
        $query->bindValue(':id_article', $commentaire->getId_article());
        $query->execute();

        $commentaire->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("DELETE FROM commentaire WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Commentaire $commentaire): void
    {

        $connection = DataBase::getConnection();

        $query = $connection->prepare("UPDATE commentaire SET comment=:comment, id_article=:id_article WHERE id=:id");
        $query->bindValue(':commentaire', $commentaire->getCommentaire());
        $query->bindValue(':id_article', $commentaire->getId_article());
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM commentaire WHERE comment LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Commentaire($line["comment"], $line["id_article"], $line["id"]);
        }
        return $list;
}
}