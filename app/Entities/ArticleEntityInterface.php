<?php
declare(strict_types=1);

namespace App\Entities;
interface ArticleEntityInterface
{
    public function getId(): int;

    public function getCreatedAt(): string;

    public function getTitle(): string;

    public function getContent(): string;

    public function getAuthorId(): int;

    public function getImagePath(): string;

    public function getAuthorName(): string;
}