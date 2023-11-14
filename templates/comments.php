<?php

use App\Models\Comments;

$modelComments = new Comments();
$modelArticleController = new ArticleController();
$id = $modelArticleController->getArticleId($_SERVER['REQUEST_URI']);
$article = $modelArticleController->getArticle($id);
?>
<section class="mt-4">
    <h3>Komentarze</h3>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-footer py-3 border-0">
                        <div class="d-flex flex-start w-100">
                            <form class="form-outline w-100" method="post"
                                  action="/comment">
                                <input type="hidden" name="article_id"
                                       value="<?= $article->getId() ?>"/>
                                <label for="textArea">Treść komentarza</label>
                                <textarea class="form-control mt-2" id="textArea" rows="4"
                                          placeholder="Treść komentarza" name="comment_content"
                                          required></textarea>
                                <label for="comment_author" class="mt-2">Autor</label>
                                <input type="text"
                                       name="comment_author" id="comment_author" required>
                                <button type="submit"
                                        class="btn btn-primary btn-sm float-end mt-2">Wyślij
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php foreach ($modelComments->getComments($id) as $comment): ?>
                        <hr class="mt-0">
                        <h6 class="fw-bold text-primary "><?= $comment->getAuthor(); ?></h6>
                        <p class="text-muted small mb-0"><?= $comment->getCreatedAt(); ?></p>
                        <p class=""><?= $comment->getContent(); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>