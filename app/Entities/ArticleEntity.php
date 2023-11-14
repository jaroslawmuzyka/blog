<?php
declare(strict_types=1);

namespace App\Entities;
class ArticleEntity implements ArticleEntityInterface
{
    public function __construct(
        private int    $id,
        private string $createdAt,
        private string $title,
        private string $content,
        private int    $authorId,
        private string $articleImagePath,
        private string $authorName
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getImagePath(): string
    {
        return $this->articleImagePath;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }
}