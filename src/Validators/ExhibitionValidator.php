<?php
namespace App\Validators;

use App\Table\ExhibitionTable;


class ExhibitionValidator extends AbstractValidator{


    public function __construct(array $data, ExhibitionTable $table, ?int $id=null)
    {
       parent::__construct($data);
       $this->validator->rule('required', ['location', 'start_date']);
       $this->validator->rule('lengthBetween', ['location'], 3, 200);
    }
}