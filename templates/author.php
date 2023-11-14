<?php

use App\Models\Article;
use App\Models\Author;

$modelArticle = new Article();
$modelAuthor = new Author();
$modelAuthorController = new AuthorController();
$id = $modelAuthorController->getAuthorId($_SERVER['REQUEST_URI']);
$author = $modelAuthorController->getAuthor($id);
$pageTitle = $modelAuthorController->getPageTitle($id);
$this->layout('template', ['title' => $pageTitle]);
$nextAuthor = $modelAuthor->getNextAuthor($id);
$previousAuthor = $modelAuthor->getPreviousAuthor($id);
$authorArticles = $modelAuthorController->getAuthorArticles($id);
?>
<div class="album pt-4 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="card mb-4 box-shadow py-3">
                <?php if ($author): ?>
                    <img class="card-img-top image-custom-style-single"
                         src="../media/authors/<?= $author->getImagePath(); ?>"
                         alt="<?= $author->getName(); ?>">
                    <div class="card-body">
                        <h3><a href="<?= $author->getId(); ?>"><?= $author->getName(); ?></a></h3>
                        <p class="card-text"><?= $author->getDescription(); ?></p>
                    </div>
                    <h3>Artykuły tego autora:</h3>
                    <?php if (!empty($authorArticles)): ?>
                        <ul>
                            <?php foreach ($authorArticles as $authorArticle): ?>
                                <li><a href="../article/<?= $authorArticle->getId(); ?>">
                                        <?= $authorArticle->getTitle(); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Brak artykułów</p>
                    <?php endif; ?>
                    <?php if (!empty($previousAuthor)): ?>
                        <a href="<?= $previousAuthor->getId() ?>">
                            <button type="button" class="btn btn-primary btn-sm mt-2">Poprzedni autor</button>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($nextAuthor)): ?>
                        <a href="<?= $nextAuthor->getId() ?>">
                            <button type="button" class="btn btn-primary btn-sm mt-2">Następny autor</button>
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Nie znaleziono autora.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>