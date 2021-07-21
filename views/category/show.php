<?php

use App\Connection;
use App\Model\Category;
use App\Model\Post;
use App\PaginatedQuery;
use App\Table\CategoryTable;
use App\Table\PostTable;

$id = $params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);


if($category->getSlug()!==$slug){
    $url = $router->url('category', ['slug' => $category->getSlug(), 'id'=>$id]);
    http_response_code(301);
    header('Location: '.$url);
}
$title = "Catégorie {$category->getName()}";
[$posts, $paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getID());
$link =$router->url('category', ['id'=>$category->getID(), 'slug'=>$category->getSlug()]);

?>
<div class="container">
<h1 class="title-police spadding"><?= htmlentities($title)?></h1>


<div class="row">
    <?php foreach($posts as $post):?>
    <div class="col-md-4 mbt-1 mb-5">
        <?php require dirname(__DIR__).'/post/card.php'?>
    </div>
    <?php endforeach ?>    
</div>


<div class="d-flex justify-content-between my-4">
        <?= $paginatedQuery->previousLink($link)?>
        <?= $paginatedQuery->nextLink($link)?>
</div>
