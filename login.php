<?php 
session_start();
if(isset($_SESSION["facilities"]))
{
    header("Location: page2test.php");
}
if(isset($_SESSION["guidance"]))
{
    header("Location: GuidanceReceived.php");
}
if(isset($_SESSION["walb"]))
{
    header("Location: WALB.php");
}
if(isset($_SESSION["progress"]))
{
    header("Location: Progress.php");
}
if(isset($_SESSION["challenges"]))
{
    header("Location: Challenges.php");
}
if(isset($_SESSION["course"]))
{
    header("Location: courseWork.php");
}
if(isset($_SESSION["hoilogin"]))
{
    header("Location: HoIFacilitiesGraph.php");
}
if(isset($_SESSION["drlogin"]))
{
    header("Location: DRFacilitiesGraph.php");
}
if(isset($_SESSION["thanks"]))
{
    header("Location: Thanks.php");
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
<h1 style="color:#CF4747">LOGIN <br> _________________</h1><br><br>
  <!--<h2 style="size:large;color:white;">Ph.D Candidate</h2>
  <br>
  <div class="accept">
    <input type="text" placeholder="Registration ID" name="ID" required>
    <br>
    <br>
    <input type="password" placeholder="Password" name="psw" required>

  </div>
  <br><br><br>
  <div class="left-arrow">
  <a href="www.iskconbangalore.org" ><img src="data:image/jpeg;base64,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" alt="left arrow" style="width:25%;height:35%;"></a>
  </div>

  <div class="right-arrow">
  <a href="" ><img src="https://thumb7.shutterstock.com/display_pic_with_logo/615538/515274235/stock-vector-arrow-right-vector-rounded-icon-image-style-is-a-flat-icon-symbol-inside-a-circle-black-color-515274235.jpg" alt="right arrow" style="width:16%;height:26%;"></a>
  </div>-->
  <form action="LoginAuth.php" method="post">
      <input type="submit" name="tologin" value="Ph.D Candidate" style="background-color: #CF4747; height: 40px; width: 200px; margin: 15px"/><br>
      <input type="submit" name="tologin" value="Head of Institute"style="background-color: #CF4747; height: 40px; width: 200px; margin: 15px"/><br>
      <input type="submit" name="tologin" value="Deputy Registrar"style="background-color: #CF4747; height: 40px; width: 200px; margin: 15px"/>
  </form>
</div>

  </body>

</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
