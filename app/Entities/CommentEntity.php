<?php
declare(strict_types=1);

namespace App\Entities;

class CommentEntity implements CommentEntityInterface
{
    public function __construct(
        private string $author,
        private string $createdAt,
        private string $content,
        private int    $commentId,
        private int    $articleId,
        private string $ipAddress)
    {
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getId(): int
    {
        return $this->commentId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }
}