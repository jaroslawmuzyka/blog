<?php

use App\Models\Author;

$model = new Author();
$this->layout('template');
?>
<div class="album pt-4 bg-light">
    <div class="container">
        <h2 class="text-center pb-2">Wszyscy autorzy</h2>
        <div class="row text-center">
            <?php foreach ($model->getAuthors() as $author): ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top image-custom-style-list"
                             src="media/authors/<?= $author->getImagePath(); ?>"
                             alt="<?= $author->getName(); ?>">
                        <div class="card-body">
                            <h3><a href="author/<?= $author->getId(); ?>"><?= $author->getName(); ?></a></h3>
                            <p class="card-text"><?= $author->getDescription(); ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="author/<?= $author->getId(); ?>"
                                       class="btn btn-sm btn-outline-secondary">Zobacz autora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>