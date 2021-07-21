<?php

use App\Connection;
use App\Table\ExhibitionTable;
use App\Auth;

Auth::check();

$title="Gestion des expositions";
$pdo = Connection::getPDO();
$link = $router->url('admin_exhibitions');
$items= (new ExhibitionTable($pdo))->all();


if (isset($_GET['delete'])) : ?>
<div class="alert alert-danger">
    L'enregistrement a bien été supprimé
</div>
<?php endif ?>

<?php if(isset($_GET['created'])): ?>
<div class="alert alert-success">
    L'exposition' a bien été créer
</div>
<?php endif ?>

<table class="table">
    <thead>
        <th>#</th>
        <th>Lieu</th>
        <th>Date</th>
        <th>
            <a href="<?=$router->url('admin_exhibition_new') ?>" class="btn btn-success">Créer une exposition</a>
        </th>
    </thead>
    <tbody>
        <?php foreach($items as $item): ?>
        <tr>
            <td>
                <?= $item->getID() ?>
            </td>
            <td>
                <a href="<?= $router->url('admin_exhibition', ['id'=>$item->getID()])?>">
                <?= htmlentities($item->getLocation())?>
                </a>
                <?php if(($item->getStartDate())<(date_create('now'))){ 
                    echo "<span class='badge rounded-pill bg-warning text-dark'>Terminée</span>";
                }?>
            </td>
            <td><?= $item->getStartDate()->format('d/m/Y H:i') ?></td>
            <td>
                <a href="<?= $router->url('admin_exhibition', ['id'=>$item->getID()])?>" class="btn btn-primary">
                Editer
                </a>
                <form action="<?= $router->url('admin_exhibition_delete', ['id'=>$item->getID()])?>" method="POST"
                    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" style="display:inline">
                    <button type="submit" class="btn btn-danger" >Supprimer</button>

                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
