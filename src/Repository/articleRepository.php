<?php

namespace App\Repository;

use App\Entity\Article;


class articleRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = DataBase::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM article  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Article($line["titre"], $line["contenu"],$line["auteur"],$line["id_categorie"],$line["image"],$line["id"]);
        }
        return $list;
    }

    public function findById(int $id): ?Article
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("SELECT * FROM article WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Article($line["titre"],$line["contenu"] ,$line["auteur"],$line["id_categorie"],$line["image"],$line["id"]);
        }
        return null;
    }

    public function persist(Article $article): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("INSERT INTO article (titre,contenu,auteur,image,id_categorie) VALUES (:titre,:contenu,:auteur,:image,:id_categorie)");
        $query->bindValue(':titre', $article->getTitre());
        $query->bindValue(':contenu', $article->getContenu());
        $query->bindValue(':auteur', $article->getAuteur());
        $query->bindValue(':image', $article->getImage());
        $query->bindValue(':id_categorie', $article->getId_categorie());

        $query->execute();

        $article->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = DataBase::getConnection();

        $query = $connection->prepare("DELETE FROM article WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Article $article): void
    {

        $connection = DataBase::getConnection();

        $query = $connection->prepare("UPDATE article SET titre=:titre, contenu=:contenu,auteur=:auteur, image=:image, id_category=:id_category WHERE id=:id ");
        $query->bindValue(':titre', $article->getTitre());
        $query->bindValue(':contenu', $article->getContenu());
        $query->bindValue(':auteur', $article->getAuteur());
        $query->bindValue(':image', $article->getImage());
        $query->bindValue(':id_categorie', $article->getId_categorie());
   
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = DataBase::getConnection();

        $query = $connection->prepare("SELECT * FROM article WHERE titre LIKE :term OR auteur LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Article($line["titre"],$line["contenu"], $line["auteur"],$line["id_categorie"],$line["image"],$line["id"]);
        }
        return $list;
}
}