<?php
include 'abstractController.php';

class ArticlesController extends AbstractController
{
    public function renderTemplate(): void
    {
        $this->templates->addData(['title' => 'Artykuły'], 'template');
        echo $this->templates->render('articles');
    }
}

$controller = new ArticlesController();
$controller->renderTemplate();