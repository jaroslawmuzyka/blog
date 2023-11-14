<?php
declare(strict_types=1);

namespace App\Entities;
interface CommentEntityInterface
{
    public function getAuthor(): string;

    public function getCreatedAt(): string;

    public function getContent(): string;

    public function getId(): int;

    public function getArticleId(): int;

    public function getIpAddress(): string;
}