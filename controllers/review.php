<?php

use App\Models\Review;
use App\Entities\ReviewEntity;

class ReviewController
{
    private Review $modelReview;

    public function __construct()
    {
        $this->modelReview = new Review;
    }

    public function handleReview(): void
    {
        $response['success'] = 0;

        if (isset($_POST['article_id'])) {
            $articleId = $_POST['article_id'];
            if (isset($_POST['like'])) {
                $reviewEntity = new ReviewEntity(0, $articleId, 1, 0, date('Y-m-d H:i:s'), $_SERVER['REMOTE_ADDR']);
                $this->modelReview->createReview($reviewEntity);
                $response['success'] = 1;
                $response['likes'] = $this->modelReview->getSumLikes($articleId);
            } elseif (isset($_POST['dislike'])) {
                $reviewEntity = new ReviewEntity(0, $articleId, 0, 1, date('Y-m-d H:i:s'), $_SERVER['REMOTE_ADDR']);
                $this->modelReview->createReview($reviewEntity);
                $response['success'] = 2;
                $response['dislikes'] = $this->modelReview->getSumDislikes($articleId);
            }
        }
        echo json_encode($response);
    }
}

$reviewController = new ReviewController;
$reviewController->handleReview();