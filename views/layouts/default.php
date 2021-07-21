<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-97KP7R1HTV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-97KP7R1HTV');
    </script>
    
    <title><?= $title ?? "Ric'ard" ?></title>
</head>
<body>
    <div id="page-container">
        <div id="content-wrap">
            <header class="d-flex flex-wrap justify-content-center py-3 px-5 border-bottom title-police">
                <nav class="nav navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="<?= $router->url('home')?>" class="nav-link px-3 <?php if ($_SERVER['REQUEST_URI'] == '/') echo 'active' ?>" aria-current="page">A propos</a></li>
                    <li class="nav-item"><a href="<?= $router->url('categories')?>" class="nav-link px-3 <?php if ($_SERVER['REQUEST_URI'] == '/categories') echo 'active' ?>">Peintures</a></li>
                    <li class="nav-item"><a href="<?= $router->url('price')?>" class="nav-link px-3 <?php if ($_SERVER['REQUEST_URI'] == '/price') echo 'active' ?>">Tarifs</a></li>
                    <li class="nav-item"><a href="<?= $router->url('exhibition')?>" class="nav-link px-3 <?php if ($_SERVER['REQUEST_URI'] == '/exhibition') echo 'active' ?>">Expositions</a></li>
                    <li class="nav-item"><a href="<?= $router->url('contact')?>" class="nav-link px-3 <?php if ($_SERVER['REQUEST_URI'] == '/contact') echo 'active' ?>">Contact</a></li>
                </ul>
                </nav>
            </header>
            <div>
                <?= $content ?>
            </div>
        </div>

        <footer id="footer"  class=" py-2 ">
            <div class="container para-police">
                Par Ricard Romain 2021
                <!--Page générée en <? /*echo round(1000 * (microtime(true) - DEBUG_TIME)) */?> ms-->
                
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>