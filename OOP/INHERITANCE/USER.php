<?php
    class User{
        protected $username;
        protected $email;

        public function __construct($username, $email)
        {
            $this->username = $username;
            $this->email = $email;
        }

        public function getInfo()
        {
            return "Username: $this->username " . "Email: $this->email";
        }
    }
?>