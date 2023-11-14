<?php

use League\Plates\Engine;

abstract class AbstractController
{
    protected Engine $templates;

    public function __construct()
    {
        $this->templates = new League\Plates\Engine(__DIR__ . '/../templates');
    }

    abstract public function renderTemplate(): void;
}