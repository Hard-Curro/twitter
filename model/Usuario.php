<?php 

class User {
    public $username;
    public $email;
    public $password;
    public $description;
    
    public function __construct($username, $email, $password, $description) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
    
}

?>