<?php
declare(strict_types=1);

namespace App\Models;


use App\Entities\ReviewEntity;

interface ReviewInterface
{
    public function createReview(ReviewEntity $reviewEntity): void;

    public function getSumLikes(int $id): int;

    public function getSumDislikes(int $id): int;
}