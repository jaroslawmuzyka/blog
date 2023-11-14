<?php
declare(strict_types=1);

namespace App\Entities;

class AuthorEntity implements AuthorEntityInterface
{
    public function __construct(
        private ?int   $id,
        private string $name,
        private string $description,
        private string $authorImagePath
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImagePath(): string
    {
        return $this->authorImagePath;
    }
}