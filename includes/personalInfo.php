<?php
require_once("init.php");
if($session->signed_in)
{
    session_start();
    $id=$_SESSION['user_id'];
    $fname=$_SESSION['firstName'];
    $lname=$_SESSION['lastName'];
    $address=$_SESSION['address'];
    $membership=$_SESSION['membership'];
}
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
    <link rel="stylesheet" href="../css/infoStyle.css">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <script src="../JS/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Item', 'Amount Of Purchases'],
          <?php
                $cart=new Cart();
                $res=$cart->disinctItems($id);


            foreach ($res as $tmp)
            {
               echo "['".$tmp['name']."',".$tmp['quantity']." , ],";
            }
            ?>
           ]);

        var options = {
          title: 'My Distribution of Purchases By Products'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Type', 'Amount Of Purchases'],
          <?php
                $cart=new Cart();
                $res=$cart->distByType($id);


            foreach ($res as $tmp)
            {
               echo "['".$tmp['type']."',".$tmp['sum(quantity)']." , ],";
            }
            ?>
           ]);

        var options = {
          title: 'My Distribution of Purchases By Products Types'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
    <title>Personal Info</title>
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
                <a class="nav-link"  href="/ServerSide_final_project/includes/warranty.php"> <b><span class="material-icons">biotech</span>Warranty</b>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link tool tool" href="#"><b><span class="material-icons">import_contacts</span> Contact Us</b><span class="tooltiptext ">Not active</span></a>
            </li>
        </ul>
    </nav>
     <main>
    <section class="upper-personal-page">
    <h1 class="personal-title">Personal Information</h1>
    <div class='main-det'>
        <?php
            require_once("init.php");
            $trans=new transaction();
            $count=$trans->counterOrders($id);
            if (!$membership)
            {
                $membership="NO "."<i class='fas fa-sad-tear'></i>";
            }
            else
            {
                $membership="YES "."<i class='fas fa-smile'></i>";;
            }
              echo " <section class='perosnal-info'>";
              echo "<div class='details'><b>ID:</b> ".$id."</div>";
              echo "<div class='details'><b>First name :</b> ".$fname."</div>";
              echo "<div class='details'><b>Last name :</b> ".$lname."</div>";
              echo "<div class='details'><b>Home address :</b> ".$address."</div>";
              echo "</section>";

                echo " <section class='client-info'>";
                echo "<div class='details'><b>Club memmber: </b>" .$membership."</div>";
                echo "<div class='details'><b>Amount of previous purchases:</b> ".$count['counter']."</div>";
                echo "</section>";
                echo "</div>";
?>
</div>
        </section>
        <section class="bottom-personal-page">
        <h1 class="personal-title">My Personal Statistics </h1>
        <section class='graph'>
        <div id="piechart1" ></div>
        <div id="piechart2" ></div>
        </section>

        </div>
        </main>
    <footer class="footer">
    <script>
            $("footer").load("footer.html");
    </script>
    </footer>

</body>
</html>