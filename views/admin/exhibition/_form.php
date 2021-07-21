<form action="" method="post">
    <?= $form->input('location', 'Lieu'); ?>
    <?= $form->inputDateTime('start_date', 'Date et heure'); ?>
    <button class="btn btn-primary">
    <?php if($exhibition->getID() !==null) :?>
        Modifier
    <?php else: ?>
        Créer
    <?php endif ?>
    </button>
</form>