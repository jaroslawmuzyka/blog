<?php
declare(strict_types=1);

namespace App\Entities;

class ReviewEntity implements ReviewEntityInterface
{
    public function __construct(
        private int    $id,
        private int    $articleId,
        private int    $like,
        private int    $dislike,
        private string $createdAt,
        private string $ipAddress
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getLike(): int
    {
        return $this->like;
    }

    public function getDislike(): int
    {
        return $this->dislike;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }
}