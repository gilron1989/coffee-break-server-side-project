<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/shopStyle.css">
    <link rel="stylesheet" href="../css/homePageStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBDw5WK7LtSidNgmrPxA7TEZ_WgfLq_iE&callback=initMap&libraries=&v=weekly"
      async></script>

    <script src="../JS/script.js"></script>
</head>

<body>
    <?php

    require_once("init.php");
    session_start();
    if($session->signed_in)
    {
     $cart=new Cart();
     $id=$_SESSION['user_id'];
     $counter=$cart->getCartCounter($id);
     $_SESSION['counter']=$counter;
     }

?>
    <header class="headerelem">
            <div class="top-left" onclick="sendToIndex()">
                <div class="title">
                    <div>
                        Coffee Break
                    </div>
                    <div class="sectitle ">
                        take a break with an amazing coffee
                    </div>
                </div>
            </div>

            <div class="pic">
                <img width="100%" src="/ServerSide_final_project/images/midt.png">
            </div>

            <div class="buttons">

                <div id="login">
                <button onclick="sendToLogin()" type="button" class="btn btn-outline-secondary">
                        <span class="material-icons">login</span>
                        <b class="log"> Login</b>
                        </button>
                </div>

                <div id="log-out">
                    <a href="/ServerSide_final_project/includes/logout.php" type="button" class="btn  btn-outline-secondary">
                        <span class="material-icons">
                     logout
                    </span><b class="log"> logout</b></a>
                </div>


                <div id="cart">
                    <button onclick="sendToCart()" type="button" class="btn cart-btn btn-outline-secondary">
                        <span class="material-icons">shopping_cart</span>
                        <b class="cartb"> Cart</b>
                     </button>
                     <?php
                    //   session_start();
                         echo "<div id='cart-count'><b>".$_SESSION['counter']."</b></div>";

                      ?>
                </div>
                <?php
                    require_once("init.php");
                    $s1=new Session;
                    $user=$s1->userName;
                    if($session->signed_in)
                    {
                       echo '<div id="hello-user"><button type="button" onclick="sendToPersonal()" class="user"><b>'. strtoupper($_SESSION['initials']).'</b></button></div>';
                       echo '<script> document.getElementById("login").style.display = "none" </script>';
                       echo '<script> document.getElementById("log-out").style.display = "inline" </script>';
                    }
                 ?>
            </div>
    </header>
<script>
    checkCounter();
</script>
</body>

</html>