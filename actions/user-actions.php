<?php 

include "../classes/User.php";

//Create an objcet
$user = new User;

//Call the method
$user->login($_POST); 

?>