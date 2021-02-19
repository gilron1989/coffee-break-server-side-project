<?php

require_once('init.php');


    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);
    $transID=$urlarray['transNum'];
    if (!$transID)
    {
        echo "Please enter valid transaction number";
        exit;
    }

    $warranty=new transaction();
    $res=$warranty->check_warranty($transID);
    if (!$res)
    {
        echo "Item is not under warranty ";
    }
    else
    {
        echo "Item is under warranty ";
    }

    ?>