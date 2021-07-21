<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title><?= $title ?? 'Mon site' ?></title>
</head>
<body class="d-flex flex-column h-100">

<header class="d-flex flex-wrap justify-content-center py-3 px-5 border-bottom">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="<?= $router->url('admin_posts')?>" class="nav-link">Articles</a></li>
            <li class="nav-item"> <a href="<?= $router->url('admin_categories')?>" class="nav-link">Catégories</a></li>
            <li class="nav-item"> <a href="<?= $router->url('admin_exhibitions')?>" class="nav-link">Expositions</a></li>
            <li class="nav-item">
                <form action="<?= $router->url('logout')?>" method="POST" style="display:inline">
                        <button type="submit" class="nav-link" style="background:transparent; border:none">
                            Se déconnecter
                        </button>
                </form>
            </li>
        </ul>
    </header>

               

                

</nav>
    <div class="container mt-4">
        <?= $content ?>
    </div>
    <footer class="bg-light py-4 footer mt-auto">
        <!--<div class="container">
            
            Page générée en  round(1000 * (microtime(true) - DEBUG_TIME))   ms
              
        </div>-->
    </footer>
</body>
</html>