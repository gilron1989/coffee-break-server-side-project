<?php

require_once('init.php');

class Session{
    private $signed_in;
    private $user_id;
    private $userName;


    public function __construct(){
        error_reporting(E_ERROR);

        session_start();
        $this->check_login();

    }

     private function check_login(){
        error_reporting(E_ERROR);

        if (isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }

    public function login($user)
    {
        if($user)
        {
            $this->signed_in=true;
            $this->user=$user->firstName;
            $_SESSION['firstName']=$user->firstName;
            $_SESSION['lastName']=$user->lastName;
            $_SESSION['user_id']=$user->id;
            $_SESSION['address']=$user->address;
            $_SESSION['membership']=$user->membership;
            $_SESSION['initials']=substr($user->firstName,0,1).substr($user->lastName,0,1);
        }
    }

    public function logout()
    {
        echo 'logout';
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['user_id']);
        unset($_SESSION['address']);
        unset($_SESSION['membership']);
        unset($_SESSION['initials']);
        unset($_SESSION['counter']);
        unset($this->user_id);
        unset($this->userName);
        $this->signed_in=false;

    }

    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }



}
$session=new Session();

?>

