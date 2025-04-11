<?php

class LoginModel extends DbConnection{

    private $conn;

    public function __construct()
    {
        $this->conn = $this->DbConnect();
    }

    public function loginDetails($username,$password){
        $statement = "SELECT email, user_password FROM user_details WHERE email = '$username' AND user_password = '$password' ";

        $result = $this->conn->query($statement);

        if($result->num_rows > 0){
            return true;
        } else{
            throw new Exception("Invalid username or password");
        }
    }
}