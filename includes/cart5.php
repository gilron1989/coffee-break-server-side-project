<?php

require_once('init.php');


    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);
    $itemID=$urlarray['itemID'];
    $userID=$urlarray['userID'];
    $quantity=$urlarray['quantity'];

    $cart=new Cart();
    $cart->removeFromCart($itemID,$userID,$quantity);


    ?>