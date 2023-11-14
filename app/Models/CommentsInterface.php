<?php
declare(strict_types=1);

namespace App\Models;
interface CommentsInterface
{
    public function getComments(int $id): array;

    public function createComment(string $author, string $content, int $articleId): void;
}