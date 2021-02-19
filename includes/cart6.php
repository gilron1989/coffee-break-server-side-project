<?php

require_once('init.php');


    $urlContents=file_get_contents('php://input');
    $urlarray = json_decode($urlContents,true);


    $userID=$urlarray['userID'];

    $counter=new Cart();
    $counter->cartCounter($userID);

    echo $counter

    ?>