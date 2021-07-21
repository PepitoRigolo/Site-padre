<form action="" method="post" enctype="multipart/form-data">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <div class="row">
        <div class="col-md-9">
            <?= $form->file('image', 'Image à la une'); ?>
        </div>
        <div class="col-md-3">
            <?php if($category->getImage()):?>
                <img src="<?=$category->getImageURL('small')?>" alt="" style="width: 100%;">
            <?php endif ?>
        </div>
    </div>
    <button class="btn btn-primary">
    <?php if($category->getID() !==null) :?>
        Modifier
    <?php else: ?>
        Créer
    <?php endif ?>
    </button>
</form>