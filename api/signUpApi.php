<?php
require(__DIR__."/../index.php");
try{
    $userDetails = [
        'last-name' => $_POST['last-name']?? null,
        'first-name' => $_POST['first-name']?? null,
        'department' => $_POST['department']?? null,
        'email' => $_POST['email']?? null,
        'level' => $_POST['level']?? null,
        'matric-no' => $_POST['matric-no']?? null,
        'password' => $_POST['password']?? null,
        'confirm-password' => $_POST['confirm-password']?? null
    ];
    $test = new UserController();
    
    echo $test->signup($userDetails,$imageFile);

} catch(Exception $e){
    $error = $e->getMessage();

    echo json_encode(['message' => $error,'status' => 'unsuccessfull']);
    
}