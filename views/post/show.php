<?php

use App\Connection;
use App\Table\CategoryTable;
use App\Table\PostTable;

 


$id = (int)$params['id'];
$slug = $params['slug'];


$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);


$title = $post->getName();

if($post->getSlug()!==$slug){
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id'=>$id]);
    http_response_code(301);
    header('Location: '.$url);
}
?>
<div class="container">
    <div class="row" style="padding-top: 75px;">
            <div class="col-md-6 mbt-1 mb-5">
                <?php if($post->getImage()):?>
                    <img src="<?= $post->getImageURL('large')?>" class="img-responsive rounded" alt="" style="width:100%">
                <?php endif ?>
            </div>
            <div class="col-md-6 mbt-1 mb-5">
            <h1 class="title-police mb-5"><?= htmlentities($post->getName())?></h1>
                <p class="para-police"><?= $post->getFormattedContent() ?></p>
                <p class="para-police"><span class="text-muted"> Date de création : </span><?= $post->getCreatedAt()->format('d/m/Y')?><br>
                <span class="text-muted ">Catégorie : </span><?php 
                foreach($post->getCategories() as $k => $category):
                    if ($k>0):
                        echo ', ';
                    endif;
                    $category_url = $router->url('category', ['id' => $category->getID(), 'slug'=>$category->getSlug()]);
                    ?><a href="<?= $category_url ?>"><?=htmlentities($category->getName())?></a><?php 
                endforeach ?></p>
            </div>
    </div>
</div>

