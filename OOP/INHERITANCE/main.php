<?php
require_once 'autoload.php';  

$user = new User("yuan", "yuan@gmail.com");
echo $user->getInfo() . "    ";

$admin = new AdminUser("axl", "admin@example.com");
echo $admin->getInfo();

?>