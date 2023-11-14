<?php
declare(strict_types=1);

namespace App\Models;

use App\Entities\AuthorEntity;

interface AuthorInterface
{
    public function getAuthor(int $id);

    public function getAuthors(int $limit = 11): array;

    public function getNextAuthor(int $id): ?AuthorEntity;

    public function getPreviousAuthor(int $id): ?AuthorEntity;

    public function getCountOfAllAuthors(): int;

    public function getRandomAuthors(int $limit): array;
}