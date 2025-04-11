<?php
require(__DIR__."/../index.php");
try{
    
    $a = new Logincontroller();
    
    echo $a->loginvalidator("ichukwuea6@gmail.com","12222");

} catch(Exception $e){
    $error = $e->getMessage();

    echo json_encode(['message' => $error,'status' => 'unsuccessfull']);
    
}