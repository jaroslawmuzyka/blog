<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\AuthorEntity;
use PDO;

class Author extends BaseModel implements AuthorInterface
{
    public function getAuthor(int $id): ?AuthorEntity
    {
        $query = "SELECT authors.id AS author_id, authors.name, authors.description, authors.author_image_path FROM authors LEFT JOIN articles ON authors.id = articles.author_id WHERE authors.id = :id ORDER BY authors.id";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $author = $pdo->fetch();
        if ($author) {
            return new AuthorEntity(
                $author['author_id'],
                $author['name'],
                $author['description'],
                $author['author_image_path'],
            );
        }
        return null;
    }

    public function getAuthors(int $limit = 10): array
    {
        $query = "SELECT * FROM authors ORDER BY authors.id LIMIT :limit";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindValue('limit', $limit, PDO::PARAM_INT);
        $pdo->execute();
        $authorsData = $pdo->fetchAll();
        $authors = [];
        foreach ($authorsData as $authorData) {
            $authors[] = new AuthorEntity(
                $authorData['id'],
                $authorData['name'],
                $authorData['description'],
                $authorData['author_image_path'],
            );
        }
        return $authors;
    }

    public function getNextAuthor(int $id): ?AuthorEntity
    {
        $query = "SELECT * FROM authors WHERE id > :id ORDER BY id ASC LIMIT 1";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $authorData = $pdo->fetch();

        if ($authorData) {
            return new AuthorEntity(
                $authorData['id'],
                $authorData['name'],
                $authorData['description'],
                $authorData['author_image_path'],
            );
        }
        return null;
    }

    public function getPreviousAuthor(int $id): ?AuthorEntity
    {
        $query = "SELECT * FROM authors WHERE id < :id ORDER BY id DESC LIMIT 1";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $authorData = $pdo->fetch();

        if ($authorData) {
            return new AuthorEntity(
                $authorData['id'],
                $authorData['name'],
                $authorData['description'],
                $authorData['author_image_path'],
            );
        }
        return null;
    }

    public function getCountOfAllAuthors(): int
    {
        $query = "SELECT COUNT(id) FROM authors";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->execute();
        return $pdo->fetchColumn();
    }

    public function getRandomAuthors(int $limit): array
    {
        $query = "SELECT * FROM authors ORDER BY RAND() LIMIT :limit";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindValue('limit', $limit, PDO::PARAM_INT);
        $pdo->execute();

        $authorsData = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $authors = [];

        foreach ($authorsData as $authorData) {
            $authors[] = new AuthorEntity(
                $authorData['id'],
                $authorData['name'],
                $authorData['description'],
                $authorData['author_image_path'],
            );
        }
        return $authors;
    }
}