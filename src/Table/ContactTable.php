<?php
namespace App\Table;

use App\Model\Contact;
use App\Table\Exception\NotFoundException;
use \PDO;

class ContactTable{

    public $table = "contact";
    public $class = Contact::class;


    public function sendMail(Contact $contact): void
    {
        $id= $this->create([
            'location'=>$exhibition->getLocation(),
            'start_date'=>$exhibition->getStartDate()->format('Y-m-d H:i:s')
        ]);
        $exhibition->setID($id);
    }

    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    $email = 'name@company.com';
    $subject = 'Testing PHP Mail';
    $message = 'This mail is sent using the PHP mail ';
    $headers = 'From: noreply @ company. com';
    //check if the email address is invalid $secure_check
    $secure_check = sanitize_my_email($email);
    if ($secure_check == false) {
        echo "Invalid input";
    } else { //send email 
        mail($email, $subject, $message, $headers);
        echo "This email is sent using PHP Mail";
    }

}