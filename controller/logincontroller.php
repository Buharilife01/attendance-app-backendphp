<?php

class Logincontroller
{
    public function loginvalidator($username, $password)
    {
      

      
        if(!empty($username)){
            if(!empty($password)){
                $loginDetails = new LoginModel();

                if($loginDetails->loginDetails($username,$password)){
                    echo json_encode(["status" => true]);
                }

            } else{
                throw new Exception ("invalid email or password");  //checks if password is empty
            }
        } else{
            throw new Exception ("invalid email or password");   //checks if username is empty
        }
    }


}