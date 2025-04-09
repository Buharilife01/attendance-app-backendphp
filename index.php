<?php
require_once(__DIR__."/path/paths.php");

header("Access-contol-Allow-origin: *");
header("accepts: Applications/JSON");

try{
    $userDetails = [
        'last-name' => 'innocent',
        'first-name' => 'ebuka',
        'department' => 'polymer',
        'email' => 'ichukwuea26@gmail.com',
        'level' => 100,
        'matric-no' => '23ddkkd',
        'password' => '12222',
        'confirm-password' => '12222'
    ];
    $test = new SignUpController();
    
    echo $test->signup($userDetails);

} catch(Exception $e){
    $error = $e->getMessage();
    echo $error;
}