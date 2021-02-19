<?php
require_once('database.php');

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $img;
    private $type;

    public function fetch_products()
    {
        global $database;
        $result=$database->query("select * from products");
        $product=null;
        if ($result){
            $i=0;
            if ($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $product=new product();
                    $product->instantation($row);
                    $products[$i]=$product;
                    $i+=1;
                }
            }
        }
        return $products;
    }

    public function getProducts()
    {
        global $database;
        $result=$database->query("select * from products");
        if ($result){
            $products = array();
            if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                  array_push($products,$row);
                }
            }
        }
        return $products;
    }

    private function has_attribute($attribute)
    {

        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }

     private function instantation($user_array)
     {
        foreach ($products_array as $attribute=>$value)
        {
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
       }
     }

     public function find_product_by_id($id)
     {
        global $database;
        $error=null;
        $result=$database->query("select * from products where id='".$id."'");

        if (!$result)
            $error='Can not find the product.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_product=$result->fetch_assoc();
			$this->instantation($found_product);
        }
         else
             $error="Can not find product by this id";

        return $error;

    }

    public function print_by_id($id,$str)
    {

        global $database;
        $error=null;
        $result=$database->query("select * from products where id='".$id."'");

        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
             return $row[$str];
            }
        }
    }

    public static function add_product($id,$name,$description,$price,$stock)
    {
        global $database;
        $error=null;
        $sql="Insert into users(id,name,description,price,stock) values ('".$id."','".$name."','".$description."','".$price."','".$stock."')";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add product.  Error is:'.$database->get_connection()->error;
        return $error;

    }
    public function __get($property)
    {
        if (property_exists($this,$property))
            return $this->$property;
    }


}


?>

