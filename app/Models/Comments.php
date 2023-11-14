<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\CommentEntity;
use PDO;

class Comments extends BaseModel implements CommentsInterface
{
    public function getComments(int $id): array
    {
        $query = "SELECT comments.id, comments.author, comments.content, comments.created_at, article_id, ip_address FROM comments WHERE comments.article_id = :id";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindValue('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        $commentsData = $pdo->fetchAll();
        $comments = [];

        foreach ($commentsData as $commentData) {
            $comment = new CommentEntity(
                $commentData['author'],
                $commentData['created_at'],
                $commentData['content'],
                $commentData['id'],
                $commentData['article_id'],
                $commentData['ip_address'],
            );
            $comments[] = $comment;
        }
        return $comments;
    }

    public function createComment(string $author, string $content, int $articleId): void
    {
        $createdAt = date('Y-m-d H:i:s');
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        $query = "INSERT INTO `comments` (`author`, `content`, `created_at`, `article_id`, `ip_address`) VALUES (:author, :content, :created_at, :article_id, :ip_address)";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('author', $author);
        $pdo->bindParam('content', $content);
        $pdo->bindParam('created_at', $createdAt);
        $pdo->bindParam('article_id', $articleId, PDO::PARAM_INT);
        $pdo->bindParam('ip_address', $ipAddress);
        $pdo->execute();
    }
}