<?php

require_once('database.php');

class transaction{
    private $transID;
    private $userID;
    private $cost;
    private $fname;
    private $email;
    private $address;
    private $city;
    private $timestamp;



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

    public function add_trans($totalPrice,$userID,$fname,$email,$address,$city)
    {
        global $database;
        $error=null;
        $sql="Insert into transaction(userID,cost,fname,email,address,city) values ('".$userID."','".$totalPrice."','".$fname."','".$email."','".$address."','".$city."')";
        $result=$database->query($sql);
    }
    public function last_trans_by_id($userID)
    {
        global $database;
        $error=null;
        $sql="Select transID from transaction where timestamp=(select MAX(timestamp) from transaction where userID='".$userID."')";
        $result=$database->query($sql);
        $transID=$result->fetch_assoc();
        return $transID['transID'];

    }
public function check_warranty($transID)
{
    global $database;
    $error=null;
    $sql="Select transID from transaction where timestamp > ADDDATE(CURRENT_TIMESTAMP, INTERVAL -1 year) and transID='".$transID."'";
    $result=$database->query($sql);
    $transID=$result->fetch_assoc();
    return $transID['transID'];
 }

public function counterOrders($id)
{
    global $database;
    $error=null;
    $sql="SELECT count(userID) as 'counter' from transaction where userID='".$id."'";
    $result=$database->query($sql);
    $counter=$result->fetch_assoc();
    return $counter;
}
    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }


}
    $trans=new transaction();

?>

