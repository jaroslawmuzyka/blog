<?php

use App\Models\Comments;

class CommentsController
{
    private Comments $modelComments;

    public function __construct()
    {
        $this->modelComments = new Comments();
    }

    public function handleComments(): void
    {
        if (isset($_POST['comment_content'], $_POST['comment_author'])) {
            $articleId = $_POST['article_id'];
            $author = htmlspecialchars($_POST['comment_author']);
            $content = htmlspecialchars($_POST['comment_content']);
            $this->modelComments->createComment($author, $content, $articleId);
            header("Location: article/$articleId");
        }
    }
}

$commentsController = new CommentsController;
$commentsController->handleComments();
