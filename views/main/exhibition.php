<?php

use App\Connection;
use App\Table\ExhibitionTable;

$title = 'mes Expositions';
$pdo = Connection::getPDO();

$table = new ExhibitionTable($pdo);
$exhibitions= $table->all();

$tomorrow= date_create("tomorrow");
$now = date_create('now');


setlocale(LC_TIME, 'fr_FR', 'French');
date_default_timezone_set('Europe/Paris');


$link = $router->url('exhibition');
?>
<div class="container">
    <h1 class="title-police spadding"><?= htmlentities($title)?></h1>

    <div class="row col-md-10 offset-md-1">
        <ol class="fa-ul para-police">
        <?php foreach($exhibitions as $exhibition):?>
            <?php 
                $expo=$exhibition->getStartDate();
                $interval= $tomorrow->diff($expo);
                $value=$interval->format('%R%a');
                if($value>=0): ?>
                <li><span class="fa-li"><i class="fas fa-thumbtack"></i></span><h5><strong><?= htmlentities($exhibition->getLocation()).'</strong> le '.htmlentities($exhibition->getStartDate()->format('d/m/Y')).' à '.htmlentities($exhibition->getStartDate()->format('H:i')) ?><?php if($value>=0 && $value<=2){ 
                    echo " <span class='badge rounded-pill bg-info'>Bientôt !</span>";
                }?></h5>
                </li> 
            <?php endif?>
        <?php endforeach ?> 
        </ol> 
    </div>
			
</div>