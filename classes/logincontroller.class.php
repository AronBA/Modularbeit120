<?php
class LogInController extends LogIn {

private $uname;
private $upwd;

    public function __construct($uname,$upwd){
        $this->uname =$uname;
        $this->upwd=$upwd;
    }

    public function loginUser(){


    $this->getUser($this->uname,$this->upwd);

    }
}