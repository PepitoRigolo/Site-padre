<?php
use App\Connection;
use App\Table\ExhibitionTable;
use App\HTML\Form;
use App\Model\Exhibition;
use App\Validators\ExhibitionValidator;
use App\ObjectHelper;
use App\Auth;


Auth::check();

$errors=[];
$exhibition=new Exhibition();

$pdo = Connection::getPDO();
$exhibition->setStartDate(date('d-m-Y H:i'));

if(!empty($_POST)){    
    $exhibitionTable = new ExhibitionTable($pdo);
    $data=array_merge($_POST, $_FILES);
    $v= new ExhibitionValidator($data, $exhibitionTable, $exhibition->getID());
    ObjectHelper::hydrate($exhibition, $data, ['location', 'start_date']);
    if($v->validate()){
        $pdo->beginTransaction();
        $exhibitionTable->createExhibition($exhibition);
        $pdo->commit();
        header('Location: '.$router->url('admin_exhibitions', ['id'=>$exhibition->getID()]). '?created=1');
        exit();
    } else {
        $errors= $v->errors();
    }
}

$form = new Form($exhibition, $errors);
?>


<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        L'exposition' n'a pas pu être enregistrer, merci de corriger vos erreurs
    </div>
    <?php endif ?>
    


<h1>Créer une exposition</h1>

<?php require('_form.php');?>