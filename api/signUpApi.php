<?php
require(__DIR__."/../index.php");
try{
    $userDetails = [
        'last-name' => $_POST['last-name'],
        'first-name' => $_POST['first-name'],
        'department' => $_POST['department'],
        'email' => $_POST['email'],
        'level' => $_POST['level'],
        'matric-no' => $_POST['matric-no'],
        'password' => $_POST['password'],
        'confirm-password' => $_POST['confirm-password']
    ];
    $test = new userController();
    
    echo $test->signup($userDetails,$imageFile);

} catch(Exception $e){
    $error = $e->getMessage();

    echo json_encode(['message' => $error,'status' => 'unsuccessfull']);
    
}