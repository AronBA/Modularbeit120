<?php
class LogInController extends LogIn {


    public function __construct($uname,$upwd){
        $this->loginUser($uname,$upwd);
    }

    private function loginUser($uname,$upwd){
        $this->getUser($uname,$upwd);
    }




}