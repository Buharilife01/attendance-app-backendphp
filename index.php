<?php
require_once(__DIR__."/path/paths.php");

header("Access-contol-Allow-origin: *");
header("accepts: Applications/JSON");

try{
    // $userDetails = [
    //     'last-name' => 'innocent',
    //     'first-name' => 'ebuka',
    //     'department' => 'polymer',
    //     'email' => 'ichukwuea6@gmail.com',
    //     'level' => 100,
    //     'matric-no' => '23dkkd',
    //     'password' => '12222',
    //     'confirm-password' => '12222'
    // ];
    $test = new userController();
    
    echo $test->signup($_POST);

} catch(Exception $e){
    $error = $e->getMessage();

    echo json_encode(['message' => $error,'status' => 'unsuccessfull']);
    
}