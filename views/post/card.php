<?php
$categories=[];
foreach($post->getCategories() as $category){
    $url= $router->url('category', ['id' => $category->getID(), 'slug'=>$category->getSlug()]);
    $categories[] = <<<HTML
        <a href="{$url}">{$category->getName()}</a>
    HTML;
}
//dd(implode(',', $categories));

?>


<div class="mb-3 text-center">
    <a style="text-decoration: none;color: black;" href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>">
    <div class="mb-3 text-center">
    <?php if($post->getImage()):?>
        <img src="<?= $post->getImageURL('small')?>" class="img-responsive rounded"  alt="<?= htmlentities($post->getSlug()) ?>">
    <?php endif ?>
        <h5 class="card-title para-police"><?= htmlentities($post->getName()) ?></h5>
    </div>
    </a>
</div>
