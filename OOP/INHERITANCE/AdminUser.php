<?php
    class AdminUser extends User{

        public function __construct($username, $email)
        {
            parent::__construct($username, $email);
        }

        public function getInfo()
        {
            return "Username: $this->username " . "Email: $this->email";
        }
    }
?>