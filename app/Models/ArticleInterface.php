<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\ArticleEntity;

interface ArticleInterface
{
    public function getArticle(int $id);

    public function getArticles(int $limit = 10): array;

    public function getNextArticle(int $id): ?ArticleEntity;

    public function getPreviousArticle(int $id): ?ArticleEntity;

    public function getCountOfAllArticles(): int;
}