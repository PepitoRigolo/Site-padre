<?php

use App\Attachment\CategoryAttachment;
use App\Connection;
use App\Table\CategoryTable;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$category = $table->find($params['id']);
CategoryAttachment::detach($category);
$table->delete($params['id']);

header('Location: '. $router->url('admin_categories').'?delete=1');
