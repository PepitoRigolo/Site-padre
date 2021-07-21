<?php
use App\Connection;
use App\HTML\Form;
use App\ObjectHelper;
use App\Auth;
use App\Table\ExhibitionTable;
use App\Validators\ExhibitionValidator;

Auth::check();

$pdo = Connection::getPDO();
$exhibitionTable = new ExhibitionTable($pdo);
$exhibition = $exhibitionTable->find($params['id']);

$errors=[];
$success=false;


if(!empty($_POST)){
    $data = array_merge($_POST, $_FILES);
    $v= new ExhibitionValidator($data, $exhibitionTable, $exhibition->getID());
    ObjectHelper::hydrate($exhibition, $data, ['location', 'start_date']);
    if($v->validate()){
        $pdo->beginTransaction();
        $exhibitionTable->updateExhibition($exhibition);
        $pdo->commit();
        $success = true;
    } else {
        $errors= $v->errors();
    }
}

$form = new Form($exhibition, $errors);
?>

<?php if($success): ?>
<div class="alert alert-success">
    La catégorie a bien été modifié
</div>
<?php endif ?>


<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être modifié, merci de corriger vos erreurs
    </div>
    <?php endif ?>
    


<h1>Editer la catégorie <?=htmlentities($exhibition->getLocation())?></h1>


<?php require('_form.php');?>