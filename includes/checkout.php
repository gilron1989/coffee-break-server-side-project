<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>
    <link rel="stylesheet" href="../css/CheckOutStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Checkout Form</title>
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
                <a class="nav-link" href="/ServerSide_final_project/homepage.php"><b ><span class="material-icons"> home</span>Home Page</b></a>
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

        <section class="checkout-title">
            <div class="paytitle"><b>Checkout Form</b></div>
        </section>
        <section class="main-page">
            <form>
                <div class="billing-address">
                    <div class="sec-title"><b>Billing Address</b></div>
                    <p class="required"> * requried </p>
                    <div>
                        <label id="label" for="fname"><i class="fa fa-user"></i>Full Name*</label>
                        <input type="text" id="fname" name="firstname" placeholder="Enter first name"></div>
                    <div>
                        <label id="label" for="email"><i class="fa fa-envelope"></i>email*</label>
                        <input type="email" id="email" name="email" placeholder="example@domain.com"></div>
                    <div>
                        <label id="label" for="adr"><i class="fas fa-map-pin"></i>Address</label>
                        <input type="text" id="adr" name="address" placeholder="Enter Home address"></div>
                    <div>
                        <label id="label" for="city"><i class="fa fa-institution"></i>City</label>
                        <input type="text" id="city" name="city" placeholder="City name">
                    </div>
                </div>
                <div class="payment">
                    <div class="sec-title"><b>Payment details</b></div>
                    <div>
                        <div class="cards-list">Accepted Cards</div>
                        <div class="icons">
                            <i class="fa fa-cc-visa" style="color: navy;"></i>
                            <i class="fa fa-cc-amex" style="color: blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color: red;"></i>
                            <i class="fa fa-cc-discover" style="color: orange;"></i>
                        </div>
                    </div>
                    <div>
                        <label id="label" for="cname">Name on Card*</label>
                        <input type="text" id="cname" name="cardnumber" placeholder="Full name"></div>
                    <div>
                        <label id="label" for="ccnum">Credit Card*</label>
                        <input type="number" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444"></div>
                    <div>
                        <label id="label" for="expmonth">Exp Month*</label>
                        <input type="number" id="expmonth" name="expmonth" placeholder="Month name">
                    </div>
                    <div>
                        <label id="label" for="expyer">Exp Year*</label>
                        <input type="number" id="expyear" name="expyear" placeholder="YYYY">
                    </div>
                    <div>
                        <label id="label" for="cvv">CVV*</label>
                        <input type="number" id="cvv" name="cvv" placeholder="###"></div>
                </div>
                </form>
<?php
            require_once('init.php');
           echo "<div class='checkout-btn'>";
          echo "<button onclick='validateInfo(this)' class='confirm' data-user='".$_SESSION['user_id']."' data-totalprice=".$_SESSION['price']." type='button'>Procced to Checkout</button>";
          echo "</div>";
?>
        </section>
    <p id="error"><b> </b></p>

    </main>

    <footer>
        <script>
            $("footer").load("footer.html");
        </script>
    </footer>

</body>

</html>