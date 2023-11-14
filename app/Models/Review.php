<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\ReviewEntity;
use PDO;

class Review extends BaseModel implements ReviewInterface
{
    public function createReview(ReviewEntity $reviewEntity): void
    {
        $query = "INSERT INTO `reviews` (`article_id`, `like`, `dislike`, `created_at`, `ip_address`) VALUES (:article_id, :like, :dislike, :created_at, :ip_address)";
        $pdo = $this->getPdo()->prepare($query);
        $articleId = $reviewEntity->getArticleId();
        $like = $reviewEntity->getLike();
        $dislike = $reviewEntity->getDislike();
        $createdAt = $reviewEntity->getCreatedAt();
        $ipAddress = $reviewEntity->getIpAddress();
        $pdo->bindParam('article_id', $articleId, PDO::PARAM_INT);
        $pdo->bindParam('like', $like, PDO::PARAM_BOOL);
        $pdo->bindParam('dislike', $dislike, PDO::PARAM_BOOL);
        $pdo->bindParam('created_at', $createdAt);
        $pdo->bindParam('ip_address', $ipAddress);
        $pdo->execute();
    }


    public function getSumLikes(int $id): int
    {
        $query = "SELECT COUNT(id) FROM reviews WHERE `like` = 1 AND article_id = :id";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchColumn();
    }

    public function getSumDislikes(int $id): int
    {
        $query = "SELECT COUNT(id) FROM reviews WHERE `dislike` = 1 AND article_id = :id";
        $pdo = $this->getPdo()->prepare($query);
        $pdo->bindParam('id', $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchColumn();
    }
}