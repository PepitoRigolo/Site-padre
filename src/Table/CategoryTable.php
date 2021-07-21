<?php

namespace App\Table;

use App\Model\Category;
use App\Table\Exception\NotFoundException;
use \PDO;

final class CategoryTable extends Table{

    protected $table = "category";
    protected $class = Category::class;

 
    
    public function updateCategory(Category $category): void
    {
        $this->update([
            'name'=>$category->getName(),
            'slug'=>$category->getSlug(),
            'image' =>$category->getImage()
        ], $category->getID());
    }

    public function createCategory(Category $category): void
    {
        $id= $this->create([
            'name'=>$category->getName(),
            'slug'=>$category->getSlug(),
            'image'=>$category->getImage()
        ]);
        $category->setID($id);
    }
    
    public function hydratePosts(array $posts): void
    {
        $postsByID = [];
        foreach($posts as $post) {
            $post->setCategories([]);
            $postsByID[$post->getId()] = $post;
        }
        $categories = $this->pdo->query('SELECT c.*, pc.post_id 
                    FROM post_category pc 
                    JOIN category c ON c.id = pc.category_id 
                    WHERE pc.post_id IN (' . implode(',', array_keys($postsByID)).')')->fetchAll(PDO::FETCH_CLASS, $this->class);

        foreach($categories as $category){
            $postsByID[$category->getPostID()]->addCategory($category);
        }
    }

    public function all() {
        return $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY id DESC");
    }

    public function list(){
        $categories = $this->queryAndFetchAll("SELECT * FROM {$this->table} ORDER BY name ASC");
        $results=[];
        foreach($categories as $category){
            $results[$category->getID()] = $category->getName();
        }
        return $results;
    }


}