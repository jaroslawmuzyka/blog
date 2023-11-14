<?php

use App\Entities\AuthorEntity;
use App\Models\Article;
use App\Models\Author;

include 'abstractController.php';

class AuthorController extends AbstractController
{
    public function renderTemplate(): void
    {
        echo $this->templates->render('author');
    }

    public function getAuthorId($url): int
    {
        $explodeUrl = explode("/", $url);
        return (int)$explodeUrl[2];
    }

    public function getAuthor($id): ?AuthorEntity
    {
        $modelAuthor = new Author();
        $author = null;
        if (!empty($id)) {
            $author = $modelAuthor->getAuthor($id);
        }
        return $author;
    }

    public function getPageTitle($id): string
    {
        $author = $this->getAuthor($id);
        if ($author) {
            $authorTitle = $author->getName();
        } else {
            $authorTitle = 'Nie znaleziono autora';
        }
        return $authorTitle;
    }
    public function getAuthorArticles($id): array
    {
        $modelAuthorController=new AuthorController();
        $modelArticle= new Article;
        $author = $modelAuthorController->getAuthor($id);
        if ($author) {
            return $modelArticle->getArticlesByAuthorId($author->getId());
        }
        else {
            return [];
    }
    }
}

$controller = new AuthorController();
$controller->renderTemplate();