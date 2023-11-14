<?php

use App\Models\Article;
use App\Models\Review;
use App\Models\Comments;

$modelArticle = new Article();
$modelReview = new Review();
$modelComments = new Comments();
$modelArticleController = new ArticleController();

$id = $modelArticleController->getArticleId($_SERVER['REQUEST_URI']);
$article = $modelArticleController->getArticle($id);
$pageTitle = $modelArticleController->getPageTitle($id);
$this->layout('template', ['title' => $pageTitle]);
$nextArticle = $modelArticle->getNextArticle($id);
$previousArticle = $modelArticle->getPreviousArticle($id);
?>
<div class="album pt-4 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="card mb-4 box-shadow py-3">
                <?php if ($article): ?>
                    <img class="image-custom-style-single card-img-top"
                         src="../media/authors/<?= $article->getImagePath(); ?>"
                         alt="<?= $article->getTitle(); ?>">
                    <div class="card-body">
                        <h3><a href="<?= $article->getId(); ?>"><?= $article->getTitle(); ?></a></h3>
                        <p><?= $article->getCreatedAt(); ?></p>
                        <a href="../author/<?= $article->getAuthorId(); ?>">
                            <?= $article->getAuthorName(); ?></a>
                        <p class="card-text"><?= $article->getContent(); ?></p>
                    </div>
                    <form id="review" method="post" action="/review">
                        <input type="hidden" name="like"/>
                        <input type="hidden" name="article_id" value="<?= $article->getId() ?>"/>
                        <button type="submit" class="btn btn-success mb-2" id="qty_like">
                            Like <?= $modelReview->getSumLikes($id); ?></button>
                    </form>
                    <form id="review2" method="post" action="/review">
                        <input type="hidden" name="dislike"/>
                        <input type="hidden" name="article_id" value="<?= $article->getId() ?>"/>
                        <button type="submit" class="btn btn-danger mb-2" id="qty_dislike">
                            Dislike <?= $modelReview->getSumDislikes($id); ?></button>
                    </form>
                    <?php
                    if (!empty($previousArticle)): ?>
                        <a href="<?= $previousArticle->getId() ?>">
                            <button type="button" class="btn btn-primary btn-sm mb-2">Poprzedni artykuł</button>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($nextArticle)): ?>
                        <a href="<?= $nextArticle->getId() ?>">
                            <button type="button" class="btn btn-primary btn-sm">Następny artykuł</button>
                        </a>
                    <?php endif; ?>
                    <?=$this->insert('comments')?>
                <?php else: ?>
                    <p>Artykułu nie znaleziono.</p>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>