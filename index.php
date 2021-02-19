<?php
require_once("includes/init.php");
if($session->signed_in)
{
    session_start();
    $id=$_SESSION['user_id'];
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <link rel="stylesheet" href="css/signupStyle.css">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="css/homePageStyle.css">
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBDw5WK7LtSidNgmrPxA7TEZ_WgfLq_iE&callback=initMap&libraries=&v=weekly"
      async></script>

    <script src="JS/script.js"></script>
    <title>Coffee Break</title>
</head>

<body>
<header>
        <script>
            $("header").load("includes/header.php");
        </script>
    </header>

    <nav class="navbar navbar-light navbar-expand-lg my-nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="active" href="/ServerSide_final_project/homepage.php"><b ><span class="material-icons"> home</span>Home Page</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="/ServerSide_final_project/includes/shop.php"><b><span class="material-icons"> local_cafe</span> Shop</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link "  href="/ServerSide_final_project/includes/warranty.php"> <b><span class="material-icons">biotech</span>Warranty</b>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link tool tool" href="#"><b><span class="material-icons">import_contacts</span> Contact Us</b><span class="tooltiptext ">Not active</span></a>
            </li>
        </ul>
    </nav>

    <main>
        <section class="upper">
            <div onclick="sendtoshop()" class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images/b-milk.png" class="card-img" alt="Coffe Machines ">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <h2 class="card-title "> <b>Machine of the week</b></h2>
                            <p class="card-text-1 ">Enjoy yourself with our <b>B&Milk,</b> Machine. Feel the aroma of your capsule Dont fall to cheap one' s</p>
                            <p class="card-text "><span class="read-more"><b>Click here for more info-></b></span>
                                <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="row no-gutters ">
                    <div class="col-md-4 ">
                        <img src="images/frother.png " class="card-img " alt="frother ">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body ">
                            <h2 class="card-title "> <b>Accessory of the week</b></h2>
                            <p class="card-text-1 ">Try our new Milk frother! We will make your coffee hot and Smooth.</p>
                            <p class="card-text "><span class="read-more "><b>Click here for more info-></b></span>
                                <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 ">
                <div class="row no-gutters ">
                    <div class="col-md-4 ">
                        <img src="images/cape.png " class="card-img " alt="capsule ">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body ">
                            <h2 class="card-title "> <b>Capsule of the week</b></h2>
                            <p class="card-text "><span class="read-more "><b>Click here for more info-></b></span>
                                <p class="card-text-1 ">Try our Deluxe <b>B-Rome</b> capsule. for a south-american Coffee taste</p>
                                <p class="card-text "><small class="text-muted ">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
                </section>
        <section class="bottom">
            <div id="map" onload="initMap()"></div>
        </section>
        <section class="upper">
        <?php
          require_once("includes/init.php");
          $cart=new Cart();
          $bestSeller=$cart->bestSeller();
          $img=$bestSeller['img'];
         echo " <div class='card mb-3'>";
         echo " <div class='row no-gutters'>";
         echo " <div class='col-md-4 '>";
         echo "   <img src='".$img."' class='card-img ' alt='capsule'>";
         echo "  </div>";
         echo " <div class='col-md-8'>";
         echo "   <div class='card-body'>";
         echo "      <h2 class='card-title'> <b>Our Best Seller</b></h2>";
         echo "     <p class='card-text'>";
         echo "        <p class='card-text-1'><b>Product name: </b> ".$bestSeller['name']."</p>";
         echo "        <p class='card-text-1'>".$bestSeller['description']."</p>";
         echo "        <p class='card-text-1'><b> Product Price: </b> $".$bestSeller['price']."</p>";
         echo "        <p class='card-text-1'><b> Now Available in stock: </b> ".$bestSeller['stock']."</p>";
         echo "          <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
         echo "    </div>";
         echo "   </div>";
         echo " </div>";
         echo " </div>";
         if($session->signed_in)
         {
                 $cart=new Cart();
                 $res=$cart->personalRecomandtion($id);
                 echo " <div class='card mb-3'>";
                 echo " <div class='row no-gutters'>";
                 echo " <div class='col-md-4 '>";
                 echo "  <img src='".$res['img']."' class='card-img ' alt='capsule'>";
                 echo "  </div>";
                 echo " <div class='col-md-8'>";
                 echo "   <div class='card-body'>";
                 echo "      <h2 class='card-title'> <b>Our HOT Recommendation For You</b></h2>";
                 echo "     <p class='card-text'>";
                 echo "        <p class='card-text-1'><b>Product name: </b> ".$res['name']."</p>";
                 echo "        <p class='card-text-1'>".$res['description']."</p>";
                 echo "        <p class='card-text-1'><b> Product Price: </b> $".$res['price']."</p>";
                 echo "        <p class='card-text-1'><b> Last purchased : </b> ".$res['timestamp']."</p>";
                 echo "          <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                 echo "    </div>";
                 echo "   </div>";
                 echo " </div>";
                 echo " </div>";
         }
         else
         {
            $cart=new Cart();
            $res=$cart->recomandtion();
            echo " <div class='card mb-3'>";
            echo " <div class='row no-gutters'>";
            echo " <div class='col-md-4 '>";
            echo "  <img src='".$res['img']."' class='card-img ' alt='capsule'>";
            echo "  </div>";
            echo " <div class='col-md-8'>";
            echo "   <div class='card-body'>";
            echo "      <h2 class='card-title'> <b>Our HOT Recommendation</b></h2>";
            echo "     <p class='card-text'>";
            echo "        <p class='card-text-1'><b>Product name: </b> ".$res['name']."</p>";
            echo "        <p class='card-text-1'>'".$res['description']."'</p>";
            echo "        <p class='card-text-1'><b> Product Price: </b> $".$res['price']."</p>";
            echo "        <p class='card-text-1'><b> Last purchased : </b> ".$res['timestamp']."</p>";
            echo "          <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
            echo "    </div>";
            echo "   </div>";
            echo " </div>";
            echo " </div>";
         }
          ?>

        </section>
    </main>
    <footer>
        <script>
            $("footer").load("includes/footer.html");
        </script>
    </footer>
</body>


</html>