<?php

class logincontroller
{
    public function loginvalidator($username, $password)
    {
        $setname = "admin";
        $setpassword = "pass";
        if ($username == $setname && $password == $setpassword) {
            echo "correct";
        } else {
            echo "incorrect";
        }
    }


}