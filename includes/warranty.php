
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/warrantyStyle.css">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Warranty</title>
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
                <a class="nav-link" href="/ServerSide_final_project/includes/shop.php"><b><span class="material-icons"> local_cafe</span> Shop</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="active" href="/ServerSide_final_project/includes/warranty.php"> <b><span class="material-icons">biotech</span>Warranty</b>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link tool tool" href="#"><b><span class="material-icons">import_contacts</span> Contact Us</b><span class="tooltiptext ">Not active</span></a>
            </li>
        </ul>
    </nav>

    <main>
    <div class='main'>
    <section>
    <h1 class="personal-title">Warranty Check</h1>
    <p>On our website the product warranty is valid for one year. </p>
    <p>Here you can check if the warranty on your products you purchased is still valid.</p>
    <p>You can check your warranty status by entering the transaction number that you recieved after you checked-out</p>
    <label id="label" for="transNum"><i class="fa fa-receipt"></i>Transaction number: </label>
    <input type="number" id="transNum" name="transNum" placeholder="####">
    <br>
    <div><button onclick="warrantyCheck()" id='confirm' type='button'>Check Warranty</button></div>
    <div id="answer"></div>
    </section>
    </main>
    <footer class="footer">
    <script>
            $("footer").load("footer.html");
    </script>
    </footer>
    </div>
</body>
</html>