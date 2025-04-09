<?php
class DbConnection extends DbConfig{
    public function DbConnect()
    {
  
        $conn = new mysqli($this->hostname,$this->username,$this->password,$this->database);

        if($conn->connect_error){   //when an error occurs while connecting to the database
            throw new Exception($conn->connect_error);
        } else{
            return $conn;   //returns connection when successfully connected to the database
        }
    }
}