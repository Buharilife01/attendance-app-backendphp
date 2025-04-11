<?php
class userController{
    public function signup($userDetails,$imageFile)
    {
        $signUp = new SignUpController();
        if($signUp->signup($userDetails,$imageFile)){
            $upload = new userModel();
            if($upload->signupUpload($userDetails)){
                echo json_encode([
                        "status" => true,
                        "message" => "successfully sign up"
                    ]
                );
                
            }
        }
    }
}