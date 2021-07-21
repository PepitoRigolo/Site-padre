<?php
namespace App\Table;

use App\Model\Exhibition;
use App\Table\Exception\NotFoundException;
use \PDO;

class ExhibitionTable extends Table{

    public $table = "exhibition";
    public $class = Exhibition::class;

    public function updateExhibition(Exhibition $exhibition): void
    {
        $this->update([
            'location'=>$exhibition->getLocation(),
            'start_date'=>$exhibition->getStartDate()->format('Y-m-d H:i:s')
        ], $exhibition->getID());
    }

    public function createExhibition(Exhibition $exhibition): void
    {
        $id= $this->create([
            'location'=>$exhibition->getLocation(),
            'start_date'=>$exhibition->getStartDate()->format('Y-m-d H:i:s')
        ]);
        $exhibition->setID($id);
    }

    public function all() {
        return $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY start_date ASC");
    }

    /*public function list(){
        $categories = $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY start_date ASC");
        $results=[];
        foreach($categories as $category){
            $results[$category->getID()] = $category->getName();
        }
        return $results;
    }*/

}