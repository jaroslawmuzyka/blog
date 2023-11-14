<?php
include 'abstractController.php';

class NotFoundController extends AbstractController
{
    public function renderTemplate(): void
    {
        $this->templates->addData(['title' => '404 Not Found'], 'template');
        echo $this->templates->render('404');
    }
}

$controller = new NotFoundController();
$controller->renderTemplate();