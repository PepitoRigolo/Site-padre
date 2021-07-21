<?php 
namespace App\Model;

class User {

    private $username;
    private $password;
    private $id;

    
    public function getUsername(): ?string
    {
        return $this->username;
    }


    public function setUsername($username):self
    {
        $this->username = $username;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }
}