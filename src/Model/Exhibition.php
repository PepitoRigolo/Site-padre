<?php
namespace App\Model;

use App\Helpers\Text;
use \DateTime;

class Exhibition {

    private $id;
    private $location;
    private $start_date;
    
    public function getID(): ?int {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLocation(): ?string {
        return $this->location;
    }

    
    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getStartDate(): DateTime {
        return new DateTime($this->start_date);
    }

    
    public function setStartDate(string $date): self
    {
        $this->start_date = $date;
        return $this;
    }


}