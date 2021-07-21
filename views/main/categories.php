<?php

use App\Connection;

use App\Table\CategoryTable;


$title = 'Mes catégories';
$pdo = Connection::getPDO();
$categories = (new CategoryTable($pdo))->all();

//dd($categories);


$link = $router->url('categories');

?>
<div class="container">
<h1 class="title-police spadding"><?= htmlentities($title)?></h1>


<div class="row">
    <?php foreach($categories as $category):?>
    <div class="col-md-4 mbt-1 mb-5">
        <?php $category_url = $router->url('category', ['id' => $category->getID(), 'slug'=>$category->getSlug()]); ?>
        <a href="<?= $category_url ?>">
        <div class="mb-3 text-center">
        <?php if($category->getImage()):?>
            <img src="<?= $category->getImageURL('small')?>" class="img-responsive rounded" alt="<?= htmlentities($category->getSlug()) ?>">
        <?php endif ?>
                <h5 class="card-title para-police"><?= htmlentities($category->getName()) ?></h5>
        </div>
        </a>
    </div>
    <?php endforeach ?>    
</div>
