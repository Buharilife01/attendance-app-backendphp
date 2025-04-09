<?php
class userController{
    public function signup($userDetails)
    {
        $signUp = new SignUpController();
        if($signUp->signup($userDetails)){
            $upload = new userModel();
            if($upload->signupUpload($userDetails)){
                return "successfully sign up";
            }
        }
    }
}