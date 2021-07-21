<?php

use App\Attachment\CategoryAttachment;
use App\Connection;
use App\Table\CategoryTable;
use App\HTML\Form;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$category = $table->find($params['id']);
$errors=[];
$success=false;
//$fields=['name', 'slug'];


if(!empty($_POST)){
    $data = array_merge($_POST, $_FILES);
    $v= new CategoryValidator($data, $table, $category->getID());
    ObjectHelper::hydrate($category, $data, ['name', 'slug', 'image']);
    if($v->validate()){
        $pdo->beginTransaction();
        CategoryAttachment::upload($category);
        $table->updateCategory($category);
        $pdo->commit();
        $success = true;
    } else {
        $errors= $v->errors();
    }
}

$form = new Form($category, $errors);
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
    


<h1>Editer la catégorie <?=htmlentities($category->getName())?></h1>


<?php require('_form.php');?>