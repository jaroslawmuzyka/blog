<?php
declare(strict_types=1);

namespace App\Entities;
interface AuthorEntityInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getImagePath(): string;
}