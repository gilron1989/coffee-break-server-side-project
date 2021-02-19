<DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d840ad1fac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JS/script.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/homePageStyle.css">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">



    <title>Login</title>
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
    <div class="form-popup" id="myForm">
        <form method="POST" class="form-container" >
            <h1 class="login-title"><b>Login</b></h1>
            <p style="color:red; font-size:12px; padding-top:5px;"> * Required </p>
            <div id="error"> </div>
            <br>
                <label for="ID"><b>ID*</b></label>
                <input type="number" placeholder="Enter ID number" name="id" id="id">
                <label for="psw"><b>Password*</b></label>
                <input type="password" id="password" placeholder="Enter Password " name="password" >
                <input type="checkbox" onclick="logPass()">Show Password
                <button type="submit"  value="Login" name="submit" class="btn">Login</button>
                <button type="button" class="btn signup" onclick="openSignup()">Sign Up</button>
        </form>
    </div>
</main>
<footer>
<script>
            $("footer").load("footer.html");
        </script>
</footer>
</body>

</html>

<?php
    require_once('init.php');
     $error='';
     if(isset($_POST['submit']))
     {
         if (!$_POST['id'])
         {
              $error='ID is required';
         }
         else if(!$_POST['password'])
         {
             $error='Password is required';
         }
         else
         {
             $id=$_POST['id'];
             $password=md5($_POST['password']);
             $user=new User();
             $error=$user->find_user_by_id_pass($id,$password);
             if (!$error)
             {
                 $session->login($user);
                 header('Location: ../index.php');
                }
             else
             {
                 echo "<script> document.getElementById('error').innerHTML='Invalid user name or password' </script>";
             }

         }

     }

?>

