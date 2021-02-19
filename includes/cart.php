<?php

class Cart{
private $itemID;
private $userID;
private $status;
private $quantity;

private function has_attribute($attribute)
{

    $object_properties=get_object_vars($this);
    return array_key_exists($attribute,$object_properties);
}

 private function instantation($cart_array)
 {
    foreach ($cart_array as $attribute=>$value)
    {
        if ($result=$this->has_attribute($attribute))
            $this->$attribute=$value;
   }
 }


public function add_to_cart($itemID,$userID,$status,$quantity)
{
    global $database;
    $error=null;
    $sql="Select * from cart where itemID='".$itemID."' and userID='".$userID."' and status=0";
    $check=$database->query($sql);
    if ($check->num_rows>0)
    {
       $sql="update cart SET quantity=quantity+1 WHERE itemID='".$itemID."'";
       $database->query($sql);
    }
    else{
    $sql="Insert into cart(itemID,userID,status,quantity) values ('".$itemID."','".$userID."','".$status."','".$quantity."')";
    $result=$database->query($sql);
    }
}

public function decreaseStock($itemID)
{
    global $database;
    $error=null;
    $sql="select stock from products WHERE id='".$itemID."'";
    $stock=$database->query($sql);
    $res=$stock->fetch_assoc();
    if ($res['stock']>0)
    {
        $sql="update products SET stock=stock-1 WHERE id='".$itemID."'";
        $result=$database->query($sql);
    }
    else
    {
        $error='out of stock';
        return $error;
    }
    return $error;
 }


public function increaseFromCart($itemID,$userID)
 {
     global $database;
     $error=null;
     $cart=new Cart();
     $checkStock=$cart->decreaseStock($itemID);
     if (!$checkStock)
     {
        $sql="update cart SET quantity=quantity+1 WHERE itemID='".$itemID."'and userID='".$userID."'  and status=0;";
        $result=$database->query($sql);
      }
      else
      {
         $error='out of stock';
         return $error;
      }
     return $error;
  }


  public function increaseStock($itemID)
  {
      global $database;
      $error=null;
      $sql="update products SET stock=stock+1 WHERE id='".$itemID."'";
      $stock=$database->query($sql);
   }

   public function closeCart($id)
   {
       global $database;
       $error=null;
       $sql="update cart SET status=1 WHERE userID='".$id."'";
       $stock=$database->query($sql);
    }

 public function decreaseFromCart($itemID, $userID)
  {
     global $database;
     $error=null;
     $sql="select quantity from cart WHERE itemID='".$itemID."' and userID='".$userID."'  and status=0;";
     $quantity=$database->query($sql);
     $res=$quantity->fetch_assoc();
     if ($res['quantity']>1)
         {
            $sql="update cart SET quantity=quantity-1 WHERE itemID='".$itemID."' and userID='".$userID."'";
            $result=$database->query($sql);
            $cart=new Cart();
            $cart->increaseStock($itemID);
         }
       else
        {
         $error='cant decrease less than zero';
         return $error;
        }
         return $error;
      }


    public function removeFromCart($itemID, $userID,$quantity)
    {
     global $database;
     $error=null;
     $sql="delete from cart WHERE itemID='".$itemID."' and userID='".$userID."' and status=0";
     $database->query($sql);
     $sql="update products SET stock= stock + ".$quantity." WHERE id='".$itemID."'";
     $database->query($sql);
    }

    public function calcPrice($id)
    {
        global $database;
        $error=null;
        $sql="select sum(quantity*price) as 'total'
        from cart INNER JOIN products ON cart.itemID=products.id
        where userID='".$id."' and status=0";
        $result=$database->query($sql);
        $total=$result->fetch_assoc();
        return $total['total'];
    }
public function getCart($id)
{
    global $database;
    $error=null;
    $sql="select cart.userID, cart.itemID, cart.quantity, cart.status, price, products.img from cart INNER JOIN products ON cart.itemID=products.id where userID='".$id."'  and status=0;";
    $result=$database->query($sql);
    if ($result){
        $shoppingCart = array();
        if ($result->num_rows>0)
        {
            while($row=$result->fetch_assoc()){
              array_push($shoppingCart,$row);
            }
        }
    }
    return $shoppingCart;
}

public function bestSeller()
{
    global $database;
    $error=null;
    $sql="SELECT max(bestSeller), itemID, price, name, img, description, stock
    from (
        select itemID, sum(quantity) as 'bestSeller', products.img, products.description, products.price, products.name, products.stock
        from cart INNER JOIN products on cart.itemID=products.id
        GROUP by itemID) as tmp;";
    $result=$database->query($sql);
    $bestSeller=$result->fetch_assoc();
    return $bestSeller;
}

public function personalRecomandtion($id)
{
    global $database;
    $error=null;
    $sql="SELECT itemID, img, name, price, description, cart.timestamp
    from cart INNER JOIN products on cart.itemID=products.id
    where timestamp =
    (select max(timestamp)
     from cart
     where userID!='".$id."')";
    $result=$database->query($sql);
    $reco=$result->fetch_assoc();
    return $reco;
}
public function recomandtion()
{
    global $database;
    $error=null;
    $sql="SELECT itemID, img, name, price, description, cart.timestamp
    from cart INNER JOIN products on cart.itemID=products.id
    where timestamp =
    (select max(timestamp)
     from cart )";
    $result=$database->query($sql);
    $reco=$result->fetch_assoc();
    return $reco;
}

public function unitsSold($id)
{
    global $database;
    $error=null;
    $sql="select itemID, sold
    from
    (SELECT itemID, sum(quantity) as 'sold'
    from cart
    GROUP BY itemID ) as tmp
    where itemID='".$id."';";
    $result=$database->query($sql);
    $sold=$result->fetch_assoc();
    return $sold;
}


public function disinctItems($id)
{
    global $database;
    $error=null;
    $sql="SELECT itemID, quantity, name
    from cart INNER JOIN products on cart.itemID=products.id where userID='".$id."'";
    $result=$database->query($sql);
    $res=array();
    if ($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                array_push($res,$row);
            }
        }
        return $res;
}

public function distByType($id)
{
    global $database;
    $error=null;
    $sql="SELECT sum(quantity), type
    from cart inner join products on cart.itemID=products.id
    where userID='".$id."' group by type";
    $result=$database->query($sql);
    $res=array();
    if ($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                array_push($res,$row);
            }
        }
        return $res;
}



public function getCartCounter($id)
{
    global $database;
    $result=$database->query("select SUM(quantity) AS 'sum' from cart where userID='".$id."'  and status=0");
    $transID=$result->fetch_assoc();
    return $transID['sum'];
}


public function __get($property)
{
    if (property_exists($this,$property))
        return $this->$property;
}

}
$cart=new Cart();

?>



