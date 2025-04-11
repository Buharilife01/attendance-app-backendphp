<?php

class signUpController{
    private function requestMethod()    //checks request method to be post
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            return true;
        }
    }

    private function isAlphabets(array $userDetails) //checks if first-name, last-name, department are alphabets
    {
        $firstname = trim($userDetails['first-name']);
        $lastname = trim($userDetails['last-name']);
        $department = trim($userDetails['department']);

        
        if(ctype_alpha($firstname)){
            if(ctype_alpha($lastname)){
                if(ctype_alpha($department)){
                    return true;
                } else{
                    throw new Exception("deparment should contain letters");
                }
            }else{
                throw new Exception("last name should contain letters");
            }
        } else{
            throw new Exception("First name should contain letters");
        }
    }

    public function signup(array $userDetails)
    {
        if($this->requestMethod()){
            $matricNo = trim($userDetails['matric-no']);
            $password = $userDetails['password'];
            $confirmPassword = $userDetails['confirm-password'];
            $level = $userDetails['level'];
            if($this->isAlphabets($userDetails)){
                $userModel = new userModel();

                if(is_string($matricNo)){
                    if(is_numeric($level)){
                        if(filter_var($userDetails['email'],FILTER_VALIDATE_EMAIL) && $userModel->detailExist($userDetails['email'],$matricNo)){
                            if(!empty($password)){
                                if($password == $confirmPassword){
                                    $file = new filecontroller();
                                    if($file->checkfile()){
                                        $location = __DIR__."/../views/images/";
                                        // var_dump($this->checkfile());
                                        $encode = md5(rand(2,200));
                                        $filename = $encode.$file->checkfile()['file_name'];
                                        if(move_uploaded_file($file->checkfile()["file_tmp"],$location.$filename)){ 
                                            return true;
                                            
                                        } else{
                                            throw new Exception("error occured while uploading file");
                                        }
                                    }
                                } else{
                                    throw new Exception("password does not match");
                                }
                            } throw new Exception("Please input password");
                        } else{
                            throw new Exception("invalid email format");
                        }
                    } else{
                        throw new Exception("level should conatain numbers");
                    }
                } else{
                    throw new Exception("matric number should be filled");
                }
                
                
            }
        }
    }
    
}