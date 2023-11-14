<?php
declare(strict_types=1);

namespace App\Entities;
interface ReviewEntityInterface
{
    public function getId(): int;

    public function getArticleId(): int;

    public function getLike(): int;

    public function getDislike(): int;

    public function getCreatedAt(): string;

    public function getIpAddress(): string;
}