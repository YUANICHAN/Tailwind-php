<?php

//BASIC OOP

class BankAccount {
    private $accountHolder; //properties
    private $balance;

    public function __construct($accountHolder, $balance = 0) { //constructor
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
    }

    public function deposit($amount) { //method
        if (is_numeric($amount) && $amount > 0) {
            $this->balance += $amount;
        } else {
            echo 'Invalid deposit amount.<br>';
        }
    }

    public function withdraw($amount) {
        if (is_numeric($amount) && $this->balance >= $amount) {
            $this->balance -= $amount;
        } else {
            echo 'Not enough balance to withdraw.<br>';
        }
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getInfo() {
        return "Account Holder: {$this->accountHolder}, Balance: {$this->balance}";
    }
}

?>
