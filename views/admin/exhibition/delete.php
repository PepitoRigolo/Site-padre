<?php

use App\Connection;
use App\Table\ExhibitionTable;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new ExhibitionTable($pdo);
$exhibition = $table->find($params['id']);
$table->delete($params['id']);

header('Location: '. $router->url('admin_exhibitions').'?delete=1');
