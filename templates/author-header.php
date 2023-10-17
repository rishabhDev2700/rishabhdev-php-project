<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rishabhdev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/hnxdh23gq6hppf3p5g39s4f0w1r2h5gt9bjx5pea8xev4i9s/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">RishabhDev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 mx-5 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/author/create.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-danger" href="/pages/logout.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container p-4">
        <?php
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /pages/login.php");
            exit();
        }
         ?>