<?php
namespace App\Model;

use App\Helpers\Text;
use \DateTime;

class Contact {

    private $id;
    private $name;
    private $mail;
    private $message;
    
    public function getID(): ?int {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
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

    public function getMail(): ?string {
        return $this->mail;
    }

    
    public function setMail(string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}