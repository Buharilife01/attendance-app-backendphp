<?php
class userModel extends DbConnection{

    private $conn;

    public function __construct()
    {
        $this->conn = $this->DbConnect();
    }

    public function signupUpload($signUpDetails)
    {
        $id = uniqid();
        $firstName = $signUpDetails['first-name'];
        $lastName = $signUpDetails['last-name'];
        $email = $signUpDetails['email'];
        $department = $signUpDetails['department'];
        $level = $signUpDetails['level'];
        $matricNo = $signUpDetails['matric-no'];
        $password = $signUpDetails['password'];
    

        $statement = "INSERT INTO user_details (
            user_id,
            first_name,
            last_name,
            department,
            matric_number,
            student_level,
            email,
            user_password
        )

        VALUES (
            '$id',
            '$firstName',
            '$lastName',
            '$department',
            '$matricNo',
            '$level',
            '$email',
            '$password'
        )

        ";
        

        if($this->conn->query($statement)){
            return true;
        } else{
            throw new Exception("error while uploaing signup details");
        }

        // $this->conn->close();
    }

    public function detailExist($email,$matricNo)
    {
        $statement = "SELECT email,matric_number FROM user_details WHERE email = '$email' || matric_number = '$matricNo' ";

        $result = $this->conn->query($statement);

        if($result->num_rows > 0){
            throw new Exception("user already exists");
        } else{
            return true;
        }
    }
}