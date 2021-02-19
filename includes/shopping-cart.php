
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
    <link rel="stylesheet" href="../css/loginStyle.css">
    <link rel="stylesheet" href="../css/signupStyle.css">
    <link rel="stylesheet" href="../css/homePageStyle.css">
    <link rel="stylesheet" href="../css/shopStyle.css">
    <link rel="stylesheet" href="../css/cartStyle.css">

    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>    <script src="../JS/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <a class="nav-link" href="/ServerSide_final_project/includes/shop.php"><b><span class="material-icons"> local_cafe</span> Shop</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/ServerSide_final_project/includes/warranty.php"> <b><span class="material-icons">biotech</span>Warranty</b>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link tool tool" href="#"><b><span class="material-icons">import_contacts</span> Contact Us</b><span class="tooltiptext ">Not active</span></a>
            </li>
        </ul>
    </nav>
    <?php
     echo " <main>";
       require_once('init.php');
       session_start();
       $sc=new cart();
       $res=$sc->getCart($_SESSION['user_id']);
       $mainSubTotal=0;
       $empty='';
       $calc=new cart();
       $mainSubTotal=$calc->calcPrice($_SESSION['user_id']);

        if(!$res)
        {
            echo " <div id='empty'>Cart Is Empty</div>";
        }
        else
        {
            echo "<table>";
            echo " <tr>";
            echo " <th>Product</th>";
            echo " <th class='amount-th'>Quantity</th>";
            echo " <th>Subtotal</th>";
            echo " </tr>";

            foreach ($res as $cart)
            {
                $subTotal=$cart['quantity']*$cart['price'];
                echo  "<tr>";
                echo   "<td>";
                echo       "<div class='cart-info'>";
                echo        "<img src=".$cart['img'].">";
                echo       "<div class='cart-data'>";
                echo         "<div class='name'><b>".$cart['name']."</b></div>";
                echo          "<div>|</div>";
                echo          "<div class='price'><span>Price:</span> $".$cart['price']." </div>";
                echo           "<div>|</div>";
                echo           "<div class='remove' data-quantity='".$cart['quantity']."' data-item='".$cart['itemID']."' data-user='".$_SESSION['user_id']."' onclick='removeFromCart(this)'>Remove </div>";
                echo           "</div>";
                echo       "</div>";
                echo   "</td>";
                echo   "<td class='change-amount'> <button data-item='".$cart['itemID']."' data-user='".$_SESSION['user_id']."' class='changeAmount' onclick='decreaseFromCart(this)'> - </button>";
                echo   "<input type='number' readonly id='quantity' name='quantity' value='".$cart['quantity']."'>";
                echo   "<button data-item='".$cart['itemID']."' data-user='".$_SESSION['user_id']."' class='changeAmount' onclick='increaseFromCart(this)'> + </button>";
                echo    "</td>";
                echo    "<td>";
                echo '$';
                echo    $subTotal;
                echo "</td>";
                echo     "</tr>";
            }
        }

            echo "</table>";
            echo "<div class='total-price'>";
            echo "<table>";
            echo "<tr>";
            echo " <td><b>Subtotal</b></td>";
            echo " <td id='sub-total'>";
            echo '$';
            echo $mainSubTotal;
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><b>Tax (17%)</b></td>";
            echo " <td id='tax'>";
            echo '$';
            echo floor($mainSubTotal*0.17);
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><b>Total</b></td>";
            echo " <td id='total'>";
            echo '$';
            echo floor($mainSubTotal*1.17);
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
        $totalprice= floor($mainSubTotal*1.17);
        $_SESSION['price']=$totalprice;
    echo "<div class='cart-btn'>";
    echo "<button onclick='sendToCheckOut()' class='check-out-btn'  data-user='".$_SESSION['user_id']."' data-totalprice='".$totalprice."' type='button'>Procced to Checkout</button>";
    echo "</div>";
    echo "<div id='error'>";
    echo "</div>";
   echo "</main>";

    ?>

    <footer class="footer">
    <script>
            $("footer").load("footer.html");
    </script>
    </footer>
</body>


</html>