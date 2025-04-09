<?php
class userController{
    public function signup($userDetails)
    {
        $signUp = new SignUpController();
        $signUp->signup($userDetails);
    }
}