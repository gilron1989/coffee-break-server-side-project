<?php

require_once('database.php');

class User{
    private $id;
    private $firstName;
    private $lastName;
    private $password;
    private $address;
    private $membership;



    public static function fetch_users()
    {

        global $database;
        $result=$database->query("select * from users");
        $users=null;
        if ($result){
            $i=0;
            if ($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $user=new User();
                    $user->instantation($row);
                    $users[$i]=$user;
                    $i+=1;
                }
            }
        }
        return $users;
    }

    private function has_attribute($attribute)
    {

        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }

     private function instantation($user_array)
     {
        foreach ($user_array as $attribute=>$value)
        {
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
       }
     }
     public function find_if_exist($id)
     {
        global $database;
        $error=null;
        $result=$database->query("select * from users where id='".$id."'");
        if ($result->num_rows>0) {
            $error=null;
         }else{
            $error=true;
           }
         return $error;
    }

     public function find_user_by_id($id)
     {
        global $database;
        $error=null;
        $result=$database->query("select * from users where id='".$id."'");

        if (!$result){
             $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        }
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
			$this->instantation($found_user);
        }
         else
             $error="Can not find user by this id";

        return $error;

    }
    public function find_user_by_id_pass($id,$password)
    {
        global $database;
        $error=null;
        $result=$database->query("select * from users where id='".$id."' and password='".$password."'");

        if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
			$this->instantation($found_user);
        }
         else
             $error="Can no find user by this name";

        return $error;
    }

    public static function add_user($id,$firstName,$lastName,$password,$address,$membership)
    {
        global $database;
        $error=null;
        $sql="Insert into users(id,firstName,lastName,password,address,membership) values ('".$id."','".$firstName."','".$lastName."','".$password."','".$address."','".$membership."')";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        return $error;

    }
    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }

    public function __toString ()
	{
	return 'User name: '.$this->firstName.' '.$this->lastName.'<br> ID: '.$this->id.'';
	}

}
    $user=new User();

?>

