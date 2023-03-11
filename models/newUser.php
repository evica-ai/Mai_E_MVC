<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('UserModel.php');

$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['task']) && $_GET['task'] == 'create') {

    $formvalues = array(
        $_POST['user_lname'],
        $_POST['user_fname'],
        $_POST['user_username'],
        $_POST['user_password'],
        $_POST['user_photo'],
        $_POST['user_role']
    );

    $userModel->newUser($formvalues);

    // Redirect to a confirmation page or show a success message
}

?>