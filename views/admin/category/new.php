<?php

use App\Attachment\CategoryAttachment;
use App\Connection;
use App\Table\CategoryTable;
use App\HTML\Form;
use App\Model\Category;
use App\Validators\CategoryValidator;
use App\ObjectHelper;
use App\Auth;

Auth::check();

$errors=[];
$category=new Category();

if(!empty($_POST)){    
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $data=array_merge($_POST, $_FILES);

    $v= new CategoryValidator($data, $table, $category->getID());
    ObjectHelper::hydrate($category, $data, ['name', 'slug','image']);
    if($v->validate()){
        $pdo->beginTransaction();
        CategoryAttachment::upload($category);
        $table->createCategory($category);
        $pdo->commit();
        header('Location: '.$router->url('admin_categories', ['id'=>$category->getID()]). '?created=1');
        exit();
    } else {
        $errors= $v->errors();
    }
}

$form = new Form($category, $errors);
?>


<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être enregistrer, merci de corriger vos erreurs
    </div>
    <?php endif ?>
    


<h1>Créer une catégorie</h1>

<?php require('_form.php');?>