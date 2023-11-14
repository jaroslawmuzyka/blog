<?php
include 'abstractController.php';

class HomepageController extends AbstractController
{
    public function renderTemplate(): void
    {
        $this->templates->addData(['title' => 'Strona główna'], 'template');
        echo $this->templates->render('homepage');
    }
}

$controller = new HomepageController();
$controller->renderTemplate();