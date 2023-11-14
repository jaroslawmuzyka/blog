<?php

use App\Models\Article;

$model = new Article();
$this->layout('template');
?>
<div class="album pt-4 bg-light">
    <div class="container">
        <h2 class="text-center pb-2">Wszystkie artykuły</h2>
        <div class="row text-center">
            <?php foreach ($model->getArticles(11) as $article): ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top image-custom-style-list"
                             src="media/authors/<?= $article->getImagePath(); ?>"
                             alt="<?= $article->getTitle(); ?>">
                        <div class="card-body">
                            <p><?= $article->getCreatedAt(); ?></p>
                            <h3><a href="article/<?= $article->getId(); ?>"><?= $article->getTitle(); ?></a></h3>
                            <p class="card-text"><?= substr($article->getContent(), 0, 150) . ' [...]'; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="article/<?= $article->getId(); ?>"
                                       class="btn btn-sm btn-outline-secondary">Czytaj więcej</a>
                                    <a href="author/<?= $article->getAuthorId(); ?>"
                                       class="btn btn-sm btn-outline-secondary"><?= $article->getAuthorName(); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>