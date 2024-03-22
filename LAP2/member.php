<?php
// Call to file containing external support methods
require_once("support.php");

// Class name definition
class member {
    // Definition of Attributes
    private $fullname;
    private $email;
    private $idmember;

    // Initialization function
    public function __construct($fullname, $email) {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->idmember = idcontinue(); // Giả định hàm này tạo ID tiếp theo
    }

    // The object destructor defines the resources to be released
    public function __destruct() {
        $this->fullname = NULL;
        $this->email = NULL;
        $this->idmember = NULL;
    }

    // Method that returns Full Name, Email, and ID
    public function get_fullname() {
        return $this->fullname;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_id() {
        return $this->idmember;
    }
    
    // Other methods and logic as required...
}



?>
