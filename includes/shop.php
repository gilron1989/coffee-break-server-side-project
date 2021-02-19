<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loginStyle.css">
    <link rel="stylesheet" href="../css/signupStyle.css">
    <link rel="stylesheet" href="../css/homePageStyle.css">
    <link rel="stylesheet" href="../css/shopStyle.css">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>

    <title>Shop</title>
</head>


<body>
<header>
<script>
$("header").load("header.php");
</script>
</header>

<nav class="navbar navbar-light navbar-expand-lg my-nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/ServerSide_final_project/index.php"><b ><span class="material-icons"> home</span>Home Page</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="active" href="/ServerSide_final_project/includes/shop.php"><b><span class="material-icons"> local_cafe</span> Shop</b></a>
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
        <section class="upper-shop">
        </section>
        <?php
            require_once('init.php');
            $prod=new Product();
            $res=$prod->getProducts();
            $unitSold=new Cart();
            $count=1;
            foreach ($res as $product)
            {
                $units=$unitSold->unitsSold($product['id']);
                if ($count % 2==0)
                {
                   echo "<section class='bottom-shop'>";

                }
                if ($count % 2 != 0 )
                {
                   echo "<section class='upper-shop'>";
                }
                echo "<div class='item'>";
                echo "<div class='pic-enve'>";
                echo "<img class='item-pic zoom' src='".$product['img']."'alt='item pic'>";
                echo "</div>";
                echo "<div class='item-title'><b>".$product['name']."</b></div>";
                echo "<div class='item-desc'><b class='desc'>Item Description: </b><br> <span class='more-desc'>Click here for more info</span>  <span class='details'>".$product['description']."</span></div>";
                echo "<div><b>Item Price </b><br>$" .$product['price']."</div>";
                echo "<div class='item-details'>";
                echo "<div><b>Available in Stock </b><br>" .$product['stock']."</div>";
                echo "<div><b>Units Sold </b><br>" .$units['sold']."</div>";
                echo "</div>";
                echo "<div class='btns'>";
                echo "<button type='button' href='#' class='btn btn-primary tool'> <span class='material-icons'>account_balance_wallet</span><span class='btn-txt'> Order Now </span><span class='tooltiptext'>Not active</span> </button> ";
                echo "<button id='pushitem' onclick='addToCart(this)' data-item='".$product['id']."' data-user='".$_SESSION['user_id']."' data-price='".$product['price']."' data-img='".$product['img']."' type='button' class='btn btn-primary '><span class='material-icons'>shopping_cart</span> <span class='btn-txt'>Add to Cart</span> </button>";
                echo "</div>";
                echo "</div>";
                echo "</section>";
                $count++;
            }
            ?>

    </main>
    <footer class="footer">
    <script>
            $("footer").load("footer.html");
    </script>
    </footer>
    </div>
    <script>
        checkCounter();
    </script>
</body>
</html>