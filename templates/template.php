<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->e($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="vsc-initialized">
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/authors">Wszyscy Autorzy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/articles">Wszystkie artykuły</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main role="main">
    <section class="jumbotron text-center pt-3">
        <div class="container">
            <h1 class="jumbotron-heading">Blog o wszystkim</h1>
            <p class="lead text-muted">Skrócony opis tego co jest na blogu</p>
        </div>
    </section>
    <?= $this->section('content') ?>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="../js/review.js"></script>
<footer class="text-muted pt-3">
    <div class="container text-center">
        <p>Copyright @2023</p>
    </div>
</footer>
</body>
</html>