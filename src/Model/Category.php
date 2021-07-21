<?php
namespace App\Model;

use App\Helpers\Text;

class Category {

    private $id;
    private $slug;
    private $name;
    private $post_id;
    private $image;
    private $oldImage;
    private $pendingUpload=false;
    private $post;
    
    public function getID(): ?int {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getSlug(): ?string {
        return $this->slug;
    }

    
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPostID(): ?int
    {
        return $this->post_id;
    }

    public function setPost(Post $post){
        $this->post=$post;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        if(is_array($image) && !empty($image['tmp_name'])){
            if(!empty($this->image)){
                $this->oldOmage=$this->image;
            }
            $this->pendingUpload=true;
            $this->image=$image['tmp_name'];
        }
        if(is_string($image) && !empty($image)){
            $this->image=$image;
        }
        return $this;
    }

    
    public function getOldImage(): ?string
    {
        return $this->oldImage;
    }

    public function shouldUpload(): bool
    {
        return $this->pendingUpload;
    }

    public function getImageURL(string $format): ?string{
        if(empty($this->image)){
            return null;
        }
        return '/uploads/categories/'.$this->image.'_'.$format.'.jpg';
    }
}