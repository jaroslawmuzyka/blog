<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
require_once __DIR__ . '/Router.php';

$modelRouter = new Router();
$modelRouter->get('/articles', '/controllers/articles.php');
$modelRouter->get('/authors', '/controllers/authors.php');
$modelRouter->get('/', '/controllers/homepage.php');
$modelRouter->get('/author/$id', 'controllers/author.php');
$modelRouter->get('/article/$id', "controllers/article.php");
$modelRouter->post('/comment', 'controllers/comments.php');
$modelRouter->post('/review', 'controllers/review.php');
$modelRouter->any('/404', 'controllers/NotFoundController.php');