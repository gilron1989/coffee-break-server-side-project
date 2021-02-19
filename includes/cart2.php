<?php

require_once('init.php');


    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);
    $itemID=$urlarray['itemID'];
    $userID=$urlarray['userID'];
    $status=$urlarray['status'];
    $quantity=$urlarray['quantity'];

    $cart=new Cart();
    $check=$cart->decreaseStock($itemID,$userID);
    if (!$check)
    {
    $cart->add_to_cart($itemID,$userID,$status,$quantity);
    }



    ?>