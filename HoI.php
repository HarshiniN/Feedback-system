<?php 
session_start();
if(isset($_SESSION["hoilogin"]))
{
    header("Location: HoIFacilitiesGraph.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Feedback System</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width:device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="footer_css/css/zerogrid.css">
  <link rel="stylesheet" href="footer_css/css/style.css">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="left">
<div class="header-left">
</div>
<div class="bar-left">
</div>
<div class="MU">

    <img src="images/mul.jpg" alt="MU logo" style="width: 20%;height: 55%">
<br>
<p id="top" style="color: white;size: 100%;align-self: center;"><br/><br/>Welcome to the <br/> Manipal Academy of Higher Education <br/> Ph.D student feedback system</p>
</div>

<div class="developed">
<div class="content">


</div>
<p style="align-content: center;color:white;padding: 10px">Designed, developed and maintained by Department of Information and Communication Technology</p>

</div>

</div>


<div class="right">
<div class="header-right">
</div>
<div class="bar-right">

</div>
<div class="login">
<br>
<br>
  <h1 style="color:#CF4747">LOGIN <br> _________________</h1>
  <h2 style="size:large;color:white;">Head of the Institute (HoI)</h2>
  <br>
  <div class="accept">
      <form action="HoiLoginAuth.php" method="post">
    <input type="text" placeholder="Username" name="ID" required>
    <br>
    <br>
    <input type="password" placeholder="Password" name="psw" required>
    <br><br>
    <?php
    $var=1;
    if (isset($_SESSION['hoi']))
    {
    $var = $_SESSION['hoi'];
    }
    if($var == 0)
    {
    ?>
    <div class='alert alert-danger'>
        <strong>Invalid Login Credentials!</strong>
    </div>
    <?php
    }
    ?>
    <input type="submit" value="Login" style="background-color: #CF4747;color: #ffffff;width: 100px;height: 30px">
    </form>
  </div>
  </div>
</div>
  </body>

</html>