<?php

use App\Entities\ArticleEntity;
use App\Models\Article;


include 'abstractController.php';

class ArticleController extends AbstractController
{
    public function renderTemplate(): void
    {
        $article = null;
        echo $this->templates->render('article', ['article' => $article]);

    }

    public function getArticleId($url): int
    {
        $explodeUrl = explode("/", $url);
        return (int)$explodeUrl[2];
    }

    public function getArticle($id): ?ArticleEntity
    {
        $modelArticle = new Article();
        $article = null;
        if (!empty($id)) {
            $article = $modelArticle->getArticle($id);
        }
        return $article;
    }

    public function getPageTitle($id): string
    {
        $article = $this->getArticle($id);
        if ($article) {
            $articleTitle = $article->getTitle();
        } else {
            $articleTitle = 'Nie znaleziono artykułu';
        }
        return $articleTitle;
    }
}

$controller = new ArticleController();
$controller->renderTemplate();