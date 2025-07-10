<?php

require_once 'BankAccount.php';

$myAccount = new BankAccount("Yuan", 1000); //creating object
$myAccount->deposit(500);
$myAccount->withdraw(200);

echo $myAccount->getInfo();  

?>
