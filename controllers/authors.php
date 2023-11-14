<?php
include 'abstractController.php';

class AuthorsController extends AbstractController
{
    public function renderTemplate(): void
    {
        $this->templates->addData(['title' => 'Autorzy'], 'template');
        echo $this->templates->render('authors');
    }
}

$controller = new AuthorsController();
$controller->renderTemplate();