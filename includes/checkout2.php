<?php

require_once('init.php');


    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);
    $error='';
    $flag=0;
    $totalPrice=$urlarray['totalPrice'];
    $userID=$urlarray['userID'];
    $fname=$urlarray['fname'];
    $email=$urlarray['email'];
    $address=$urlarray['address'];
    $city=$urlarray['city'];
    $noc=$urlarray['noc'];
    $creditNum=$urlarray['creditNum'];
    $expM=$urlarray['expM'];
    $expY=$urlarray['expY'];
    $cvv=$urlarray['cvv'];
    //validation
    if(!$totalPrice)
    {
        $error='Your Cart Is Empty <br>';
        $flag=1;
    }
    if(!$fname)
    {
        $error.="Full name is required <br>";
        $flag=1;
    }

    if(!$email)
    {
        $error.="Email address is required <br>";
        $flag=1;
    }

    if(!$noc)
    {
        $error.="Name on card is required <br>";
        $flag=1;
    }

    if(!$creditNum)
    {
        $error.="Credit number is required <br>";
        $flag=1;
    }
    if(!$expM)
    {
        $error.="Exp Month is required <br>";
        $flag=1;
    }
    if(!$expY)
    {
        $error.="Exp year is required <br>";
        $flag=1;
    }
    if(!$cvv)
    {
        $error.="CVV is required <br>";
        $flag=1;
    }
    if ($flag==0)
    {
        $checkout=new transaction();
        $checkout->add_trans($totalPrice,$userID,$fname,$email,$address,$city);
        $close=new cart();
        $close->closeCart($userID);
        $res=$checkout->last_trans_by_id($userID);
        echo "Your transaction number is: "."$res"." With this number you can check if your Product is Still under warranty" ;
    }
    else{
        echo $error;
    }



    ?>