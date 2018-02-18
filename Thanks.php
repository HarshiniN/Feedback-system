<?php 
session_start();
$_SESSION["thanks"]=1;
if(!isset($_SESSION["login"]))
{
    header("Location: Logout.php");
}
?>
<html>
    <head>
    <title></title>
            <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="footer_css/css/zerogrid.css">
        <link rel="stylesheet" href="footer_css/css/style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="js/bootstrap.min.js"></script>
    <link href="stylist.css" type="text/css" rel="stylesheet" />
    </head>
    
    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
            <ul style="list-style-type: none">
            <li class="navbar-brand"><img src="images/mahe.png" style="height: 43px;width: 250px; background-color: white; margin-left: -110px;margin-top: -10px;"></li>
            <li class="navbar-brand" style="padding-left: 320px"></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            
            <li><a href="Logout.php">LOGOUT</a></li>
        </ul>
    </div>
        </nav><br><br><br><br>
    <center>
        <div id="bigdiv">
            <div id="div1"><h1> Thank you for submitting your feedback </h1></div>
            <div id="div2"><div id="div3"> <h1>Your feedback is valuable to us</h1></div></div>
        </div>
    </center>
    </body>
    
</html>