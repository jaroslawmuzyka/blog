<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\ArticleEntity;
use PDO;

class Article extends BaseModel implements ArticleInterface
{
    public function getArticle(int $id): ?ArticleEntity
    {
        $query = "SELECT articles.id article_id, articles.created_at, articles.title, articles.content, articles.author_id, articles.article_image_path, authors.name FROM articles RIGHT JOIN authors ON articles.author_id = authors.id WHERE articles.id = :id";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $article = $pdo->fetch();

        if ($article) {
            return new ArticleEntity(
                $article['article_id'],
                $article['created_at'],
                $article['title'],
                $article['content'],
                $article['author_id'],
                $article['article_image_path'],
                $article['name'],
            );
        }
        return null;
    }

    public function getArticles(int $limit = 10): array
    {
        $query = "SELECT articles.id article_id, articles.created_at, articles.title, articles.content, articles.author_id, articles.article_image_path, authors.name author_name FROM articles LEFT JOIN authors ON articles.author_id = authors.id ORDER BY articles.created_at DESC LIMIT :limit";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindValue('limit', $limit, PDO::PARAM_INT);
        $pdo->execute();
        $articlesData = $pdo->fetchAll();

        $articles = [];
        foreach ($articlesData as $articleData) {
            $articles[] = new ArticleEntity(
                $articleData['article_id'],
                $articleData['created_at'],
                $articleData['title'],
                $articleData['content'],
                $articleData['author_id'],
                $articleData['article_image_path'],
                $articleData['author_name'],
            );
        }
        return $articles;
    }

    public function getPreviousArticle(int $id): ?ArticleEntity
    {
        $query = "SELECT articles.id article_id, articles.created_at, articles.title, articles.content, articles.author_id, articles.article_image_path, authors.name author_name FROM articles LEFT JOIN authors ON articles.author_id = authors.id WHERE articles.id < :id ORDER BY articles.id DESC LIMIT 1";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $articleData = $pdo->fetch();

        if ($articleData) {
            return new ArticleEntity(
                $articleData['article_id'],
                $articleData['created_at'],
                $articleData['title'],
                $articleData['content'],
                $articleData['author_id'],
                $articleData['article_image_path'],
                $articleData['author_name'],
            );
        }
        return null;
    }

    public function getNextArticle(int $id): ?ArticleEntity
    {
        $query = "SELECT articles.id article_id, articles.created_at, articles.title, articles.content, articles.author_id, articles.article_image_path, authors.name author_name FROM articles LEFT JOIN authors ON articles.author_id = authors.id WHERE articles.id > :id ORDER BY articles.id ASC LIMIT 1";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $articleData = $pdo->fetch();

        if ($articleData) {
            return new ArticleEntity(
                $articleData['article_id'],
                $articleData['created_at'],
                $articleData['title'],
                $articleData['content'],
                $articleData['author_id'],
                $articleData['article_image_path'],
                $articleData['author_name'],
            );
        }
        return null;
    }

    public function getCountOfAllArticles(): int
    {
        $query = "SELECT COUNT(id) FROM articles";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->execute();
        return $pdo->fetchColumn();
    }

    public function getArticlesByAuthorId(int $authorId): array
    {
        $query = "SELECT articles.id article_id, articles.created_at, articles.title, articles.content, articles.author_id, articles.article_image_path, authors.name author_name FROM articles RIGHT JOIN authors ON articles.author_id = authors.id WHERE articles.author_id = :authorId";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('authorId', $authorId, PDO::PARAM_INT);
        $pdo->execute();
        $articlesData = $pdo->fetchAll();

        $articles = [];
        foreach ($articlesData as $articleData) {
            $articles[] = new ArticleEntity(
                $articleData['article_id'],
                $articleData['created_at'],
                $articleData['title'],
                $articleData['content'],
                $articleData['author_id'],
                $articleData['article_image_path'],
                $articleData['author_name'],
            );
        }
        return $articles;
    }
}