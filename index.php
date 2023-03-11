<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./controllers/User.php");
$user = new User();
$user->loadViews();
?>